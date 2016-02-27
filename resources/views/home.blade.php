@extends('layouts.standarduser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Standard User Dashboard</div>

                <div class="panel-body">
                    Hello  {{ Auth::user()->name }} <span class="#"></span> ! </p>You can start commenting on books and rating them.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
