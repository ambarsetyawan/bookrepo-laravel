@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                  @if (Auth::guest() OR Auth::user()->admin!=1)
                  <div class="panel-heading">Hello  {{ Auth::user()->name }} <span class="#"></span> !</div>
                  @elseif(Auth::user()->admin==1)
                  <div class="panel-heading"><h2><i class="fa fa-pencil-square-o"></i> ADMIN DASHBOARD</h2></div>
                  @endif

                  @if (Auth::guest() OR Auth::user()->admin!=1)

                <div class="col-md-13 col-md-offset-0">
                    <div class="panel panel-default">

                      <div id="makeMeScrollable">
                        <img src="images/1.jpg" id="1" />
                        <img src="images/2.jpg" id="2" />
                        <img src="images/3.jpg" id="3" />
                        <img src="images/4.jpg" id="4" />
                        <img src="images/5.jpg" id="5" />
                        <img src="images/6.jpg" id="6" />
                        <img src="images/7.jpg" id="7" />
                        <img src="images/8.jpg" id="8" />
                        <img src="images/9.jpg" id="9" />
                        <img src="images/10.jpg" id="10" />
                        <img src="images/11.jpg" id="11" />
                        <img src="images/12.jpg" id="12" />
                        <img src="images/13.jpg" id="13" />
                        <img src="images/14.jpg" id="14" />
                        <img src="images/15.jpg" id="15" />
                        <img src="images/16.jpg" id="16" />
                        <img src="images/17.jpg" id="17" />
                        <img src="images/18.jpg" id="18" />
                        <img src="images/19.jpg" id="19" />
                        <img src="images/20.jpg" id="20" />
                      </div>
                        </div>
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
                      <a href="{{ url('recieverequests') }}"><img class="img-zoom img-responsive" src="images/bookrequests.png" alt="Requests"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('messages') }}"><img class="img-zoom img-responsive" src="images/messages.png" alt="Messages"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('profile') }}"><img class="img-zoom img-responsive" src="images/profile.png" alt="Profile"/></a>
                  </div>

                  <div class="col-md-3 col-md-offset-0">
                       <a href="{{ url('/logout') }}"><img class="img-zoom img-responsive" src="images/logout.png" alt="Logout"/></a>
                  </div>
                    @endif

                    @if (Auth::user()->admin!=1)

                    <div class="col-md-3 col-md-offset-0">
                         <a href="{{ url('/browsebooks') }}"><img class="img-zoom img-responsive" src="images/browsebooks.png" alt="BrowseBooks"/></a>
                    </div>

                    <div class="col-md-3 col-md-offset-0">
                         <a href="{{ url('request') }}"><img class="img-zoom img-responsive" src="images/requestbook.png" alt="Request Book"/></a>
                    </div>

                    <div class="col-md-3 col-md-offset-0">
                         <a href="{{ url('profile') }}"><img class="img-zoom img-responsive" src="images/profile.png" alt="Profile"/></a>
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
