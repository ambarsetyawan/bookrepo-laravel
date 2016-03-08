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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);

      return View::make('user.edit', [ 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::find($id);

      $user->name = Input::get('name');
      $user->email      = Input::get('email');
      $user->password   = Hash::make(Input::get('password'));

      $user->save();

  return Redirect::to('manageusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::destroy($id);

      Session::flash('delete_message', 'User Deleted Successfully!');
	  	return Redirect::to('manageusers');
    }

}
