@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-12 col-md-offset-0">

  @if (Auth::user()->ban_status==1)


              <div class="col-md-8 col-md-offset-2">
                          <div class="panel panel-default">

                                  <div class="panel-heading"><i class="fa fa-info-circle"></i>     YOU ARE BANNED! </div>
                                  <div class="panel-body"> 
                                                  User {{ Auth::user()->name }}. The Admin has banned you from doing anything else on the website till furthur notice.<p>
                                                  The reasons for this could very well be due to one or many of the following reasons:<p>
                                                  - Abusing the commentary section</p>
                                                  - Use of profanity</p>
                                                  - Hacking</p>
                                                  - Complaints from other users etc.</p>
                                                                                                
                                                  If you think that you have been banned for reasons not of your doing, then please contact the admin.

                                  </div>
                              </div>
                      </div>



  @elseif (Auth::user()->ban_status!=1)


                  @if (Auth::guest() OR Auth::user()->admin!=1)
                  @elseif(Auth::user()->admin==1)
                  <div class="panel-heading"><h2><i class="fa fa-pencil-square-o"></i> ADMIN DASHBOARD</h2></div>
                  @endif
                  
                  @if (Auth::guest() OR Auth::user()->admin!=1)

                  <div class="panel-heading"><h2><i class="fa fa-pencil-square-o"></i> STANDARD DASHBOARD</h2></div>


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


                    <div class="col-md-8 col-md-offset-2">
                          <div class="panel panel-default">

                                  <div class="panel-heading"><i class="fa fa-info-circle"></i>     Info </div>
                                  <div class="panel-body"> 
                                                  Hello {{ Auth::user()->name }}. This is your dashboard where you will be redirected after you login. <p>
                                                  By becoming a user of this website, you have the following benefits:<p>
                                                  - Rating Books</p>
                                                  - Commenting on the Books</p>
                                                  - Request a Book</p>
                                                  - See The Link To Buy The Book</p>
                                                  - Manage Your Profile Info</p>
                                                  - View And Manage Your Comment History</p>
                                                  If you any problems, then use the Contact form on the menu bar to contact the admin.

                                  </div>
                              </div>
                      </div>


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


 @endif
        </div>
    </div>
</div>
@endsection
