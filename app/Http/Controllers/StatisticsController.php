<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;

class StatisticsController extends Controller
{
    public function GetStatistics()
    {
      $TotalUsers = \App\User::count();
      $TotalBooks = \App\BookModel::count();
      $TotalComments = \App\CommentsModel::count();
      $NewMessages = \App\ContactModel::count();
      $NewRequests = \App\RequestModel::count();
      $TopBooks = DB::table('votes')     
                ->select('books.title as bookstitle')
                ->selectRaw('votes.*, sum(votes.likes) as totallikes')
                ->join('books', 'books.id', '=', 'votes.book_id')  
                ->groupBy('bookstitle')
                ->orderBy('totallikes', 'DESC')  
                ->take(10)
                ->get();
       $PopularGenere = DB::table('votes')     
                ->select('books.genre as bookgenres')
                ->selectRaw('votes.*, sum(votes.likes) as totallikes')
                ->join('books', 'books.id', '=', 'votes.book_id')  
                ->groupBy('bookgenres')
                ->orderBy('totallikes', 'DESC')  
                ->get();         


	  return view('statistics')
	  		->with('TotalUsers',$TotalUsers)
	  		->with('TotalBooks',$TotalBooks)
	  		->with('TotalComments',$TotalComments)
	  		->with('NewMessages',$NewMessages)
	  		->with('NewRequests',$NewRequests)
	  		->with('TopBooks',$TopBooks)
        ->with('PopularGenere',$PopularGenere);
    }

}
