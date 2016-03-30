<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookModel;
use App\User;
use App\CommentsModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use DB;
use Auth;
use Redirect;
use Session;

class BooksController extends Controller
{

  public function GetBooks(){
    $AddedBooks =   \App\BookModel::Paginate(4);
    return view('managebooks')->with('AddedBooks', $AddedBooks);
  }


  public function RetrieveBooks(){
    $AddedBooks =   \App\BookModel::Paginate(12);
    return view('browsebooks')->with('AddedBooks', $AddedBooks);
  }


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

                 $request->file('book_cover')->move(
                     base_path() . '/public/uploads/', $covereName
                 );

              Session::flash('bookaddedmessage', 'Book Added!');
              return Redirect::to('managebooks');
            }
    }


        public function showbookinfo($id)
        {
             $bookinfo = BookModel::find($id);
             $comments = DB::table('comments')     
                ->select('comments.id', 'comments.content', 'comments.created_at', 'books.id as bookid', 'books.title as bookstitle', 'users.name as commentername')   
                ->join('books', 'books.id', '=', 'comments.book_id')                
                ->join('users', 'users.id', '=', 'comments.commenter_id')
                ->where('comments.book_id', '=', $id)
                ->orderBy('comments.created_at')              
                ->get();

             $votes = DB::table('votes')     
                ->select('votes.voter_id', 'users.name', 'books.title', 'votes.likes', 'votes.dislikes')   
                ->join('books', 'books.id', '=', 'votes.book_id')                
                ->join('users', 'users.id', '=', 'votes.voter_id')
                ->where('votes.book_id', '=', $id)

                ->get();


                Session::put('bookid', $id);

                return view('bookinfo')
                   ->with ('bookinfo', $bookinfo)
                   ->with ('comments', $comments)
                   ->with ('votes', $votes);

          // var_dump($votes);
        }



        public function edit($id)
        {
          $data = BookModel::findOrFail($id);
          // var_dump($editbook);
          return view('editbooks')->with('data', $data);
        }


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



        public function voteup($id){


              $class = new \App\VotesModel;
              $class->voter_id = Auth::id();
              $class->book_id = Session::get('bookid');
              $class->likes = 1;
              $class->dislikes = 0;
             

              // var_dump($class);


               $class -> save();


               return Redirect::to('browsebooks');
            }


        public function destroy($id)
        {
          BookModel::destroy($id);

          Session::flash('delete_message', 'Book Deleted!');
          return Redirect::to('managebooks');
        }
}
