<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;

class StatisticsController extends Controller
{

// Method for retrieving statistics using queries  
    public function GetStatistics()
    {
      $TotalUsers = \App\User::count();
      $TotalBooks = \App\BookModel::count();
      $TotalComments = \App\CommentsModel::count();
      $NewMessages = \App\ContactModel::count();
      $NewRequests = \App\RequestModel::count();
      $TotalTopics = \App\DiscussionModel::count();
      $TotalPosts = \App\DiscussionPostsModel::count();
      $TopBooks = DB::table('votes')     
                ->select('books.id as bookid', 'books.title as bookstitle')
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
                ->take(10)  
                ->get();         


	  return view('statistics')
	  		->with('TotalUsers',$TotalUsers)
	  		->with('TotalBooks',$TotalBooks)
	  		->with('TotalComments',$TotalComments)
	  		->with('NewMessages',$NewMessages)
	  		->with('NewRequests',$NewRequests)
        ->with('TotalTopics',$TotalTopics)
        ->with('TotalPosts',$TotalPosts)
	  		->with('TopBooks',$TopBooks)
        ->with('PopularGenere',$PopularGenere);
    }

}
