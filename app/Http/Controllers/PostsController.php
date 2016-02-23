<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Caster\ResourceCaster;

class PostsController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->all();
        return view('blog.posts')->with([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'body'  => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if( $validator->passes() )
        {
            $this->post->create($request->all());
            return Response::json(['success' => true, 'errors' => '', 'message' => 'Post created successfully']);
        }
        return Response::json(array('success' => false, 'errors' => $validator, 'message' => 'All fields are required.'));

    }

    public function show($id)
    {
        return view('blog.show')->with([
            'post' => $this->post->findOrFail($id)
        ]);
    }


    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect('blog');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $input = ['image' => $file];
        $rules = [
          'image' => 'image'
        ];

        $validator = Validator::make($input, $rules);
        if($validator->fails())
        {
            return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
        }

        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);

        echo url('/uploads/'. $fileName);
    }



}
