@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    Hello  {{ Auth::user()->name }} <span class="#"></span> !
                    </p>You can start publishing books, editing existing entries or delete old entries.
                  </p>On this page you can also keep track of your website using features such as statictics, number of users online and number of books.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
