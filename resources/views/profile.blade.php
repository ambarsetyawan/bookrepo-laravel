@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">



      <div class="col-md-5 col-md-offset-3">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-user"></i> User Profile</div></h2>
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
                    {!! Form::label('name', $profileinfo->name) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::label('email',  $profileinfo->email) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('admin', 'Account Type:') !!}
                     @if (Auth::user()->admin!=1)
                        {!! Form::label('Standard') !!}
                     @elseif(Auth::user()->admin==1)
                          {!! Form::label('Adminstrator') !!}
                     @endif
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status:') !!}
                     @if (Auth::user()->banstatus!=1)
                        {!! Form::label('Not Banned') !!}
                     @elseif(Auth::user()->ban_status==1)
                          {!! Form::label('Banned') !!}
                     @endif
                </div>

                <div class="form-group">
                    {!! Form::label('joined', 'Joined On:') !!}
                    {!! Form::label('created_at',  $profileinfo->created_at) !!}
                </div>



                <div class="form-group" align="center">
                    {!! Form::label('password', 'Change Password:') !!}
                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                </div>



                <div class="form-group" align="center">
                    {{ Form::submit('Update Profile', array('class' => 'btn btn-info')) }}
                </div>

            {!! Form::close() !!}

              </div>
          </div>
      </div>


</div>
</div>
@endsection
