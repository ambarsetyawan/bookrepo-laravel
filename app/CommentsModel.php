<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CommentsModel extends Model
{
  protected $table = 'comments';
  protected $fillable = array('title','content','commenter_id');
  public $timestamps = true;

  public function Commenter(){

      return $this->belongsTo('commenter_id');
  }
}
