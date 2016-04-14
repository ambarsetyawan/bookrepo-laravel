<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\CommentsModel;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;
use DB;
use Auth;


class ProfileController extends Controller
{
       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        {
            $profileinfo = User::find(Auth::user()->id);
           
             return view('profile')->with ('profileinfo', $profileinfo);
        }
    }


        public function commenthistory()
        {
            {
               
                $usercommenthistory = DB::table('comments')     
                    ->select('users.name as username', 'books.id as bookid', 'books.title as bookstitle', 'comments.id', 'comments.content', 'comments.created_at')   
                    ->join('books', 'books.id', '=', 'comments.book_id')                
                    ->join('users', 'users.id', '=', 'comments.commenter_id')
                    ->where('comments.commenter_id', '=', (Auth::user()->id))
                    ->orderBy('comments.created_at')
                    ->paginate(6);
               
                 return view('commentshistory')
                        ->with ('usercommenthistory', $usercommenthistory);
            }
        }


        public function postshistory()
        {
            {
               
                $userposthistory = DB::table('discussionposts')     
                ->select('discussionposts.id as postid' ,'users.name as username','discussionposts.topic_id as topicid' , 'discussions.topic', 'discussionposts.discussion_post as mypost', 'discusser_id', 'discussionposts.created_at')   
                ->join('discussions', 'discussions.id', '=', 'discussionposts.topic_id')                
                ->join('users', 'users.id', '=', 'discussionposts.discusser_id')
                ->where('discussionposts.discusser_id', '=', (Auth::user()->id))
                ->orderBy('discussionposts.created_at')
                ->paginate(5);
               
                 return view('postshistory')
                        ->with ('userposthistory', $userposthistory);
            }
        }



    public function update(Request $request)
    {
      $user = User::find(Auth::user()->id);

      $user->password   = Hash::make(Input::get('password'));
      $user->dob      = Input::get('dob');

      $user->save();

        Session::flash('profile_updated_message', 'Profile Updated!');
        return Redirect::to('profile');
    }




      public function destroy($id)
        {
          CommentsModel::destroy($id);

          Session::flash('comment_delete_message', 'Comment Deleted From Book!');
          return Redirect::to('commentshistory');
        }

}
