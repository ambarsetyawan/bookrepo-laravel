@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">  <h2>EDIT BOOK</h2><th>
                </th> </div>
                    <div class="panel-body">

                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif


                  {!! Form::open() !!}

                    <!-- Title form input -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', $data->title, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('authur', 'Authur:') !!}
                        {!! Form::text('authur', $data->authur, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', $data->description, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('published', 'Publish Date:') !!}
                        {!! Form::text('published', $data->published, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">

                        {!! Form::label('retail', 'Retail Link:') !!}
                        {!! Form::text('retail', $data->retail, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Update Book', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                    </div>

                    </div>

                </div>
        </div>
    </div>
</div>
@endsection
