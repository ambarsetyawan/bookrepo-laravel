<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Input;
use Redirect;
use DB;
use Session;
use App\DiscussionModel;
use App\DiscussionPostsModel;

class DiscussionsController extends Controller
{
     public function GetTopics(){
    $Topics =   \App\DiscussionModel::Paginate(6);
    $TotalTopics =   \App\DiscussionModel::count();
      // var_dump($TotalReplies);
            
    return view('discussions')
              ->with('Topics', $Topics)
              ->with('TotalTopics', $TotalTopics);
  }


  public function store()
  {
      $rules = array(
        'topic' => 'required', 
      );

      $validator = Validator::make(Input::all(), $rules);

        if ($validator-> fails())
            {
              return redirect('discussions')
              ->withErrors($validator)
              ->withInput();
            }
        else
            {
              $newtopic = new \App\DiscussionModel;
              $newtopic->topic = Input::get('topic');
              $newtopic->creator_name = Auth::user()->name;
              $newtopic -> save();

              Session::flash('new_thread_message', 'New Topic Has Been Created!');
              return Redirect::to('discussions');

               // var_dump($newtopic);
            }
    }


		  public function showtopicposts($id)
		  {
        Session::put('topicid', $id);

		      $topicposts = DiscussionModel::find($id);
          $titleposts = DB::table('discussionposts')     
          ->select('discussionposts.discusser_id as userid', 'discussions.topic as discussiontopic', 'discussionposts.id as postid', 'users.name as discussername', 'discussionposts.discussion_post', 'discussionposts.created_at' )   
          ->join('users', 'users.id', '=', 'discussionposts.discusser_id')
          ->join('discussions', 'discussions.id', '=', 'discussionposts.topic_id')  
          ->where('discussionposts.topic_id', '=', $id)                
          ->orderBy('discussionposts.created_at')
          ->paginate(5);
     
          // var_dump($topicposts);

		      return view('discussionsposts')
                      ->with ('titleposts', $titleposts);
		  }





		  public function createtopicpost()
		  {

		  DiscussionPostsModel::create(array(
		              'topic_id' => Session::get('topicid'),
		              'discussion_post' => Input::get('discussion_post'),
		              'discusser_id' => Auth::id()
		   ));

		   Session::flash('topic_post_success','Post Has Been Submitted!');
		   return Redirect::back();
		  }





      public function destroy($id)
        {
          DiscussionModel::destroy($id);

          Session::flash('topic_delete_message', 'Topic Deleted!');
          return Redirect::to('discussions');
        }



      // public function destroypost()
      //   {
      //     DiscussionPostsModel::destroy($id);

      //     Session::flash('post_delete_message', 'Post Deleted!');
      //     return Redirect::back();
      //   }

}
