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


Route::group(['prefix' => LaravelLocalization::setLocale(),
              'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function()
    {
        return view('home');
    });

    Route::get('/blog/{id}', 'Admin\BlogController@show');


});

Route::group([  'prefix' => LaravelLocalization::setLocale(),
                'middleware' => ['localeSessionRedirect', 'localizationRedirect']
], function(){

});

Route::group([  'prefix' => LaravelLocalization::setLocale().'/admin',
                'middleware' => ['web', 'auth', 'roles' ],
                'roles' => ['Owner', 'Moder', 'Partner']
], function(){

    Route::get('/', function(){
        return redirect('admin/dashboard');
    });

    Route::get('dashboard', 'Admin\AdminController@dashboard');
    Route::get('profile', 'Admin\AdminController@profile'); //end

    Route::post('profile', 'Admin\AdminController@profile_update');
    /** Start Blog Routing */
    Route::get('blog', 'Admin\BlogController@index');
    Route::get('blog/new', 'Admin\BlogController@create');

    Route::get('blog/edit/{id}','Admin\BlogController@edit');
    Route::get('blog/drop/{id}', 'Admin\BlogController@destroy');

    Route::post('blog/new', 'Admin\BlogController@store');
    Route::post('blog/edit/{id}', 'Admin\BlogController@update');
    /** Stop Blog Routing */



    /** Start Partners Profile routing */
    Route::get('partners', 'Admin\PartnerController@index');
    Route::get('partner/new', 'Admin\PartnerController@create');
    Route::get('partner/show/{id}', 'Admin\PartnerController@show');
    Route::get('partner/edit/{id}', 'Admin\PartnerController@edit');
    Route::get('partner/drop/{id}', 'Admin\PartnerController@destroy');

    Route::post('partner/store', 'Admin\PartnerController@store');
    Route::post('partner/edit/{id}', 'Admin\PartnerController@update');
    /** End partners profile routing */

    /** Start Moderator Profile routing */
    Route::get('moderators', 'Admin\ModeratorController@index');
    Route::get('moderator/new', 'Admin\ModeratorController@create');
    Route::get('moderator/show/{id}', 'Admin\ModeratorController@show');
    Route::get('moderator/edit/{id}', 'Admin\ModeratorController@edit');
    Route::get('moderator/drop/{id}', 'Admin\ModeratorController@destroy');

    Route::post('moderator/store', 'Admin\ModeratorController@store');
    Route::post('moderator/edit/{id}', 'Admin\ModeratorController@update');
    /** End Moderator Profile routing */

    /** Start Partners Profile routing */
    Route::get('partners', 'Admin\PartnerController@index');
    Route::get('partner/new', 'Admin\PartnerController@create');
    Route::get('partner/show/{id}', 'Admin\PartnerController@show');
    Route::get('partner/edit/{id}', 'Admin\PartnerController@edit');
    Route::get('partner/drop/{id}', 'Admin\PartnerController@destroy');

    Route::post('partner/store', 'Admin\PartnerController@store');
    Route::post('partner/edit/{id}', 'Admin\PartnerController@update');
    /** End partners profile routing */



    /** Start Moderator Profile routing */
    Route::get('moderators', 'Admin\ModeratorController@index');
    Route::get('moderator/new', 'Admin\ModeratorController@create');
    Route::get('moderator/show/{id}', 'Admin\ModeratorController@show');
    Route::get('moderator/edit/{id}', 'Admin\ModeratorController@edit');
    Route::get('moderator/drop/{id}', 'Admin\ModeratorController@destroy');

    Route::post('moderator/store', 'Admin\ModeratorController@store');
    Route::post('moderator/edit/{id}', 'Admin\ModeratorController@update');
    /** End Moderator Profile routing */

    /** Start Girls Profile routing */
    Route::get('girls', 'Admin\GirlsController@index'); //All
    Route::get('girl/new', 'Admin\GirlsController@create'); //Add new

    Route::get('/girl/check', 'Admin\GirlsController@check'); //Check by passport
    Route::get('/girls/{status}', 'Admin\GirlsController@getByStatus'); //Return all by status


    Route::get('girl/edit/{id}', 'Admin\GirlsController@edit'); // Edit Girl profile
    Route::get('girl/show/{id}', 'Admin\GirlsController@show'); // Show Girl profile

    Route::post('girl/store', 'Admin\GirlsController@store'); //Store new to db
    Route::post('girl/edit/{id}','Admin\GirlsController@update');// Update db


    /** End Girls Profile routing */


    /** Start Gifts  */
    // @todo Create gifts routs
    // @todo Make gifts Controllers
    // @todo Make gifts DB
    /** End gifts */


    /** Ticket System Routes */

    Route::get('support', 'Admin\TicketController@index'); // show ticket form page
    Route::get('support/{ticket_id}', 'Admin\TicketController@show'); // show one ticket

    Route::post('support', 'Admin\TicketController@create'); //create new ticket
    Route::post('support/{ticket_id}', 'Admin\TicketController@answer'); //add new answer to ticket

    /** End ticket System Routes */

});

Route::group(['middleware' => 'web'], function () {

    Route::get('/home', 'HomeController@index');



});


Route::group(['middleware' => ['web']], function () {

    Route::post('/get/states/', 'StatesController@statesByCountry');
    Route::post('/get/cities/', 'CityController@getCityByState');

    Route::get('/blog/{id}', 'Admin\BlogController@show');

/*
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
*/
});
