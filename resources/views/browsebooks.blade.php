@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">

            <h2><i class="fa fa-book"></i> BROWSE BOOKS</h2>
         
        </div>
    </div>


 <div class="col-md-12 col-md-offset-0">
       

        @foreach($AddedBooks as $key => $book)
            <div class="col-md-2 col-md-offset-0">
                

                <div class="table">
                    <table class="class="col-xs-4">
                    <br><tr rowspan="2"  align="center"></td><td><a href="/browsebooks/{{ $book->id }}"><img class="book-zoom img-responsive" src="/uploads/{{ $book->id }}.jpg" width="250" height="378"> </td></tr>
                    <tr><td></td></tr>

                   </table>
                </div>

                
            </div>
        @endforeach
        </div>
        
        </div>
    </div>
    </div>
</div>
@endsection
