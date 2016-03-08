<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;

class ContactController extends Controller
{


  public function GetMessages(){
    $Messages =   \App\Contact::all();
    return view('messages')->with('Messages', $Messages);
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


    public function destroy($id)
    {
      Contact::destroy($id);

      Session::flash('delete_message', 'Message Deleted!');
      return Redirect::to('messages');
    }

}
