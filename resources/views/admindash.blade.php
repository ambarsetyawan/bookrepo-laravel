@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><i class="fa fa-pencil-square-o"></i> ADMIN DASHBOARD</h2></div>
            </div>
        </div>


        <div class="col-md-3 col-md-offset-0">
             <a href="{{ url('statistics') }}"><img class="img-zoom" src="images/statistics.png" alt="Statistics"/></a>
        </div>


        <div class="col-md-3 col-md-offset-0">
             <a href="{{ url('managebooks') }}"><img class="img-zoom" src="images/managebooks.png" alt="Books"/></a>
        </div>

        <div class="col-md-3 col-md-offset-0">
             <a href="{{ url('manageusers') }}"><img class="img-zoom" src="images/manageusers.png" alt="Users"/></a>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <a href="{{ url('recieverequests') }}"><img class="img-zoom" src="images/bookrequests.png" alt="Users"/></a>
        </div>

        <div class="col-md-3 col-md-offset-0">
             <a href="{{ url('messages') }}"><img class="img-zoom" src="images/messages.png" alt="Messages"/></a>
        </div>

        <div class="col-md-3 col-md-offset-0">
             <a href="{{ url('/logout') }}"><img class="img-zoom" src="images/logout.png" alt="Logout"/></a>
        </div>

    </div>
  </div>
</div>
@endsection
