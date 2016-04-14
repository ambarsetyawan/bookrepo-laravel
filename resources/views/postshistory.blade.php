@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> YOUR DISCUSSION POST HISTORY</div></h2>
             <div class="panel-body" align="center">
 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('post_delete_message'))
                            <div class="alert alert-success">
                                {{ Session::get('post_delete_message') }}
                            </div>
                        @endif


                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>Post</th>
                                <th>Submitted On</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

               @if (count($userposthistory))       
                    @foreach($userposthistory as $posthistory)    
                        <tr>
                          <td><strong><a href ="/discussions/{{$posthistory->topicid}}">{{$posthistory->topic}}</a></strong></th>
                          <td>{{$posthistory->mypost}}</th>
                          <td>{{$posthistory->created_at}}</th>
                          <td>{{ Form::open(['route' => ['postshistory', $posthistory->postid], 'method' => 'delete']) }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                               {{ Form::close() }}</th>
                        </tr>
                      @endforeach
      

                 @else  
                     <p><strong><h3>You Have No Posts History!</h3></strong></p>
                 @endif  

                      </table>

                </div>
                 {!! $userposthistory->render() !!} 
          </div>
      </div>


</div>
</div>

@endsection
