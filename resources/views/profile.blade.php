@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-md-3 col-md-offset-0">
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
                    {!! Form::label('email', $profileinfo->email) !!}
                </div>

                <div class="form-group" align="center">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                </div>

                 <div class="form-group" align="center">
                    {!! Form::label('dob', 'Date Of Birth (YYYY:MM:DD):') !!}
                    {!! Form::text('dob', $profileinfo->dob, ['class' => 'form-control']) !!}
                </div>


              {{ Form::submit('Update Profile', array('class' => 'btn btn-info')) }}

            {!! Form::close() !!}

              </div>
          </div>
      </div>


        <div class="col-md-9 col-md-offset-0">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> YOUR HISTORY</div></h2>
             <div class="panel-body">
 
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">

                                   

                                                      @yield('content')

                                                <thead>
                                                    <tr>
                                                        <th>Book</th>
                                                        <th>Comment</th>
                                                        <th>Submitted On</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tr>
                                                  <td>Example</th>
                                                  <td>Example</th>
                                                  <td>Example</th>
                                                  <td>Example</th>
                                                </tr>
                                               

                                              </table>

                                        </div>
          </div>
      </div>

</div>
</div>
@endsection
