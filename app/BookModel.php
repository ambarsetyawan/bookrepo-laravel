<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BookModel extends Model
{
    protected $table = 'books';
    protected $fillable = array('id','book_cover', 'title', 'authur', 'description', 'published', 'retail');

}
