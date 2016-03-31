<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotesModel extends Model
{
    protected $table = 'votes';
    protected $fillable = array('id', 'voter_id', 'book_id', 'likes', 'dislikes');




    	 public function users()
        {
           return $this->belongsTo('App\User');
        }


         public function books()
        {
            return $this->belongsTo('App\BookModel');
        }
}
