<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\BookModel;
use App\CommentsModel;

class User extends Authenticatable
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'dob',
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




     public function comments()
        {
            return $this->hasMany('App\CommentsModel');
        }


}
