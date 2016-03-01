<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddBooks extends Controller
{
    public funtion add(){
      AddBooks::create(array(
        'title'=>Input::get('title'),
          'authur'=>Input::get('authur'),
            'description'=>Input::get('description'),
              'published'=>Input::get('published')
      )
    }
}
