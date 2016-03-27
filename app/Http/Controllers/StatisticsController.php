<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class StatisticsController extends Controller
{
    public function GetTotal()
    {
      $TotalUsers = \App\User::count();
      $TotalBooks = \App\BookModel::count();
	  return view('statistics')
	  		->with('TotalUsers',$TotalUsers)
	  		->with('TotalBooks',$TotalBooks);
    }

}
