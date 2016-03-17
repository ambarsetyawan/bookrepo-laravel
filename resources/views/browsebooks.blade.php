@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <h2><i class="fa fa-book"></i> BROWSE BOOKS</h2>
         
        </div>
    </div>


 <div class="col-md-10 col-md-offset-1">
       

        @foreach($AddedBooks as $key => $book)
            <div class="col-md-3 col-md-offset-0">
                <div class="panel panel-default" >

                <div class="table-responsive">
                    <table class="class="col-xs-4">
                    <br><tr rowspan="2"  align="center"></td><td><img class="book-zoom img-responsive" src="/uploads/{{ $book->id }}.jpg" </td></tr>
                    <tr><td><a href="/browsebooks/{{ $book->id }}">{{ $book->title }}</td></tr>

                   </table>
                </div>

                </div>
            </div>
        @endforeach
        </div>
        
        </div>
    </div>
    </div>
</div>
@endsection
