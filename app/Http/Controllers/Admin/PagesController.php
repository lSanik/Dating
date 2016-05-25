<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\PagesMedia;
use App\Models\PageTranslation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    private $destination;

    public function __construct()
    {
        $this->destination = public_path().'/uploads/pages/';

        view()->share('heading', trans('pages.pages'));
        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
        view()->share('unread_contact_count', parent::getContactUnread());
        view()->share('unread_contact_message', parent::getContactMessages());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = DB::table('pages')->select('pages.id', 'slug', 'title')
            ->join('pages_translations', 'pages.id', '=', 'pages_translations.pages_id')
            ->where('pages_translations.locale', '=', App::getLocale())
            ->get();

        return view('admin.pages.pages')->with([
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        $files = [];

        $v = Validator::make($request->all(), [
            'title'  => 'required',
            'body'   => 'required',
            'locale' => 'required',
            'slug'   => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $image = time().'-'.$file->getClientOriginalName();
            $destination = $this->destination.'images';
            $file->move($destination, $image);
        }

        $page = new Pages();
        $page->slug = $request->input('slug');
        $page->image = $image;
        $page->save();

        $trans = new PageTranslation();
        $trans->pages_id = $page->id;
        $trans->title = $request->input('title');
        $trans->body = $request->input('body');
        $trans->locale = $request->input('locale');
        $trans->save();

        foreach (\Config::get('app.locales') as $locale) {
            if ($locale != $request->input('locale')) {
                $trans->insert([
                    'pages_id'  => $page->id,
                    'title'     => '',
                    'body'      => '',
                    'locale'    => $locale,
                ]);
            }
        }

        if ($request->file('files')[0] !== null) {
            $destination = $this->destination.'files';

            foreach ($request->file('files') as $f) {
                $img = time().'-'.$f->getClientOriginalName();
                $f->move($destination, $img);
                array_push($files, $img);
            }

            $media = new PagesMedia();
            foreach ($files as $file) {
                $media->insert([
                    'pages_id'   => $page->id,
                    'media'      => $file,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        \Session::flash('flash_success', trans('pages.addSuccess'));

        return redirect(App::getLocale().'/admin/pages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Pages::find($id);
        $pages_media = PagesMedia::where('pages_id', '=', $id)->get();
        $page_translation = PageTranslation::where('pages_id', '=', $id)->get();

        return view('admin.pages.edit')->with([
            'page'  => $page,
            'trans' => $page_translation,
            'media' => $pages_media,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $files = [];

        $v = Validator::make($request->all(), [
            'title'  => 'required',
            'body'   => 'required',
            'locale' => 'required',
            'slug'   => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        $t = PageTranslation::where('locale', '=', $request->input('locale'))
            ->where('pages_id', '=', $id)
            ->get();

        $trans = PageTranslation::find($t[0]->id);
        $trans->title = $request->title;
        $trans->body = $request->body;
        $trans->save();

        $page = Pages::find($id);

        if ($request->file('image')) {
            $file = $request->file('image');
            $image = time().'-'.$file->getClientOriginalName();
            $destination = $this->destination.'images';
            $file->move($destination, $image);

            $this->removeFile($this->destination.'images/'.$page->image);
            $page->image = $image;
        }

        $page->slug = $request->input('slug');
        $page->save();

        if ($request->file('files')[0] !== null) {
            foreach ($request->file('files') as $f) {
                $img = time().'-'.$f->getClientOriginalName();
                $f->move($this->destination.'files', $img);
                array_push($files, $img);
            }

            $media = new PagesMedia();
            foreach ($files as $file) {
                $media->insert([
                    'pages_id'   => $id,
                    'media'      => $file,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        \Session::flash('flash_success', trans('pages.updated'));

        return redirect('/'.App::getLocale().'/admin/pages/edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = public_path().'/uploads/pages/';

        $page = Pages::find($id);
        $this->removeFile($destination.'images/'.$page->image);

        $media = PagesMedia::select('media')->where('pages_id', '=', $id)->get();
        foreach ($media as $m) {
            $this->removeFile($destination.'files/'.$m->media);
        }

        $page->delete();

        \Session::flash('flash_success', trans('pages.deleted'));

        return redirect(App::getLocale().'/admin/pages/');
    }

    public function dropFile(Request $request)
    {
        $destination = public_path().'/uploads/pages/files/';

        $this->removeFile($destination.$request->input('file'));

        $media = PagesMedia::find($request->input('ID'));
        $media->delete();
    }
}
