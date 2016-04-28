@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">



        <div class="col-md-12 col-md-offset-0">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-clock-o"></i> MANAGE YOUR TOPICS</div></h2>
             <div class="panel-body" align="center">
 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('my_topic_delete_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('my_topic_delete_message') }}
                            </div>
                        @endif


                        <thead>
                            <tr>
                                    <th>My Topics</th>
                                    <th>Created By</th>
                                    <th>Created On</th>
                                    <th>Manage</th>
                            </tr>
                        </thead>

                    @foreach($mytopics as $allmytopics)    
                        <tr>
                          <td><a href ="/discussions/topic/{{$allmytopics->topicid}}">{{$allmytopics->topictitle}}</th>
                          <td>{{$allmytopics->topicadmin}}</th>
                          <td>{{$allmytopics->created_at}}</th>
                          <td>{{ Form::open(['route' => ['managetopics', $allmytopics->topicid], 'method' => 'delete']) }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                               {{ Form::close() }}</th>
                        </tr>

                      @endforeach

                      
                      </table>

                </div>
                 {!! $mytopics->render() !!} 
          </div>


      </div>

</div>
</div>
@endsection
