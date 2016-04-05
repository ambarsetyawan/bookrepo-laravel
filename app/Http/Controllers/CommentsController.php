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


             

    public function show()
    {
        {
           
            $BookComments = DB::table('comments')     
                ->select('users.name as username', 'books.id as bookid', 'books.title as bookstitle', 'comments.id', 'comments.content', 'comments.created_at')   
                ->join('books', 'books.id', '=', 'comments.book_id')                
                ->join('users', 'users.id', '=', 'comments.commenter_id')
                
                ->orderBy('comments.created_at')
                ->paginate(10);
     
             return view('managecomments')->with ('BookComments', $BookComments);
        }
    }




   public function destroy($id)
        {
          CommentsModel::destroy($id);

          Session::flash('comment_delete_message', 'Comment Deleted From Book And Database!');
          return Redirect::to('managecomments');
        }


}
