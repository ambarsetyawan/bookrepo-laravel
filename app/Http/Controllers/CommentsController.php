<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CommentsModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Auth;
use Session;

class CommentsController extends Controller
{

  public function postComment()
  {
  CommentsModel::create(array(
              'content' => Input::get('content'),
              'commenter_id' => Auth::user()->id,
              'book_id' => Session::get('bookid')
   ));

   Session::flash('commentsuccess','Comment Submitted!');
   return Redirect::back();
  }
}
