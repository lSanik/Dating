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

/** Support Routes */
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/social/redirect/{provider}', [
        'as' => 'social.redirect',
        'uses' => 'Auth\AuthController@getSocialRedirect'
    ]);

    Route::get('/social/handle/{provider}', [
        'as' => 'social.handle',
        'uses' => 'Auth\AuthController@getSocialHandle'
    ]);

    /** Users */
    Route::post('/user/create/', 'UsersController@register');

    /** Access to States and Cities from different places of code */
    Route::post('/get/states/', 'StatesController@statesByCountry');
    Route::post('/get/cities/', 'CityController@getCityByState');

});

/**
 *  Free Routes
 */
Route::group([  'prefix' => LaravelLocalization::setLocale(),
                'middleware' => ['web'],
], function(){
    Route::get('/','HomeController@index');

    Route::get('contacts', 'ContactsController@show');
    Route::post('contacts/message', 'ContactsController@sendMessage');

    Route::get('blog', 'BlogController@all');
    Route::get('blog/{id}', 'BlogController@post');

    /** Pages */
    Route::get('{slug}', 'PagesController@show');
    Route::get('profile/show/{id}', 'UsersController@show');
});


Route::group([  'prefix'        => LaravelLocalization::setLocale(),
                'middleware'    => ['web', 'auth', 'roles'],
                'roles'         => ['Alien', 'Male', 'Female']
], function(){

    Route::get('search', 'SearchController@index');
    Route::get('antiscram', 'PagesController@antiscram');

    /** Users profile */
    Route::get('profile/{id}', 'UsersController@edit');
    Route::get('profile/{id}/photo', 'UsersController@profilePhoto');
    Route::get('profile/{id}/video', 'UsersController@profileVideo');
    Route::get('profile/{id}/mail', 'UsersController@profileMail');
    Route::get('profile/{id}/smiles', 'UsersController@profileSmiles');
    Route::get('profile/{id}/gifts', 'UsersController@profileGifts');
    Route::get('profile/{id}/finance', 'UsersController@finance');

});


/** Chat APIs */
Route::group([  'middleware' => ['web', 'auth', 'roles'],
    'roles' => ['Male', 'Female']
], function(){

    Route::get('api/chat-rooms', ['uses' => 'ChatRoomsController@getAll']);
    Route::post('api/chat-rooms', ['uses' => 'ChatRoomsController@create']);

    Route::get('api/messages/{chatRoom}', ['uses' => 'ChatMessagesController@getByChatRoom']);
    Route::post('api/messages/{chatRoom}', ['uses' => 'ChatMessagesController@createInChatRoom']);

    Route::get('api/messages/{lastMessage}/{chatRoom}', ['uses' => 'ChatMessagesController@getUpdates']);
});



/** Admin route group */
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

    /** Pages */
    Route::get('pages', 'Admin\PagesController@index');
    Route::get('pages/add', 'Admin\PagesController@create');
    Route::get('pages/edit/{id}', 'Admin\PagesController@edit');
    Route::get('pages/drop/{id}', 'Admin\PagesController@destroy');

    Route::post('pages/add', 'Admin\PagesController@store');
    Route::post('pages/edit/{id}', 'Admin\PagesController@update');
    Route::post('pages/dropFile', 'Admin\PagesController@dropFile');
    /** End pages */

    /** Horoscope */
    Route::get('horoscope', 'Admin\HoroscopeController@index');
    Route::get('horoscope/add', 'Admin\HoroscopeController@create');
    Route::get('horoscope/edit/{id}', 'Admin\HoroscopeController@edit');
    Route::get('horoscope/drop/{id}', 'Admin\HoroscopeController@destroy');

    Route::post('horoscope/add', 'Admin\HoroscopeController@store');
    Route::post('horoscope/edit/{id}', 'Admin\HoroscopeController@update');
    /** End horoscope */

});


