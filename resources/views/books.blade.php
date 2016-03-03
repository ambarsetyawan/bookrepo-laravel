@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
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
                                        <th>Title</th>
                                        <th>Authur</th>
                                        <th>Description</th>
                                        <th>Published On</th>
                                        <th>Retail Link</th>
                                    </tr>
                                </thead>
                                @foreach($AddedBooks as $key => $book)
                                <tr>
                                  <td>{{ $book->title }}</th>
                                  <td>{{ $book->authur }}</th>
                                  <td>{{ $book->description }}</th>
                                  <td>{{ $book->published }}</th>
                                  <td></th>
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
