@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">   Have A Problem? Send The Admin A Message!<th>
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

                      @if(Session::has('sentmessage'))
                          <div class="alert alert-success">
                              {{ Session::get('sentmessage') }}
                          </div>
                      @endif


                      {!! Form::open() !!}

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('name', 'Name:') !!}
                          {!! Form::text('name', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('email', 'Email:') !!}
                          {!! Form::text('email', null, ['class' => 'form-control']) !!}
                      </div>
                      <!-- Content form input -->
                      <div class="form-group">
                          {!! Form::label('message', 'Message:') !!}
                          {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                      </div>


                    {{ Form::submit('Send', array('class' => 'btn')) }}

                    {!! Form::close() !!}

                    </div>

                    </div>

                </div>
        </div>
    </div>
</div>
@endsection
