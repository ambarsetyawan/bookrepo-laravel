@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">



        <div class="col-md-12 col-md-offset-0">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> ALL COMMENTS HISTORY</div></h2>
             <div class="panel-body" align="center">
 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('comment_delete_message'))
                            <div class="alert alert-success">
                                {{ Session::get('comment_delete_message') }}
                            </div>
                        @endif


                        <thead>
                            <tr>
                                <th>Commenter</th>
                                <th>Book</th>
                                <th>Comment</th>
                                <th>Submitted On</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                    @foreach($BookComments as $allcomments)    
                        <tr>
                          <td>{{$allcomments->username}}</th>
                          <td>{{$allcomments->bookstitle}}</th>
                          <td>{{$allcomments->content}}</th>
                          <td>{{$allcomments->created_at}}</th>
                          <td>{{ Form::open(['route' => ['managecomments', $allcomments->id], 'method' => 'delete']) }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                               {{ Form::close() }}</th>
                        </tr>

                      @endforeach

                      
                      </table>

                </div>
                 {!! $BookComments->render() !!} 
          </div>


      </div>

</div>
</div>
@endsection
