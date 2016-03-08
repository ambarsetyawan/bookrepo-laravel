@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>ADMIN DASHBOARD</h2></div>

                <div class="panel-body">
                    Hello  {{ Auth::user()->name }} <span class="#"></span> !
                    </p>You can start publishing books, editing existing entries or delete old entries.
                  </p>On this page you can also keep track of your website using features such as statictics, number of users online and number of books.
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">STATISTICS</div>

                  <div class="panel-body">
                  <img src="images/bg.jpg" border="1">
                  </div>

            </div>
        </div>


        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">MANAGE BOOKS</div>

                <div class="panel-body">
                  <img src="images/bg.jpg" border="1">
                </div>

            </div>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">MANAGE USERS</div>



                  <div class="panel-body">
                    <img src="images/bg.jpg" border="1">
                  </div>


            </div>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">BOOK REQUESTS</div>


                  <div class="panel-body">
                    <img src="images/bg.jpg" border="1">
                  </div>

            </div>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">MESSAGES</div>

                <div class="panel-body">
                  <img src="images/bg.jpg" border="1">
                </div>

            </div>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">LOGOUT</div>

                <div class="panel-body">
                  <img src="images/bg.jpg" border="1">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
