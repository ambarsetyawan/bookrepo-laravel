<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RequestModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;

class RequestsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
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
              $class = new \App\RequestModel;
              $class->username = Input::get('username');
              $class->email = Input::get('email');
              $class->booktitle = Input::get('booktitle');
              $class->bookauthur = Input::get('bookauthur');

              $class -> save();

              Session::flash('successmessage', 'Request Sent!');
              return Redirect::to('request');
            }

    }


    public function GetRequests(){
      $BookRequest =   \App\RequestModel::all();
      return view('recieverequests')->with('Requests', $BookRequest);
    }


    public function destroy($id)
    {
      RequestModel::destroy($id);

      Session::flash('delete_message', 'Request Deleted Successfully!');
      return Redirect::to('recieverequests');
    }

}
