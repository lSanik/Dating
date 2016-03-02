<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Images;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{
    public function getForm($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.addimage')
            ->with('album', $album);
    }

    public function postAdd(Request $request)
    {
        $rules = [
            'album_id' => 'required|numeric|exists:albums,id',
            'image' => 'required|image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return Redirect::route('add_image', ['id' => $request->input('album_id')])
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_album_image.'.$extension;
        $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
        Images::create(array(
            'description' => $request->input('description'),
            'image' => $filename,
            'album_id'=> $request->input('album_id')
        ));

        return Redirect::route('show_album',array('id'=> $request->input('album_id')));
    }

    public function getDelete($id)
    {
        $image = Images::find($id);
        $image->delete();
        return Redirect::route('show_album',array('id'=>$image->album_id));
    }
}
