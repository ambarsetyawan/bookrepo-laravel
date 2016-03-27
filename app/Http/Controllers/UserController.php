<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
     */

     protected $users;


    public function GetUsers()
    {
      $Users = \App\User::all();
	  return view('manageusers')->with('Users',$Users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    $user = new \App\User;
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');

		$user->save();

		return Redirect::to('manageusers');
    }

}
