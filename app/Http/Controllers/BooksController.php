<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookModel;
use App\User;
use App\VotesModel;
use App\CommentsModel;
use App\CommentVotesModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Intervention\Image\ImageManager;
use DB;
use Auth;
use Resize;
use Redirect;
use Session;

class BooksController extends Controller
{

// Method for search books by title on browsebooks view
public function search(Request $request)
{

    $query = Input::get('query');
    $searchbooks = DB::table('books')
        ->where('title', 'LIKE', '%' . $query . '%')
        ->Paginate(5);
    $countresults = DB::table('books')
        ->where('title', 'LIKE', '%' . $query . '%')
        ->count();    

     return view('searchresults', compact('searchbooks', 'query', 'countresults'));
 }


// Method for search books by genre on browsebooks view
public function searchgenre(Request $request)
{
    $genrequery = Input::get('genrequery');
    $searchgenre = DB::table('books')
        ->where('genre', 'LIKE', '%' . $genrequery . '%')
        ->Paginate(5);
    $countgenreresults = DB::table('books')
        ->where('genre', 'LIKE', '%' . $genrequery . '%')
        ->count();    
        
     return view('searchgenreresults', compact('searchgenre', 'genrequery', 'countgenreresults'));
 }


// Method for retrieving and showing books on managebooks view
  public function GetBooks(){
    $AddedBooks =   \App\BookModel::Paginate(4);
    return view('managebooks')->with('AddedBooks', $AddedBooks);
  }


// Method for retrieving and showing books on browsebooks view
  public function RetrieveBooks(){
    $AddedBooks =   \App\BookModel::Paginate(12);
    return view('browsebooks')->with('AddedBooks', $AddedBooks);
  }


// Method for storing a new book
  public function store(Request $request)
  {
      $rules = array(
        'title' => 'required',
        'book_cover' => 'required',
        'authur' => 'required',
        'description' => 'required',
        'genre' => 'required',
        'published' => 'required',
        'retail' => 'required'
      );
      $validator = Validator::make(Input::all(), $rules);

    if ($validator-> fails())
        {
          return redirect('addbook')
          ->withErrors($validator)
          ->withInput();
        }
    else
        {
          $class = new \App\BookModel;
          $class->title = Input::get('title');
          $class->authur = Input::get('authur');
          $class->description = Input::get('description');
          $class->genre = Input::get('genre');
          $class->published = Input::get('published');
          $class->retail = Input::get('retail');
          
          $class -> save();

            $covereName = $class->id . '.' .
            $request->file('book_cover')->getClientOriginalExtension();
            $request->file('book_cover')->move(base_path() . '/public/uploads/', $covereName);

          Session::flash('bookaddedmessage', 'Book Added!');
          return Redirect::to('managebooks');
        }
    }


// Method for retrieving book info bookinfo view
    public function showbookinfo($id)
    {
     Session::put('bookid', $id);
  
     $bookinfo = BookModel::find($id);
     $comments = DB::table('comments')     
        ->select('comments.id as commentid', 'comments.content', 'comments.commenter_id as userid', 'comments.created_at', 'books.id as bookid', 'books.title as bookstitle', 'users.name as commentername')   
        ->join('books', 'books.id', '=', 'comments.book_id')                
        ->join('users', 'users.id', '=', 'comments.commenter_id')
        ->where('comments.book_id', '=', $id)
        ->orderBy('comments.created_at')              
        ->paginate(4);

     $votes = DB::table('votes')     
        ->selectRaw('votes.*, sum(votes.likes) as booklikes, sum(votes.dislikes) as bookdislikes')
        ->where('votes.book_id', '=', $id)
        ->get();

        return view('bookinfo')
           ->with ('bookinfo', $bookinfo)
           ->with ('comments', $comments)
           ->with ('votes', $votes);
    }


// Method for editing books on editbooks view
    public function edit($id)
    {
      $data = BookModel::findOrFail($id);
      return view('editbooks')->with('data', $data);
    }


// Method for updating books on editbooks view
    public function update($id, Request $request)
    {
       $data = BookModel::findOrFail($id);

       $this->validate($request, [
          'title' => 'required',
          'authur' => 'required',
          'description' => 'required',
          'genre' => 'required',
          'published' => 'required',
          'retail' => 'required'
        ]);

        $input = $request->all();
        $data->fill($input)->save();

        Session::flash('book_update_message', 'Book Updated!');
        return Redirect::to('managebooks');
      }


// Method for voting up books on browsebooks view
    public function voteup($id){
    $upvote = \App\VotesModel::where( 'book_id', '=' ,$id)->where('voter_id', '=' , Auth::id());

      if($upvote->exists()) 
      {
          Session::flash('already_voted_message', 'You Have Already Voted This Book! You Can Change Your Vote In Vote History Page!');
          return Redirect::back();
      }
     else 
      {
          $upvote = new \App\VotesModel;
          $upvote->voter_id = Auth::id();
          $upvote->book_id = $id;
          $upvote->likes = 1;
          $upvote->dislikes = 0;
         
          $upvote -> save();

          Session::flash('upvote_message', 'You Have Voted Up!');
          return Redirect::back();
        }
    }


// Method for voting down books on browsebooks view
       public function votedown($id){
       $downvote = \App\VotesModel::where( 'book_id', '=' ,$id)->where('voter_id', '=' , Auth::id());

      if($downvote->exists()) 
       {
          Session::flash('already_voted_message', 'You Have Already Voted This Book! You Can Change Your Vote In Vote History Page!');
          return Redirect::back();
        }
       else 
        {
          $downvote = new \App\VotesModel;
          $downvote->voter_id = Auth::id();
          $downvote->book_id = $id;
          $downvote->likes = 0;
          $downvote->dislikes = 1;
         
          $downvote -> save();

          Session::flash('downvote_message', 'You Have Voted Down!');
          return Redirect::back();
       }
    }


// Method for deleting books on managebooks view
    public function destroy($id)
    {
      BookModel::destroy($id);

      Session::flash('delete_message', 'Book Deleted!');
      return Redirect::to('managebooks');
    }




   public function destroycomment($id)
    {
      CommentsModel::destroy($id);

      Session::flash('comment_delete_message', 'Comment Deleted!');
      return Redirect::back();
    }

}
