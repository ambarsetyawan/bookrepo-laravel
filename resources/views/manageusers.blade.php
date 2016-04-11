@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">


                    <div class="panel-body">

                      @if(Session::has('delete_user_message'))
                                  <div class="alert alert-success">
                                      {{ Session::get('delete_user_message') }}
                                  </div>
                              @endif

                              @if(Session::has('ban_user_message'))
                                  <div class="alert alert-danger">
                                      {{ Session::get('ban_user_message') }}
                                  </div>
                              @endif

                               @if(Session::has('unban_user_message'))
                                  <div class="alert alert-success">
                                      {{ Session::get('unban_user_message') }}
                                  </div>
                              @endif

                                        <h2><i class="fa fa-users"></i> Management Users</h2>

                                        <div class="table-responsive" >
                                            <table class="table table-bordered table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Joined On</th>
                                                         <th>Account Status</th>
                                                        <th>Manage User</th>
                                                        <th>Manage Account</th>
                                                    </tr>
                                                </thead>
                                                @foreach($Users as $key => $user)
                                                <tr>
                                                  <td>{{ $user->name }}</th>
                                                  <td>{{ $user->email }}</th>
                                                  <td>{{ $user->created_at }}</th>
                                                  <td>{{{$user->ban_status ? 'Banned' : 'Not Banned' }}}</th>
                                                  <td>{{ Form::open(['route' => ['manageusers', $user->id], 'method' => 'delete']) }}
                                                       <input type="hidden" name="_method" value="DELETE">
                                                       <button type="submit"class="btn btn-danger btn-mini">Delete</button></th>

                                                  <td>
                                                 @if(!$user->ban_status) 
                                                  <a href ="manageusers/ban/{{$user->id}}" class ='btn btn-danger'>Ban</a>
                                                  @elseif($user->ban_status) 
                                                      <a href ="manageusers/unban/{{$user->id}}" class ='btn btn-info'>Unban</a></th>
                                                   @endif
                                                       {{ Form::close() }}

                                                @endforeach
                                              </table>

                                    {!! $Users->render() !!} 


                                        </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
