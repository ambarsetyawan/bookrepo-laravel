<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionPostsModel extends Model
{
     protected $table = 'discussionposts';
  	 protected $fillable = array('discussionpost_id','topic_id', 'discussion_post','discusser_id', 'created_at', 'updated_at');
}
