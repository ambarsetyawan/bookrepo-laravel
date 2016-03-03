@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   Found A Book Thats Not On The Website? Make A Request To The Admin!<th>

                </th> </div>
                <div class="panel-body">
                  {!! Form::open() !!}

                  <!-- Title form input -->
                  <div class="form-group">
                      {!! Form::label('username', 'Name') !!}
                      {!! Form::text('username', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('email', 'Email:') !!}
                      {!! Form::text('email', null, ['class' => 'form-control']) !!}
                  </div>
                  <!-- Content form input -->
                  <div class="form-group">
                      {!! Form::label('booktitle', 'Book Title:') !!}
                      {!! Form::text('booktitle', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('bookauthur', 'Book Authur:') !!}
                      {!! Form::text('bookauthur', null, ['class' => 'form-control']) !!}
                  </div>


                {{ Form::submit('REQUEST', array('class' => 'btn')) }}

                {!! Form::close() !!}

                    </div>

                </div>
        </div>
    </div>
</div>
@endsection
