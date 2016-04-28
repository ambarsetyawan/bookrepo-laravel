<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DiscussionModel;

class DiscussionPostsModel extends Model
{
     protected $table = 'discussionposts';
  	 protected $fillable = array('id','topic_id', 'discussion_post','discusser_id', 'created_at', 'updated_at');

       public function topicposts()
		{
		    return $this->belongsTo('App\DiscussionModel');
		}

}
