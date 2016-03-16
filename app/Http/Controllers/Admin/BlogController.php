<?php

namespace App\Http\Controllers\Admin;

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
     */

    public function __construct(Post $post, PostTranslation $trans)
    {
        $this->post = $post;
        $this->trans = $trans;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading = 'Все записи';
        $posts = $this->trans->all();

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
            'heading' => $heading,
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

        $this->trans->post_id   = $this->post->id;
        $this->trans->locale    = $request->input('current_locale');
        $this->trans->title     = $request->input('title');
        $this->trans->body      = $request->input('body');

        $this->trans->save();

        return redirect('/admin/blog');


    }


    public function show($id)
    {
        //@todo Show
        if( in_array( App::getLocale(), Config::get('app.locales') ) )
        {
            $post = $this->post->find($id)->lang( App::getLocale() )->get();
            $image = $this->post->select('cover_image')->find($id);
        }

        return view('client.blog')->with([
            'post' =>  json_decode($post),
            'image' => $image
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
        //@todo - Добить апдейт записи
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
