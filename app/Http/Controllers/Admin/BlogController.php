<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;

use App;

use App\Models\Post;
use App\Models\PostTranslation;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class BlogController extends Controller
{
    private $post;
    private $trans;


    /*
     * @todo загрузка файлов бля блоговой записи с полся body
     * @todo Если нет языка пользователя показывать который есть или редиректить на все записи доступные по языку пользователя
     * @todo Rewrite unread shit to Provider
     */

    public function __construct(Post $post, PostTranslation $trans)
    {
        $this->middleware('auth');
        \Auth::user()->hasRole(['Owner', 'Moder', 'Partner']);

        $this->post = $post;
        $this->trans = $trans;

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
        $heading = 'Все записи';
        $posts = $this->post->all();
        $translation = $this->trans->all();
        return view('admin.blog.index')->with([
            'heading' => $heading,
            'posts' => $posts,
            'translation' => $translation,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $heading = 'Добавить новую запись';

        return view('admin.blog.create')->with([
            'heading' => $heading,
            'locales' => Config::get('app.locales'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rulse = [
            'title' => 'required',
            'body'  => 'required'
        ];

        $fileName = '';

        if( !empty( $request->file() )){

            $file = $request->file('cover_image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/blog';

            $file->move($destination, $fileName);
            $this->post->cover_image = $fileName;
        }
        $this->post->save();

        $locales=Config::get('app.locales');
        $title=$request->input('title');
        $body=$request->input('body');

        foreach($locales as $key => $locale ){
            if(!$title[$locale]) $title[$locale]=null;
            //$this->trans->post_id   = $this->post->id;
            //$this->trans->locale    = $locale;
            //$this->trans->title     = $title[$locale];
            //$this->trans->body      = $body[$locale];
            $this->trans->insert([
                'post_id' =>$this->post->id,
                'locale' => $locale,
                'title' => $title[$locale],
                'body' => $body[$locale]
            ]);
        }
        return redirect('/admin/blog');

    }


    public function show($id)
    {
        //@todo Show
        if( in_array( App::getLocale(), Config::get('app.locales') ) )
        {
            $post = $this->post->find($id);//->lang( App::getLocale() )->get();
            $trans = $this->trans->post($id);
            $image = $this->post->select('cover_image')->find($id);
        }

        return view('client.blog')->with([
            'post' =>  json_decode($post),
            'image' => $image,

        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);
        $trans = $this->post->find($id)->postTrans;
        //dd($trans);
        $heading_text="";
        foreach($trans as $ts){
            if($ts->locale==App::getLocale()) {
                $heading_text = $ts->title;
            }

        }
        $heading = 'Редактировать: '.$heading_text;


        return view('admin.blog.edit')->with([
            'heading' => $heading,
            'post' => $post,
            'trans' => $trans,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //@todo - Добить апдейт записи
        $rulse = [
            'id' => 'required',
            'title' => 'required',
            'body'  => 'required'
        ];

        $fileName = '';

        if( !empty( $request->file() )){

            $file = $request->file('cover_image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/blog';

            $file->move($destination, $fileName);
            $this->post->cover_image = $fileName;
        }

        $this->post->id=$request->input('id');
        $this->post->update();

        $locales=Config::get('app.locales');
        $title=$request->input('title');
        $body=$request->input('body');
        $id=$request->input('id');
        foreach($locales as $key => $locale ){
            if(!$title[$locale]) $title[$locale]='null';
            $this->trans->where('post_id', '=', $id)->where('locale', '=', $locale)->update([
                'title' => $title[$locale],
                'body' => $body[$locale]
            ]);
        }
        return redirect('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->where('id',$id)->delete();
        return redirect('/admin/blog');
    }
}