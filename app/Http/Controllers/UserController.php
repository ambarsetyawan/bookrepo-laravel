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
      $Users = \App\User::Paginate(8);
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



         public function destroy($id)
        {
          User::destroy($id);

          Session::flash('delete_user_message', 'User Deleted!');
          return Redirect::to('manageusers');
        }



        public function ban($id)
        {

              $banstatus = User::find($id);
              $banstatus->ban_status = 1;
              $banstatus->save();

            Session::flash('ban_user_message', 'User Has Been Banned!');
            return Redirect::to('manageusers');
        }


        public function unban($id)
        {

              $banstatus = User::find($id);
              $banstatus->ban_status = 0;
              $banstatus->save();

            Session::flash('unban_user_message', 'User Has Been Unbanned!');
            return Redirect::to('manageusers');
        }



    public function update(Request $request)
    {
      $user = User::find(Auth::user()->id);

      $user->password   = Hash::make(Input::get('password'));
      $user->dob      = Input::get('dob');

      $user->save();

        Session::flash('profile_updated_message', 'Profile Updated!');
        return Redirect::to('profile');
    }


}
