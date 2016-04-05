<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentVotesModel extends Model
{
     protected $table = 'commentvotes';
    protected $fillable = array('id', 'bookcommenter_id', 'book_id', 'commentvoter_id', 'likes', 'dislikes');




    	 public function users()
        {
           return $this->belongsTo('App\User');
        }


         public function books()
        {
            return $this->belongsTo('App\BookModel');
        }


	 	public function comments()
	    {
	        return $this->belongsTo('App\CommentsModel');
	    }
}
