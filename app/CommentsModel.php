<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BookModel;
use App\CommentsModel;

class CommentsModel extends Model
{
  protected $table = 'comments';
  protected $fillable = array('title','content','commenter_id', 'book_id');
  public $timestamps = true;


      public function users()
        {
            return $this->belongsTo('App\User');
        }

      public function books()
        {
            return $this->belongsTo('App\BookModel');
        }
}
