@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   Book Repository<th>

                </th> </div>
                    <div class="panel-body">

                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Cover</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                @foreach($AddedBooks as $key => $book)
                                <tr>
                                  <td><img src="/uploads/{{ $book->id }}.png"></th>
                                  <td><a href="/browsebooks/{{ $book->id }}">{{ $book->title }}</th>

                                </tr>
                                @endforeach
                            </table>

                      </div>


                    </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
