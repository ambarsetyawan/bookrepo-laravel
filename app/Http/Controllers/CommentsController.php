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

// Method for posting comments on bookinfo view
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



// Method for showing comments on bookinfo view  
  public function show()
  {
    $BookComments = DB::table('comments')     
        ->select('users.name as username', 'books.id as bookid', 'books.title as bookstitle', 'comments.id', 'comments.content', 'comments.created_at')   
        ->join('books', 'books.id', '=', 'comments.book_id')                
        ->join('users', 'users.id', '=', 'comments.commenter_id')
        ->orderBy('comments.created_at')
        ->paginate(8);

     return view('managecomments')->with ('BookComments', $BookComments);
  }



// Method for deleting comments on managecomments view
   public function destroy($id)
      {
        CommentsModel::destroy($id);

        Session::flash('comment_delete_message', 'Comment Deleted From Book And Database!');
        return Redirect::to('managecomments');
      }


}
