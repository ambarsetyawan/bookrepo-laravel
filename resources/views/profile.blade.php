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

                <div class="form-group" align="center">
                    {!! Form::label('password', 'Change Password:') !!}
                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                </div>

                 <div class="form-group" align="center">
                    {!! Form::label('dob', 'Date Of Birth:') !!}
                    {!! Form::text('dob', $profileinfo->dob, ['id' => 'datepicker']) !!}
                </div>


              {{ Form::submit('Update Profile', array('class' => 'btn btn-info')) }}

            {!! Form::close() !!}

              </div>
          </div>
      </div>


        <div class="col-md-9 col-md-offset-0">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> YOUR HISTORY</div></h2>
             <div class="panel-body" align="center">
 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('comment_delete_message'))
                            <div class="alert alert-success">
                                {{ Session::get('comment_delete_message') }}
                            </div>
                        @endif


                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Comment</th>
                                <th>Submitted On</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                    @foreach($userhistory as $history)    
                        <tr>
                          <td>{{$history->bookstitle}}</th>
                          <td>{{$history->content}}</th>
                          <td>{{$history->created_at}}</th>
                          <td>{{ Form::open(['route' => ['profile', $history->id], 'method' => 'delete']) }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                               {{ Form::close() }}</th>
                        </tr>
                      @endforeach

                      


                      </table>

                </div>
                 {!! $userhistory->render() !!} 
          </div>


      </div>

</div>
</div>
@endsection
