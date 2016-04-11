<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionModel extends Model
{
     protected $table = 'discussions';
  	 protected $fillable = array('id','topic', 'creator_id', 'created_at', 'updated_at');
}
