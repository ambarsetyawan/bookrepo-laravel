<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
  protected $table = 'contact';
  protected $fillable = array('id','name', 'email', 'message', 'created_at');
}
