@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

 <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> YOUR BOOK COMMENT HISTORY</div></h2>
              <div class="panel-body"  align="center">

                 <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('comment_delete_message'))
                            <div class="alert alert-success">
                                {{ Session::get('comment_delete_message') }}
                            </div>
                        @endif


                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Comment</th>
                                <th>Submitted On</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                @if (count($usercommenthistory))
                    @foreach($usercommenthistory as $commenthistory)    
                        <tr>
                          <td><a href ="/browsebooks/{{$commenthistory->bookid}}">{{$commenthistory->bookstitle}}</th>
                          <td>{{$commenthistory->content}}</th>
                          <td>{{$commenthistory->created_at}}</th>
                          <td>{{ Form::open(['route' => ['commentshistory', $commenthistory->id], 'method' => 'delete']) }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                               {{ Form::close() }}</th>
                        </tr>
                      @endforeach
      

                    @else  
                     <p><strong><h3>You Have No Comment History!</h3></strong></p>
                    @endif   

                      </table>

                </div>
                 {!! $usercommenthistory->render() !!} 

              </div>
          </div>
      </div>


</div>
</div>

@endsection
