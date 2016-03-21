@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"  align="center">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                    <div class="panel-body">
                                        <h2><i class="fa fa-envelope"></i> Recieved Contact Messages</h2>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">

                                              @if(Session::has('delete_message'))
                                                          <div class="alert alert-success">
                                                              {{ Session::get('delete_message') }}
                                                          </div>
                                                      @endif

                                                      @yield('content')

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Recieved At</th>
                                                        <th>Manage Messages</th>
                                                    </tr>
                                                </thead>
                                                @foreach($Messages as $key => $message)
                                                <tr>
                                                  <td>{{ $message->name }}</th>
                                                  <td>{{ $message->email }}</th>
                                                  <td>{{ $message->created_at }}</th>
                                                  <td>  <form action="/messages/delete/{{ $message->id }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                         <a href="/messages/{{ $message->id }}" class ='btn btn-info'>View</a>
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
