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

// Method for retrieving list of users on manageusers  
    public function GetUsers()
    {
      $Users = \App\User::where('admin', 0)
            ->where('admin', 0)
            ->paginate(5);
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


// Method for deleting a user   
     public function destroy($id)
    {
      User::destroy($id);

      Session::flash('delete_user_message', 'User Deleted!');
      return Redirect::to('manageusers');
    }


// Method for banning a user   
    public function ban($id)
    {

          $banstatus = User::find($id);
          $banstatus->ban_status = 1;
          $banstatus->save();

        Session::flash('ban_user_message', 'User Has Been Banned!');
        return Redirect::to('manageusers');
    }


// Method for unbanning a user  
    public function unban($id)
    {

          $banstatus = User::find($id);
          $banstatus->ban_status = 0;
          $banstatus->save();

        Session::flash('unban_user_message', 'User Has Been Unbanned!');
        return Redirect::to('manageusers');
    }

}
