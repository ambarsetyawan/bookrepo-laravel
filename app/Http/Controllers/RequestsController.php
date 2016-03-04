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


  public function destroy($id)
  {
      $task = Task::findOrFail($id);

      $task->delete();

      Session::flash('flash_message', 'Requests Deleted Successfully!');

      return redirect()->route('recieverequests');
  }


  public function store()
  {

      $rules = array(


        'name' => 'required',
        'email' => 'required',
        'message' => 'required',

      );


      $validator = Validator::make(Input::all(), $rules);

        if ($validator-> fails())
            {
              return redirect('contact')
              ->withErrors($validator)
              ->withInput();
            }
        else
            {
              $class = new \App\Contact;
              $class->name = Input::get('name');
              $class->email = Input::get('email');
              $class->message = Input::get('message');

              $class -> save();

              Session::flash('sentmessage', 'Message Sent!');
              return Redirect::to('contact');
            }

    }
}
