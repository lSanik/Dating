<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    /**
     * @return mixed
     */
    public function all()
    {
        $posts = \DB::table('posts')
            ->select('posts.id', 'cover_image', 'title', 'body')
            ->join('post_translation', 'posts.id', '=', 'post_translation.post_id')
            ->where('locale', '=', \App::getLocale())
            ->paginate(10);

        return view('client.blog.all')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function post($id)
    {
        $post = Post::findOrFail($id);

        return view('client.blog.post')->with([
            'post' => $post,
        ]);
    }
}
