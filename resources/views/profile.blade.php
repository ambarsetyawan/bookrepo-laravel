@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-md-4 col-md-offset-0">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading"><i class="fa fa-user"></i> User Profile</div></h2>
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

                @if(Session::has('profile_updated_message'))
                    <div class="alert alert-success">
                        {{ Session::get('profile_updated_message') }}
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


              {{ Form::submit('Update Profile', array('class' => 'btn btn-info')) }}

            {!! Form::close() !!}

              </div>
          </div>
      </div>
</div>
</div>
@endsection
