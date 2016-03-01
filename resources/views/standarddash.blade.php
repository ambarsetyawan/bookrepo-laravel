@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">Notice</div>

                <div class="panel-body">
                    Hello  {{ Auth::user()->name }} <span class="#"></span> !
                  </p>Thanks for joining us.
                </p>You now have the ability to comment on books, give them a rating and go on retail links.

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
