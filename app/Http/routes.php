<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group([  'prefix' => 'admin',
                'middleware' => ['web', 'auth', 'roles'],
                'roles' => ['Owner', 'Moder', 'Partner']
], function(){

    Route::get('/', function(){
        return redirect('admin/dashboard');
    });
    Route::get('dashboard', 'Admin\AdminController@dashboard');
    Route::get('profile', 'Admin\AdminController@profile');

    Route::get('blog', 'Admin\BlogController@index');
    Route::get('blog/new', 'Admin\BlogController@create');

    Route::get('blog/edit/{id}','Admin\BlogController@edit');
    Route::get('blog/drop/{id}', 'Admin\BlogController@destroy');

    Route::post('blog/new', 'Admin\BlogController@store');
    Route::post('blog/edit/{id}', 'Admin\BlogController@update');

    Route::post('profile', 'Admin\AdminController@store_profile');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

/*
Route::group(['middleware' => ['web']], function () {

    Route::get('allAlbums', 'AlbumController@index');
    Route::get('/albums', 'AlbumController@getList' );
    Route::get('/create_album', 'AlbumController@getForm');
    Route::post('/create_album', ['as' => 'create_album', 'uses' => 'AlbumController@postCreate']);
    Route::get('/delete_album/{id}', ['as' => 'delete_album', 'uses' => 'AlbumController@getDelete']);

    // upload image route for MediumInsert plugin
    Route::any('upload', 'PostsController@upload');
// resource routes for posts
    Route::resource('posts', 'PostsController');

    Route::get('/album/{id}', ['as' => 'show_album', 'uses' => 'AlbumController@getAlbum']);

    Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@getForm'));
    Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
    Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@getDelete'));
});
*/