@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">


        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i>  Top 10 Ranking Books </div>
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
                                  <td><a href ="/browsebooks/{{$TopLikedBooks->bookid}}">{{ $TopLikedBooks->bookstitle }}</th>
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

                    <div class="panel-heading"><i class="fa fa-info-circle"></i> Top 10 Popular Genres </div>
                     <div class="panel-body"> 
                      <div class="table-responsive">
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





      <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-exclamation"></i>  New Message(s) </div>
                    <div class="panel-body">
                           <h4><strong>{{ $NewMessages}}</strong></h4>
                    </div>
                </div>
        </div>

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-exclamation"></i>     New Request(s) </div>
                    <div class="panel-body">
                             <h4><strong>{{ $NewRequests}}</strong></h4>
                             

                    </div>

                </div>
        </div>



     <div class="col-md-6 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i> Total Database Population </div>
                           <script type="text/javascript">
                            google.charts.load("current", {packages:['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                              var data = google.visualization.arrayToDataTable([
                                ["Category", "Population", { role: "style" } ],
                                ["Members", {{ $TotalUsers}}, "#cc0000"],
                                ["Books",  {{ $TotalBooks}}, "#009933"],
                                ["Comments",  {{ $TotalComments}}, "#e6e600"],
                                ["Topics", {{ $TotalTopics}}, "#0000cc"],
                                ["Posts", {{ $TotalPosts}}, "#b87333"]
                              ]);

                              var view = new google.visualization.DataView(data);
                              view.setColumns([0, 1,
                                               { calc: "stringify",
                                                 sourceColumn: 1,
                                                 type: "string",
                                                 role: "annotation" },
                                               2]);

                              var options = {

                                width: 550,
                                height: 325,
                                bar: {groupWidth: "50%"},
                                legend: { position: "none" },

                              };
                              var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                              chart.draw(view, options);
                          }
                          </script>

                  <div id="columnchart_values" align="center"></div>
          </div>
     </div>
     </div>
    </div>
</div>

@endsection
