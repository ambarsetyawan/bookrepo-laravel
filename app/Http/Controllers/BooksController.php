<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;

class BooksController extends Controller
{

  public function GetBooks(){
    $AddedBooks =   \App\Addbooks::all();
    return view('addbooks')->with('AddedBooks', $AddedBooks);
  }

  public function RetrieveBooks(){
    $AddedBooks =   \App\Addbooks::all();
    return view('books')->with('AddedBooks', $AddedBooks);
  }

  public function store()
  {

      $rules = array(
        'title' => 'required',
        'authur' => 'required',
        'description' => 'required',
        'published' => 'required'
      );

      $validator = Validator::make(Input::all(), $rules);

        if ($validator-> fails())
            {
              return redirect('addbooks')
              ->withErrors($validator)
              ->withInput();
            }
        else
            {
              $class = new \App\Addbooks;
              $class->title = Input::get('title');
              $class->authur = Input::get('authur');
              $class->description = Input::get('description');
              $class->published = Input::get('published');

              $class -> save();


              Session::flash('message', 'Added Successfully');
              return Redirect::to('addbooks');
            }

    }
}
