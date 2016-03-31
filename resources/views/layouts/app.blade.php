<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome To BookRepo</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="/js/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
    <script src="/js/jqueryautoscroll.js" type="text/javascript"></script>
    <script src="/js/jqueryzoomimg.js" type="text/javascript"></script>
    <script src="/js/jqueryshowmore.js" type="text/javascript"></script>

</head>


<body id="app-layout">


    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                  @if (Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i>HOME</a>
                  @elseif (Auth::user()->admin!=1)
                <a class="navbar-brand" href="{{ url('/dashboard') }}"><i class="fa fa-home"></i>DASH</a>
                  @elseif(Auth::user()->admin==1)
                <a class="navbar-brand" href="{{ url('/dashboard') }}"><i class="fa fa-home"></i>ADMIN</a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                  <!-- Authentication Links -->
                  @if (Auth::guest() OR Auth::user()->admin!=1)
                  <li><a href="{{ url('/browsebooks') }}"><i class="fa fa-book"></i> Browse Books</a></li>
                  <li><a href="{{ url('/request') }}"><i class="fa fa-retweet"></i></i> Request Book</a></li>
                  <li><a href="{{ url('contact') }}"><i class="fa fa-envelope-square"></i> Contact Admin</a></li>

                  @elseif(Auth::user()->admin==1)

                  <li><a href="{{ url('/browsebooks') }}"><i class="fa fa-book"></i> Browse Books</a></li>
                 
                  <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <i class="fa fa-info"></i>   Management <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('addbook') }}"><i class="fa fa-plus"></i> Add Book</a></li>
                              <li><a href="{{ url('managebooks') }}"><i class="fa fa-book"></i> Manage Books</a></li>
                              <li><a href="{{ url('manageusers') }}"><i class="fa fa-users"></i> Manage Users</a></li>
                            

                            </ul>
                   </li>

                
                 <li><a href="{{ url('recieverequests') }}"><i class="fa fa-exclamation"></i> Book Requests</a></li>
                   <li><a href="{{ url('statistics') }}"><i class="fa fa-bar-chart"></i> Statistics</a></li>         
                 
                  

                  @endif
                </ul>




                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-book"></i> Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <i class="fa fa-user"></i>   {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
 
                                @if (Auth::guest() OR Auth::user()->admin!=1)
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-pencil-square-o"></i> Your Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                @elseif(Auth::user()->admin==1)
                                <li><a href="{{ url('/messages') }}"><i class="fa fa-pencil-square-o"></i> Messages</a></li>
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-file"></i> Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>

                                @endif

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


      <div id="footar" align="center">
            @include('footer')
      </div>


</body>
</html>
