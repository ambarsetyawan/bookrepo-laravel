@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">

            <h2><i class="fa fa-book"></i> BROWSE BOOKS</h2>
         
        </div>
    </div>

<ul class="pager">
    <div class="col-md-4 col-md-offset-0">
        <li><a href="">Sort By Alphabetically Oder</a></li>   
    </div>

        <div class="col-md-4 col-md-offset-0">
            <li><a href="">Sort By Genre</a></li>
    </div>

        <div class="col-md-4 col-md-offset-0">
           <li><a href="">Sort By Popularity</a></li>  
    </div>
</ul>
    


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
        @foreach($AddedBooks as $key => $book)
            <div class="col-md-2 col-md-offset-0">
                

                <div class="table">
                    <table>

                    <br><tr rowspan="2"  align="center"></td><td><a href="/browsebooks/{{ $book->id }}"><img class="book-zoom img-responsive" src="/uploads/{{ $book->id }}.jpg"> </td></tr>
                    <tr><td></td></tr>

                   </table>

                       <div class="panel panel-default">
                             Vote <a href="/browsebooks/voteup/{{ $book->id }}"><img src="/images/up.png"></a>  /      
                             Vote <a href="/browsebooks/votedown/{{ $book->id }}"><img src="/images/down.png"></a>
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
