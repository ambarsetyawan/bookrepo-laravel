@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

 <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> YOUR BOOK VOTES HISTORY</div></h2>
              <div class="panel-body"  align="center">

                 <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('book_like_message'))
                            <div class="alert alert-success">
                                {{ Session::get('book_like_message') }}
                            </div>
                        @endif

                        @if(Session::has('book_dislike_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('book_dislike_message') }}
                            </div>
                        @endif

                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Genre</th>
                                <th>Liked</th>
                                <th>Disliked</th>
                                <th>Change Vote</th>
                            </tr>
                        </thead>
                @if (count($uservotehistory))
                    @foreach($uservotehistory as $bookvotehistory)    
                        <tr>
                          <td><strong><a href ="/browsebooks/{{$bookvotehistory->bookid}}">{{$bookvotehistory->booktitle}}</a></strong></th>
                          <td>{{$bookvotehistory->bookgenre}}</th>
                          <td>{{$bookvotehistory->booklike ? 'Yes' : 'No'}}</th>
                          <td>{{$bookvotehistory->bookdislike ? 'Yes' : 'No'}}</th>
                          <td> @if($bookvotehistory->booklike==0 & $bookvotehistory->bookdislike==1) 
                              <a href ="votehistory/like/{{$bookvotehistory->id}}" class ='btn btn-info'>Like</a>
                              @elseif($bookvotehistory->bookdislike==0 & $bookvotehistory->booklike==1) 
                              <a href ="votehistory/dislike/{{$bookvotehistory->id}}" class ='btn btn-danger'>Dislike</a></th>
                               @endif</th>
                        </tr>
                      @endforeach
      

                    @else  
                     <p><strong><h3>You Have No Votes History!</h3></strong></p>
                    @endif   

                      </table>

                </div>
                 {!! $uservotehistory->render() !!} 

              </div>
          </div>
      </div>


</div>
</div>

@endsection
