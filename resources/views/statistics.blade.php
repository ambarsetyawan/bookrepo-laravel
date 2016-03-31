@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">


        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i>     Top 10 Ranking Books </div>
                    <div class="panel-body"> <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                         
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Likes</th>
                                                        
                                                    </tr>
                                                </thead>
                                                @foreach($TopBooks as $TopLikedBooks)      
                                                <tr>
                                                  <td>{{ $TopLikedBooks->bookstitle }}</th>
                                                  <td>{{ $TopLikedBooks->totallikes }}</th>
                                                </tr>
                                                @endforeach

                                              </table>

                                        </div>
                                    
                    </div>
                </div>
        </div>



<div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i>     Popular Genres </div>
                    <div class="panel-body"> <div class="table-responsive">
                                            <table class="table table-bordered table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Genre</th>
                                                         <th>Likes</th>
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                               
                                                @foreach($PopularGenere as $TopGeneres)      
                                                <tr>
                                                  <td>{{ $TopGeneres->bookgenres }}</th>
                                                  <td>{{ $TopGeneres->totallikes }}</th>
                                                </tr>
                                                @endforeach
                                     

                                              </table>

                                        </div>
                                    
                    </div>
                </div>
        </div>

        <div class="col-md-2 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Total Members </div>
                    <div class="panel-body">
                            {{ $TotalUsers}}
                    </div>
                </div>
        </div>

        <div class="col-md-2 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i>     Total Books </div>
                    <div class="panel-body">
                             {{ $TotalBooks}}
                    </div>

                </div>
        </div>


        <div class="col-md-2 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i>     Total Comments </div>
                    <div class="panel-body">
                             {{ $TotalComments}}
                    </div>

                </div>
        </div>

                <div class="col-md-2 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-exclamation"></i>  New Messages </div>
                    <div class="panel-body">
                            {{ $NewMessages}}
                    </div>
                </div>
        </div>

        <div class="col-md-2 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-exclamation"></i>     New Requests </div>
                    <div class="panel-body">
                             {{ $NewRequests}}
                             

                    </div>

                </div>
        </div>






       
    </div>
</div>

@endsection
