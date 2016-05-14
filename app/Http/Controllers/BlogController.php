<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Post;

class BlogController extends Controller
{

    /**
     * @return mixed
     */
    public function all()
    {
        $posts = Post::all();

        return view('client.blog.all');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function post($id)
    {
        $post = Post::findOrFail($id);
        
        return view('client.blog.post');
    }
}
