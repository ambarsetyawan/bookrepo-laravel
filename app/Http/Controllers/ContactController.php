<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ContactModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;

class ContactController extends Controller
{

// Method for retrieving messages and displaying them on messagecontacts view
  public function GetMessages(){
    $Messages =   \App\ContactModel::all();
    return view('messages')->with('Messages', $Messages);
  }



// Method for retriecing and showing contents of comments on messagecontent view
  public function showmessagecontents($id)
  {
      $messageinfo = ContactModel::find($id);
      return view('messagecontents')->with ('messageinfo', $messageinfo);
  }


// Method for storing contact message to database
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
              $class = new \App\ContactModel;
              $class->name = Input::get('name');
              $class->email = Input::get('email');
              $class->message = Input::get('message');

              $class -> save();

              Session::flash('sentmessage', 'Message Sent!');
              return Redirect::to('contact');
            }
    }


// Method for deleting a contact message on messages view
    public function destroy($id)
    {
      ContactModel::destroy($id);

      Session::flash('delete_message', 'Message Deleted!');
      return Redirect::to('messages');
    }

}
