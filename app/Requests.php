<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
  protected $table = 'requests';
  protected $fillable = array('username', 'email', 'booktitle', 'bookauthur', 'created_at');
}
