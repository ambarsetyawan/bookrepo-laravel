@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $bookinfo->title }} <th>

                </th> </div>
                    <div class="panel-body">

                      {{ $bookinfo->authur }}
                      {{ $bookinfo->description }}
                      {{ $bookinfo->published }}
                      {{ $bookinfo->retail }}

                    </div>
                    <button class="btn btn-primary" onclick="history.go(-1)">
                      « Back
                    </button>
        </div>
    </div>
</div>
</div>
</div>
@endsection
