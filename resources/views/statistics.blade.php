@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Registered Members </div>
                    <div class="panel-body">
                            {{ $TotalUsers}}
                    </div>
                </div>
        </div>

        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-exclamation"></i>     Total Books </div>
                    <div class="panel-body">
                             {{ $TotalBooks}}
                    </div>

                </div>
        </div>


        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-gavel"></i>     Top Ranking Books </div>
                    <div class="panel-body">

                    </div>
                </div>
        </div>

        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
 				<div class="panel-heading"><i class="fa fa-gavel"></i>     Popular Genre's </div>
                    <div class="panel-body">

                     
                    </div>
              </div>
         </div>
    </div>
</div>

@endsection
