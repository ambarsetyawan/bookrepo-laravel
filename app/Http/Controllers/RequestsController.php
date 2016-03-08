<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookRequest;
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


  public function GetRequests(){
    $BookRequest =   \App\BookRequest::all();
    return view('recieverequests')->with('Requests', $BookRequest);
  }


  public function destroy($id)
  {
    BookRequest::destroy($id);

    Session::flash('delete_message', 'Request Deleted Successfully!');
    return Redirect::to('recieverequests');
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
              $class = new \App\BookRequest;
              $class->username = Input::get('username');
              $class->email = Input::get('email');
              $class->booktitle = Input::get('booktitle');
              $class->bookauthur = Input::get('bookauthur');

              $class -> save();

              Session::flash('successmessage', 'Request Sent!');
              return Redirect::to('request');
            }

    }

}
