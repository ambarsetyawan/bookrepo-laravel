@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   This is where you see the messages sent by other users to you.<th>


                </th> </div>
                    <div class="panel-body">
                                        <h2><i class="fa fa-users"></i> Recieved Contact Messages</h2>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">

                                              @if(Session::has('flash_message'))
                                                          <div class="alert alert-success">
                                                              {{ Session::get('flash_message') }}
                                                          </div>
                                                      @endif

                                                      @yield('content')

                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Message</th>
                                                        <th>Sent On</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                @foreach($Messages as $key => $message)
                                                <tr>
                                                  <td>{{ $message->id }}</th>
                                                  <td>{{ $message->name }}</th>
                                                  <td>{{ $message->email }}</th>
                                                  <td>{{ $message->message }}</th>
                                                  <td>{{ $message->created_at }}</th>
                                                  <td>  <form action="/messages/delete/{{ $message->id }}" method="POST">
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
