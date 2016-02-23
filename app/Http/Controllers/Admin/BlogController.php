<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    private $post;

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
     * @todo image uploads for cover image & blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->post->create([
            'title' => $request->input('title'),
            'body' => $request->input('body')
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
        //@todo - Добить блог (Саша)
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
