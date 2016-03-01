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

    Route::get('/admindash', function () {
    return view('admindash');
    });

    Route::get('/standarddash', function () {
    return view('standarddash');
    });

    Route::get('addbooks', function () {
    return view('addbooks');
    });

  


    Route::get('/statistics', function () {
    return view('statistics');
    });

    Route::get('/onlineusers', function () {
    return view('onlineusers');
    });



    Route::get('/', function () {
    return view('welcome');



});

Route::get('/books', function () {
return view('books');
});

Route::get('/request', function () {
return view('request');
});

Route::get('/contact', function () {
return view('contact');
});

Route::resource('/index', 'UserController');

Route::get('/home', 'HomeController@index');
});
