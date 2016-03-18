<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;
use Auth;


class ProfileController extends Controller
{
       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        {
            $profileinfo = User::find(Auth::user()->id);     
             return view('profile')->with ('profileinfo', $profileinfo);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
