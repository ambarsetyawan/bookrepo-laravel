@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   This is where you can view and manage users of the website.<th>


                </th> </div>
                    <div class="panel-body">


                                        <h2><i class="fa fa-users"></i> Management Users</h2>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Joined On</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                @foreach($Users as $key => $user)
                                                <tr>
                                                  <td>{{ $user->name }}</th>
                                                  <td>{{ $user->email }}</th>
                                                  <td>{{ $user->created_at }}</th>
                                                  <td> <form action="/manageusers/delete/{{ $user->id }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button></th>
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
