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
use DB;
use Session;

class CommentsController extends Controller
{
  public function getcomments()
  {
    // $comments = \App\CommentsModel::find($id);

  $comments = DB::table('comments')
                
                ->join('books', 'comments.book_id', '=', 'books.id')
                ->join('users', 'comments.commenter_id', '=', 'users.id')

                ->get();


    //   $comments =   \App\CommentsModel::all();
    // $comments = CommentsModel::with('Commenter')-> orderBy('id', 'DESC')->get();
     // var_dump($comments);
     // return view('bookinfo')->with ('comments',$comments);
  }

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
