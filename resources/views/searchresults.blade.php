@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">

            <h2><i class="fa fa-book"></i> BOOKS SEARCH RESULTS</h2>
         
        </div>
    </div>


 <div class="col-md-12 col-md-offset-0">
                 <div class="panel panel-default">
           
 
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('post_delete_message'))
                            <div class="alert alert-success">
                                {{ Session::get('post_delete_message') }}
                            </div>
                        @endif


                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Authur</th>
                                <th>Genre</th>
                                <th>Published</th>
                            </tr>
                        </thead>


            @if (count($searchbooks) === 0)

               <p><strong><h3>No Results Found!</h3></strong></p>
              
                @elseif (count($searchbooks) >= 1)

                <p><strong><h3>{{$countresults}} Results Found!</h3></strong></p>

                     @foreach($searchbooks as $searchresults)  
                     <tr>
                          <td><strong><a href ="/browsebooks/{{$searchresults->id}}">{{$searchresults->title}}</a></strong></th>
                          <td>{{$searchresults->authur}}</th>
                          <td>{{$searchresults->genre}}</th>
                          <td>{{$searchresults->published}}</th>
                        </tr>

                 @endforeach
                @endif

             

                      </table>
         {!! $searchbooks->appends(Request::except("page"))->render() !!} 
                </div>

                  

            </div>
       <button class="btn btn-primary" onclick="history.go(-1)">
                      « Return Back
                    </button>
        </div>
             
    </div>
    </div>
    </div>
</div>
@endsection
