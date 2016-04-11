<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Input;
use Redirect;
use Session;
use App\DiscussionModel;

class DiscussionsController extends Controller
{
     public function GetTopics(){
    $Topics =   \App\DiscussionModel::all();
    return view('discussions')->with('Topics', $Topics);
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
		      $topicposts = DiscussionModel::find($id);
		      return view('discussionsposts')->with ('topicposts', $topicposts);
		  }





		  public function createtopicpost()
		  {

		  DiscussionModel::create(array(
		              'topic' => Input::get('discussion_post'),
		              'discussion_post' => Input::get('discussion_post'),
		              'discusser_id' => Auth::user()->id
		   ));

		   Session::flash('topic_post_success','Post Has Been Submitted!');
		   return Redirect::back();
		  }


}
