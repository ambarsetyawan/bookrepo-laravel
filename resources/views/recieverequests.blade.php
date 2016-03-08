@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   This is where you can view the requests made by users.<th>


                </th> </div>
                    <div class="panel-body">
                                        <h2><i class="fa fa-users"></i> Recieved Requests</h2>
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
                                                        <th>Book Title</th>
                                                        <th>Book Authur</th>
                                                        <th>Requested At</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                @foreach($Requests as $key => $requested)
                                                <tr>
                                                  <td>{{ $requested->username }}</th>
                                                  <td>{{ $requested->email }}</th>
                                                  <td>{{ $requested->booktitle }}</th>
                                                  <td>{{ $requested->bookauthur }}</th>
                                                  <td>{{ $requested->created_at }}</th>
                                                  <td></th>
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
