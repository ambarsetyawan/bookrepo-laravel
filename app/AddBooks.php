<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addbooks extends Model
{
    protected $table = 'books';
    protected $fillable = array('title', 'authur', 'description', 'published', 'retail');
}
