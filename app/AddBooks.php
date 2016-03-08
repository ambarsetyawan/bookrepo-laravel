<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addbooks extends Model
{
    protected $table = 'books';
    protected $fillable = array('id', 'title', 'authur', 'description', 'published', 'retail');
}
