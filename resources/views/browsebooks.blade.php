@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">

            <h2><i class="fa fa-book"></i> BROWSE BOOKS</h2>
              
        </div>
    </div>

    <div class="col-md-1 col-md-offset-1">

       <form id="custom-search-form" class="form-search form-horizontal pull-right" action="{{ URL::action('BooksController@searchgenre') }}" method="get">
                    <input type="text" class="search-query" name="genrequery" placeholder="Search By Genre...">
                    <button type="submit" class="btn btn-info">Search<i class="icon-search"></i></button>
      </form>

   </div>


     <div class="col-md-1 col-md-offset-9">

       <form id="custom-search-form" class="form-search form-horizontal pull-right" action="{{ URL::action('BooksController@search') }}" method="get">
                    <input type="text" class="search-query" name="query" placeholder="Search By Title..." >
                    <button type="submit" class="btn btn-info">Search<i class="icon-search"></i></button>
      </form>

 </div>

 <div class="col-md-12 col-md-offset-0">
       
                      @if(Session::has('upvote_message'))
                            <div class="alert alert-success">
                                {{ Session::get('upvote_message') }}
                            </div>
                        @endif

                     @if(Session::has('downvote_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('downvote_message') }}
                            </div>
                        @endif

                      @if(Session::has('already_voted_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('already_voted_message') }}
                            </div>
                       @endif


        @foreach($AddedBooks as $key => $book)
            <div class="col-md-2 col-md-offset-0">
                
                <div class="table">
                    <table>

                    <br><tr rowspan="2"  align="center"></td><td><a href="/browsebooks/{{ $book->id }}"><img class="book-zoom img-responsive" src="/uploads/{{ $book->id }}.jpg"> </td></tr>
                    <tr><td></td></tr>

                   </table>

                       <div class="panel panel-default">

                        @if (Auth::guest())
                            Sign In To Rate!

                        @elseif(Auth::user())
                                        

                                             Rate It - <a href="/browsebooks/voteup/{{ $book->id }}"><img src="/images/up.png"></a>  /      
                                                        <a href="/browsebooks/votedown/{{ $book->id }}"><img src="/images/down.png"></a>

                                                 
                        @endif
                        </div>
                </div>


                
            </div>
        @endforeach
        </div>
        
          {!! $AddedBooks->render() !!} 
          
        </div>
    </div>
    </div>
</div>
@endsection
