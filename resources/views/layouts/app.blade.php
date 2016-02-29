<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
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

                <!-- Branding Image -->
<<<<<<< HEAD


                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i>
                    Home
=======
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
<<<<<<< HEAD
>>>>>>> parent of c21a325... Dashboard and welcome screen changes
=======
>>>>>>> parent of c21a325... Dashboard and welcome screen changes
                </a>


            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
<<<<<<< HEAD
<<<<<<< HEAD
                  <!-- Authentication Links -->

                  <li><a href="{{ url('/books') }}"><i class="fa fa-book"></i> Browse Books</a></li>
                  <li><a href="{{ url('/request') }}"><i class="fa fa-retweet"></i></i> Request Book</a></li>
                  <li><a href="{{ url('/contact') }}"><i class="fa fa-envelope-square"></i> Contact Admin</a></li>


=======
                    <li><a href="{{ url('/home') }}">Home</a></li>
>>>>>>> parent of c21a325... Dashboard and welcome screen changes
=======
                    <li><a href="{{ url('/home') }}">Home</a></li>
>>>>>>> parent of c21a325... Dashboard and welcome screen changes
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
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="panel-heading" align="center">
            @include('footer')
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
