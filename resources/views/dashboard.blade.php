@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                  @if (Auth::guest() OR Auth::user()->admin!=1)
                  <div class="panel-heading">Notice</div>
                  @elseif(Auth::user()->admin==1)
                  <div class="panel-heading"><h2><i class="fa fa-pencil-square-o"></i> ADMIN DASHBOARD</h2></div>
                  @endif

@if (Auth::guest() OR Auth::user()->admin!=1)
                <div class="panel-body">

                        Hello  {{ Auth::user()->name }} <span class="#"></span> !
                      </p>Thanks for joining us.
                    </p>You now have the ability to comment on books, give them a rating and go on retail links.
                </div>

                  @elseif(Auth::user()->admin==1)
                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('statistics') }}"><img class="img-zoom img-responsive" src="images/statistics.png" alt="Statistics"/></a>
                  </div>


                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('managebooks') }}"><img class="img-zoom img-responsive" src="images/managebooks.png" alt="Books"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('manageusers') }}"><img class="img-zoom img-responsive" src="images/manageusers.png" alt="Users"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                      <a href="{{ url('recieverequests') }}"><img class="img-zoom img-responsive" src="images/bookrequests.png" alt="Users"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('messages') }}"><img class="img-zoom img-responsive" src="images/messages.png" alt="Messages"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('/logout') }}"><img class="img-zoom img-responsive" src="images/logout.png" alt="Logout"/></a>
                  </div>
                    @endif

            </div>
        </div>
    </div>
</div>
@endsection
