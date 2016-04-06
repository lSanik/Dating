<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Presents;
use App\Models\PresentsTranslation;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GiftsController extends Controller
{
    private $present;
    private $pt;
    private $user;

    public function __construct(Presents $present, User $user, PresentsTranslation $pt)
    {
        $this->middleware('auth');
        \Auth::user()->hasRole(['Owner', 'Moder', 'Partner']);

        $this->present = $present;
        $this->user = $user;
        $this->pt = $pt;

        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presents = $this->present->getAll();

        return view('admin.presents.index')->with([
            'heading'  => 'Подарки',
            'presents' => $presents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heading = 'Добавить подарок';

        return view('admin.presents.create')->with([
            'heading' => $heading,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'required',
            'price' => 'required'
        ]);

        if( $request->file('image') )
        {
            $present_file = time() . '-' . $request->file('image')->getClientOriginalName();
            $destination  = public_path() . '/uploads/presents/';
            $request->file('image')->move( $destination, $present_file );

            $this->present->image = $present_file;
        }

        $this->present->price = (double) $request->input('price');
        $this->present->partner_id = \Auth::user()->id;
        $this->present->save();

        foreach( \Config::get('app.locales') as $locale )
        {
            $this->pt->insert([
                'present_id' => $this->present->id,
                'locale'     => $locale,
                'title'      => $request->input('title_'.$locale),
                'description'=> $request->input('description'.$locale),
            ]);
        }

        \Session::flash('flash_success', 'Подарок добавлен');

        return redirect('/admin/gifts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $present = $this->present->where('id', '=', $id)->first();
        $present_locale = $this->pt->where('present_id', '=', $id)
                                    ->select(['locale', 'title', 'description'])
                                    ->get();


        return view('admin.presents.edit')->with([
            'heading' => 'Редактировать подарок',
            'present' => $present,
            'loc'  => $present_locale,

        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'price' => 'required'
        ]);

        if( $request->file('image') )
        {
            $present_file = time() . '-' . $request->file('image')->getClientOriginalName();
            $destination  = public_path() . '/uploads/presents/';
            $request->file('image')->move( $destination, $present_file );

            $oldFile = $this->present->select('image')->first($id);

            $this->removeOldImage( $destination.$oldFile->image );
        }

        $present = $this->present->find($id);
        $present->image = $present_file;
        $present->price = $request->input('price');
        $present->save();

        foreach( \Config::get('app.locales') as $locale )
        {
            $this->pt->where('present_id', '=', $id)
                     ->where('locale', '=', $locale)
                     ->update([
                         'title'        => $request->input('title_'.$locale),
                         'description'  => $request->input('description_'.$locale),
                     ]);
        }

        \Session::flash('flash_success', 'Подарок успешно обновлен');

        return redirect(\App::getLocale().'/admin/gifts');
    }

    private function removeOldImage( $path )
    {
        if( file_exists($path) ){

            if( unlink( $path ) )
            {
                return true;

            } else {

                return false;
            }

        } else {
            return true;
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drop($id)
    {
        $this->present->delete($id);

        \Session::flash('flash_success', 'Подарок удален');
        return redirect('/admin/gifts/');
    }
}
