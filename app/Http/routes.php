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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/dashboard', function () {
    return view('dashboard');
    });


    Route::get('addbook', function () {
    return view('addbook');
    });

    Route::get('managebooks', function () {
    return view('managebooks');
    });

    Route::post('managebooks', 'BooksController@store');
    Route::get('managebooks', 'BooksController@GetBooks');
    Route::delete('managebooks/delete/{id}',array('uses' => 'BooksController@destroy', 'as' => 'managebooks'));

    Route::get('managebooks/edit/{id}',array('uses' => 'BooksController@edit', 'as' => 'editbooks'));
    Route::post('managebooks/edit/{id}',array('uses' => 'BooksController@update', 'as' => 'editbooks'));

    Route::get('statistics', function () {
    return view('statistics');
    });

    Route::get('manageusers', function () {
    return view('manageusers');
    });

    Route::get('manageusers', 'UserController@GetUsers');
    Route::delete('manageusers/delete/{id}',array('uses' => 'UserController@destroy', 'as' => 'manageusers'));


    Route::get('/request', function () {
    return view('request');
    });

    Route::post('request', 'RequestsController@store');


    Route::get('recieverequests', function () {
    return view('recieverequests');
    });

    Route::get('recieverequests', 'RequestsController@GetRequests');
    Route::delete('recieverequests/delete/{id}',array('uses' => 'RequestsController@destroy', 'as' => 'recieverequests'));


    Route::get('messages', function () {
    return view('messages');
    });

    Route::get('messages', 'ContactController@GetMessages');
    Route::delete('messages/delete/{id}',array('uses' => 'ContactController@destroy', 'as' => 'messages'));


   Route::get('profile',array('uses' => 'ProfileController@show', 'as' => 'profile'));
   Route::post('profile',array('uses' => 'ProfileController@update', 'as' => 'profile'));

   Route::get('managebooks/edit/{id}',array('uses' => 'BooksController@edit', 'as' => 'editbooks'));
   Route::get('profile/{id}',array('uses' => 'ProfileController@showProfile', 'as' => 'profile'));

    Route::get('/', function () {
    return view('welcome');
});


Route::get('/browsebooks', function () {
return view('browsebooks');
});

Route::get('browsebooks/{id}', 'BooksController@showbookinfo');

Route::post('browsebooks/{id}',array('uses' => 'CommentsController@postComment', 'as' => 'browsebooks/{id}'));

// Route::get('bookinfo/{id}', 'CommentsController@getComments');



Route::get('/contact', function () {
return view('contact');
});

Route::post('contact', 'ContactController@store');

Route::get('browsebooks', 'BooksController@RetrieveBooks');

Route::get('/home', 'HomeController@index');
});
