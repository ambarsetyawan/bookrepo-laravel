<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\CommentsModel;
use App\VotesModel;
use App\DiscussionModel;
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

// Method for retrieving user profile         
    public function show()
    {
        {
            $profileinfo = User::find(Auth::user()->id);
           
             return view('profile')->with ('profileinfo', $profileinfo);
        }
    }


// Method for retrieving user comment history  
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


// Method for retrieving user posts history  
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


// Method for retrieving user comment history  
        public function managemytopics()
        {
            {
                $mytopics = DB::table('discussions')     
                    ->select('discussions.id as topicid', 'discussions.creator_name as topicadmin', 'discussions.topic as topictitle', 'discussions.created_at')                
                    ->where('discussions.creator_name', '=', (Auth::user()->name))
                    ->orderBy('discussions.created_at')
                    ->paginate(6);
               
                 return view('managetopics')
                        ->with ('mytopics', $mytopics);
            }
        }


// Method for deleting discussion topics  
      public function destroytopic($id)
        {
          DiscussionModel::destroy($id);

          Session::flash('my_topic_delete_message', 'Topic Deleted!');
         return Redirect::back();
        }

        
// Method for updating user profile  
        public function update(Request $request)
        {
          $user = User::find(Auth::user()->id);

          $user->password   = Hash::make(Input::get('password'));
          $user->save();

            Session::flash('profile_updated_message', 'Profile Updated!');
            return Redirect::to('profile');
        }



// Method for deleting user comment history    
      public function destroy($id)
        {
          CommentsModel::destroy($id);

          Session::flash('comment_delete_message', 'Comment Deleted From Book!');
          return Redirect::to('commentshistory');
        }



// Method for retrieving books vote history  
        public function votehistory()
        {
            {
                $uservotehistory = DB::table('votes')     
                    ->select('votes.id as id', 'votes.book_id as bookid', 'books.title as booktitle', 'books.genre as bookgenre','votes.likes as booklike', 'votes.dislikes as bookdislike', 'votes.created_at')   
                    ->join('books', 'books.id', '=', 'votes.book_id')                
                    ->where('votes.voter_id', '=', (Auth::user()->id))
                    ->orderBy('votes.created_at')
                    ->paginate(8);
               
                 return view('votehistory')
                        ->with ('uservotehistory', $uservotehistory);
            }
        }



// Method for liking a book   
        public function likebook($id)
        {

              $booklike = VotesModel::find($id);
              $booklike->likes = 1;
              $booklike->dislikes = 0;
              $booklike->save();

            Session::flash('book_like_message', 'Vote Has Been Changed To Like!');
            return Redirect::back();
           // var_dump($booklike);
        }


// Method for disliking a book  
        public function dislikebook($id)
        {
              $bookdislike = VotesModel::find($id);
              $bookdislike->likes = 0;
              $bookdislike->dislikes = 1;
              $bookdislike->save();

            Session::flash('book_dislike_message', 'Vote Has Been Changed To Dislike!');
             return Redirect::back();
        }


}
