<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App;

use App\Models\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class BlogController extends Controller
{
    private $post;


    /*
     * @todo загрузка файлов бля блоговой записи с полся body
     * @todo мультиязычность
     */

    public function __construct(Post $post)
    {
        $this->post = $post;
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

        return view('admin.blog.index')->with([
            'heading' => $heading,
            'posts' => $posts,
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
            'heading' => $heading
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

        if( !empty( $request->file() )){

            $file = $request->file('cover_image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/blog';

            $file->move($destination, $fileName);
        }

        if( is_file( $destination."/".$fileName) )
        {
            $this->post->create([
                'title' => $request->input('title'),
                'body'  => $request->input('body'),
                'cover_image' => $fileName
            ]);
        }


        return redirect('/admin/blog');

    }


    public function show($id)
    {
        $lang_code = App::getLocale();

        $default_lang = Config::get('app.fallback_locale');

        $supported = Config::get('app.locales');




        if( $lang_code == $default_lang )
        {
            $post = $this->post->findOrFail($id);

        } else {

            if( in_array($lang_code, $supported) )
            {
                //@todo multilanguge

                $post = $this->post->find($id)->lang($lang_code)->get();
            }
        }

        return view('client.blog')->with([
            'post' => $post
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
        $post = $this->post->findOrFail($id);
        $heading = 'Редактировать: '.$post->title;
        return view('admin.blog.edit')->with([
            'post' => $post,
            'heading' => $heading
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
        //@todo - Добить блог
        print_r($request);
        print_r($id);
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
