@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">


                    <div class="panel-body">

                      @if(Session::has('delete_message'))
                                  <div class="alert alert-success">
                                      {{ Session::get('delete_message') }}
                                  </div>
                              @endif

                                        <h2><i class="fa fa-users"></i> Management Users</h2>

                                        <div class="table-responsive" >
                                            <table class="table table-bordered table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Joined On</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                @foreach($Users as $key => $user)
                                                <tr>
                                                  <td>{{ $user->name }}</th>
                                                  <td>{{ $user->email }}</th>
                                                  <td>{{ $user->password }}</th>
                                                  <td>{{ $user->created_at }}</th>
                                                  <td> {{ Form::open(['route' => ['manageusers', $user->id], 'method' => 'delete']) }}
                                                       <input type="hidden" name="_method" value="DELETE">
                                                       <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                                                       {{ Form::close() }}</th>
                                                </tr>
                                                @endforeach
                                              </table>

                                        </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection
