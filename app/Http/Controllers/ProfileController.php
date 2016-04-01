<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\CommentsModel;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;
use DB;
use Auth;


class ProfileController extends Controller
{
       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        {
            $profileinfo = User::find(Auth::user()->id);
            $userhistory = DB::table('comments')     
                ->select('users.name as username', 'books.id as bookid', 'books.title as bookstitle', 'comments.id', 'comments.content', 'comments.created_at')   
                ->join('books', 'books.id', '=', 'comments.book_id')                
                ->join('users', 'users.id', '=', 'comments.commenter_id')
                ->where('comments.commenter_id', '=', (Auth::user()->id))
                ->orderBy('comments.created_at')
                ->paginate(8);
     
             return view('profile')
                    ->with ('profileinfo', $profileinfo)
                    ->with ('userhistory', $userhistory);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $user = User::find(Auth::user()->id);

      $user->password   = Hash::make(Input::get('password'));
      $user->dob      = Input::get('dob');

      $user->save();

        Session::flash('profile_updated_message', 'Profile Updated!');
        return Redirect::to('profile');
    }




      public function destroy($id)
        {
          CommentsModel::destroy($id);

          Session::flash('comment_delete_message', 'Comment Deleted From Book!');
          return Redirect::to('profile');
        }


}
