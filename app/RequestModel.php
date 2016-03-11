<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
  protected $table = 'requests';
  protected $fillable = array('name', 'email', 'message');
}
