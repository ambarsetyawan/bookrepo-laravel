<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DiscussionPostsModel;

class DiscussionModel extends Model
{
     protected $table = 'discussions';
  	 protected $fillable = array('id','topic', 'creator_id', 'created_at', 'updated_at');



  	 // public function discussions()
    // {
    //     return $this->has_many('App\DiscussionPostsModel');
    // }


    //     public function delete()
    // {
    //     // delete all related photos 
    //     $this->discussions()->delete();
    //     // as suggested by Dirk in comment,
    //     // it's an uglier alternative, but faster
    //     // Photo::where("user_id", $this->id)->delete()

    //     // delete the user
    //     return parent::delete();
    // }
}
