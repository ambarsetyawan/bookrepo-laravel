<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;

class RequestsController extends Controller
{

  public function GetRequests(){
    $Requests =   \App\Requests::all();
    return view('recieverequests')->with('Requests', $Requests);
  }



  public function store()
  {

      $rules = array(
        'username' => 'required',
        'email' => 'required',
        'booktitle' => 'required',
        'bookauthur' => 'required',
      );

      $validator = Validator::make(Input::all(), $rules);

        if ($validator-> fails())
            {
              return redirect('request')
              ->withErrors($validator)
              ->withInput();
            }
        else
            {
              $class = new \App\Requests;
              $class->username = Input::get('username');
              $class->email = Input::get('email');
              $class->booktitle = Input::get('booktitle');
              $class->bookauthur = Input::get('bookauthur');

              $class -> save();

              Session::flash('message', 'Added Successfully');
              return Redirect::to('request');
            }

    }
}
