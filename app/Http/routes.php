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


Route::group(['middleware' => 'web'], function () {

    Route::get('/social/redirect/{provider}',[
        'as'     => 'social.redirect',
        'uses'   => 'Auth\AuthController@getSocialRedirect'
    ]);

    Route::get('/social/handle/{provider}',[
        'as'    => 'social.handle',
        'uses'  => 'Auth\AuthController@getSocialHandle'
    ]);

});

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
    Route::post('blog/update', 'Admin\BlogController@update');

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

    Route::get('girls/{status}', 'Admin\GirlsController@getByStatus'); //Return all by status

    Route::get('girl/edit/{id}', 'Admin\GirlsController@edit'); // Edit Girl profile
    Route::get('girl/show/{id}', 'Admin\GirlsController@show'); // Show Girl profile

    Route::post('girl/check', ['as' => 'check_pass', 'uses' => 'Admin\GirlsController@check']); // Check passport at DB
    Route::post('girl/store', 'Admin\GirlsController@store'); //Store new to db
    Route::post('girl/edit/{id}','Admin\GirlsController@update');// Update db
    Route::post('girl/changeStatus', 'Admin\GirlsController@changeStatus'); //change girlStatus from edit profile page
    /** End Girls Profile routing */


    /** Start Gifts  */
    Route::get('gifts/', 'Admin\GiftsController@index');
    Route::get('gifts/new', 'Admin\GiftsController@create');
    Route::get('gifts/edit/{id}', 'Admin\GiftsController@edit');
    Route::get('gifts/drop/{id}', 'Admin\GiftsController@drop');

    Route::post('gifts/store', 'Admin\GiftsController@store');
    Route::post('gifts/update/{id}', 'Admin\GiftsController@update');

    Route::post('gifts/check_lang', ['as' => 'check_lang', 'uses' => 'Admin\GiftsController@check_language']);
    Route::post('gifts/save_present_translation', ['as' => 'save_present_translation', 'uses' => 'Admin\GiftsController@save_present_translation']);
    /** End gifts */


    /** Ticket System Routes */
    Route::get('support', 'Admin\TicketController@index');
    Route::get('support/new', 'Admin\TicketController@newTicket');
    Route::get('support/show/{ticket_id}', 'Admin\TicketController@show'); // show one ticket

    Route::get('support/answered', 'Admin\TicketController@answered');
    Route::get('support/closed', 'Admin\TicketController@closed');

    Route::post('support', 'Admin\TicketController@create'); //create new ticket
    Route::post('support/show/{ticket_id}', 'Admin\TicketController@answer');
    Route::post('support/close/{ticket_id}', 'Admin\TicketController@close');
    Route::post('support/{ticket_id}', 'Admin\TicketController@answer'); //add new answer to ticket
    /** End ticket System Routes */

    /** Finance */
    Route::get('finance', 'Admin\FinanceController@index');
    Route::get('finance/control', 'Admin\FinanceController@control');
    Route::get('finance/stat', 'Admin\FinanceController@stat');

    Route::post('finance/{id}','Admin\FinanceController@saveData');
    /* End finance */

});



Route::group(['middleware' => ['web']], function () {
    Route::get('/','HomeController@index');

    /** Global blog */
    Route::get('/blog/{id}', 'Admin\BlogController@show');

    /** Users */
    Route::post('/user/create/', 'UsersController@register');

    /** Access to States and Cities from different places of code */
    Route::post('/get/states/', 'StatesController@statesByCountry');
    Route::post('/get/cities/', 'CityController@getCityByState');

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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
