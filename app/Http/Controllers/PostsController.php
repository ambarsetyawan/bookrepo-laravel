<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DiscussionPostsModel;
use Redirect;
use Session;

class PostsController extends Controller
{

// Method for deleting user post history  	
       public function destroy($id)
        {
          DiscussionPostsModel::destroy($id);

          Session::flash('post_delete_message', 'Post Deleted!');
          return Redirect::back();
        }
}
