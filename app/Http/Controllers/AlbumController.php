<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function getAlbum($id)
    {
        $album = Album::with('Photos')->findOrFail($id);
        return view('albums.album')->with('album', $album);
    }

    public function getForm()
    {
        return view('albums.createAlbum');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'cover_image' => 'required|image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return Redirect::route('create_albums_form')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('cover_image');
        $random_name = str_random(16);
        $desination_path = '/uploads/albums/';

        $extension = $file->getClientOriginalExtension();
        $filename = $random_name. " _cover" .$extension;

        $uploadSuccess = $request->file('cover_image')
            ->move($desination_path, $filename);

        $album = Album::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'cover_image' => $filename
        ]);

        return Redirect::route('show_album', ['id' => $album->id]);


    }

    public function getDelete($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return Redirect::route('albums');
    }

    private function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
}
