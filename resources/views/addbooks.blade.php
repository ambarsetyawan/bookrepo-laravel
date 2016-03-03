@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add A New Book</div>


                <div class="panel-body">

                  {!! Form::open() !!}

                  <!-- Title form input -->
                  <div class="form-group">
                      {!! Form::label('title', 'Title:') !!}
                      {!! Form::text('title', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('authur', 'Authur:') !!}
                      {!! Form::text('authur', null, ['class' => 'form-control']) !!}
                  </div>
                  <!-- Content form input -->
                  <div class="form-group">
                      {!! Form::label('description', 'Description:') !!}
                      {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('published', 'Publish Date:') !!}
                      {!! Form::text('published', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('retail', 'Retail Link:') !!}
                      {!! Form::text('retail', null, ['class' => 'form-control']) !!}
                  </div>

                {{ Form::submit('ADD BOOK', array('class' => 'btn')) }}

              {!! Form::close() !!}

                </div>

  <div class="panel-heading">Books On the Website Database</div>
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
                      <td>{{ $book->retail }}</th>
                      <td></th>
                    </tr>
                    @endforeach
                </table>

            </div>

            </div>
        </div>
    </div>
</div>
@endsection
