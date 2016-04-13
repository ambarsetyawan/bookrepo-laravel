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
            Route::group(['middleware' => 'admin'], function () {

            // Adding new books to the database route
                Route::get('addbook', function () {
                return view('addbook');
                });

            // Manage Books routes, connected controller and methods
                Route::get('managebooks', function () {
                return view('managebooks');
                });

                Route::post('managebooks', 'BooksController@store');
                Route::get('managebooks', 'BooksController@GetBooks');
                Route::delete('managebooks/delete/{id}',array('uses' => 'BooksController@destroy', 'as' => 'managebooks'));
                Route::get('managebooks/edit/{id}',array('uses' => 'BooksController@edit', 'as' => 'editbooks'));
                Route::post('managebooks/edit/{id}',array('uses' => 'BooksController@update', 'as' => 'editbooks'));


            // Manage Users routes, connected controller and methods
                Route::get('manageusers', function () {
                return view('manageusers');
                });

                Route::get('manageusers', 'UserController@GetUsers');
                Route::get('manageusers/ban/{id}',array('uses' => 'UserController@ban', 'as' => 'manageusers'));
                Route::get('manageusers/unban/{id}',array('uses' => 'UserController@unban', 'as' => 'manageusers'));
                Route::delete('manageusers/delete/{id}',array('uses' => 'UserController@destroy', 'as' => 'manageusers'));



            // Messages route, connected controllers and methods
                Route::get('messages', function () {
                return view('messages');
                });

                Route::get('messages', 'ContactController@GetMessages');
                Route::delete('messages/delete/{id}',array('uses' => 'ContactController@destroy', 'as' => 'messages'));
                Route::get('messages/{id}', 'ContactController@showmessagecontents');


            // Statistics view route, connected controller and methods
                Route::get('statistics', function () {
                return view('statistics');
                });

                Route::get('statistics', 'StatisticsController@GetStatistics');


            // Manage Comments routes, connected controller and methods
                Route::get('managecomments', function () {
                return view('managecomments');
                });

                Route::get('managecomments',array('uses' => 'CommentsController@show', 'as' => 'managecomments'));
                Route::delete('managecomments/{id}',array('uses' => 'CommentsController@destroy', 'as' => 'managecomments'));


            // Manage Requests route, connected controller and methods
                Route::get('recieverequests', function () {
                return view('recieverequests');
                });

                Route::get('recieverequests', 'RequestsController@GetRequests');
                Route::delete('recieverequests/delete/{id}',array('uses' => 'RequestsController@destroy', 'as' => 'recieverequests'));

            // RoleMiddleware ends here
            });


// Dashboard route, connected controllers and methods
    Route::auth();

    Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth']);

 // Contact Admin Route, connect controller and methods
    Route::get('/contact', function () {
    return view('contact');
    });

    Route::post('contact', 'ContactController@store');

// Request route, connected controllers and methods
    Route::get('/request', function () {
    return view('request');
    })->middleware(['auth', 'ban']);

    Route::post('request', 'RequestsController@store');


// Profile route, connected controllers and methods
    Route::get('profile',array('uses' => 'ProfileController@show', 'as' => 'profile'))->middleware(['ban']);
    Route::get('profile',array('uses' => 'ProfileController@show', 'as' => 'profile'))->middleware(['ban']);
    Route::post('profile',array('uses' => 'ProfileController@update', 'as' => 'profile'));
    Route::get('profile/{id}',array('uses' => 'ProfileController@showProfile', 'as' => 'profile'));


    Route::get('commentshistory',array('uses' => 'ProfileController@commenthistory', 'as' => 'commentshistory'))->middleware(['ban']);
    Route::delete('commentshistory/{id}',array('uses' => 'ProfileController@destroy', 'as' => 'commentshistory'));
    
    Route::get('postshistory',array('uses' => 'ProfileController@postshistory', 'as' => 'postshistory'))->middleware(['ban']);
    Route::delete('postshistory/{id}',array('uses' => 'PostsController@destroy', 'as' => 'postshistory'));

// Welcome route, connected controllers and methods
    Route::get('/', function () {
    return view('welcome');
    })->middleware(['ban']);


// Browse Books route, connected controllers and methods
    Route::get('/browsebooks', function () {
    return view('browsebooks');
    });

    Route::get('browsebooks', 'BooksController@RetrieveBooks')->middleware(['ban']);
    Route::get('browsebooks/{id}', 'BooksController@showbookinfo')->middleware(['ban']);
    Route::post('browsebooks/{id}',array('uses' => 'CommentsController@postComment', 'as' => 'browsebooks/{id}'));
    Route::get('/browsebooks/voteup/{id}', 'BooksController@voteup')->middleware(['auth', 'ban']);
    Route::get('/browsebooks/votedown/{id}', 'BooksController@votedown')->middleware(['auth', 'ban']);



// Discussions route, connected controllers and methods
    Route::get('discussions', function () {
    return view('discussions');
    })->middleware(['auth']);

    Route::get('discussions', 'DiscussionsController@GetTopics')->middleware(['auth', 'ban']);
    Route::post('discussions', 'DiscussionsController@store');
    Route::get('discussions/{id}', 'DiscussionsController@showtopicposts')->middleware(['auth', 'ban']);
    Route::post('discussions/{id}',array('uses' => 'DiscussionsController@createtopicpost', 'as' => 'discussions/{id}'));
    Route::delete('discussions/delete/{id}',array('uses' => 'DiscussionsController@destroy', 'as' => 'discussions'));

// Password reset routes, connected controllers, middleware and methods
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


    Route::get('/home', 'HomeController@index');
});