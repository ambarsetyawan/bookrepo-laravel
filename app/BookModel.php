<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\CommentsModel;

class BookModel extends Model
{
    protected $table = 'books';
    protected $fillable = array('id','book_cover', 'title', 'authur', 'description', 'genre', 'like', 'dislike', 'published', 'retail');


 	public function comments()
    {
        return $this->hasMany('App\CommentsModel');
    }


     public function votes()
        {
            return $this->hasMany('App\VotesModel');
        }

}
