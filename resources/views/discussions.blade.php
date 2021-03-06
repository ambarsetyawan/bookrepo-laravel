@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">



        <div class="col-md-12 col-md-offset-0">
          <div class="panel panel-default">

            <h2>  <div class="panel-heading" align="center"><i class="fa fa-rss-square"></i> WELCOME TO BOOK-REPO DISCUSSION BOARD</div></h2>
             <div class="panel-body" align="center">
 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        @if(Session::has('new_thread_message'))
                            <div class="alert alert-success">
                                {{ Session::get('new_thread_message') }}
                            </div>
                        @endif

                      @if(Session::has('topic_delete_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('topic_delete_message') }}
                            </div>
                        @endif


                                                  
                            <thead>
                                <tr>
                                    <th>{{ $TotalTopics}} Topics</th>
                                    <th>Created By</th>
                                    <th>Created On</th>
                                  
                                </tr>
                            </thead>  

                            <tr>
                        @if (count($Topics))
                             @foreach($Topics as $key => $discussionthread)
                                     
                              <td><h5><strong><a href="/discussions/topic/{{ $discussionthread->id }}">{{ $discussionthread->topic }}</a></strong></h5></th>
                              <td>{{ $discussionthread->creator_name  }}</th> 
                              <td>{{ $discussionthread->created_at }}</th>
                                       
                            </tr>
                                  
                          @endforeach

                        @else  
                        <p><strong><h3>No Topics Exists! Be The First To Create A New One!</h3></strong></p>
                       @endif   


                      
                      </table>
                          {!! $Topics->render() !!} 
                </div>
                
          </div>


      </div>


 
<div class="row" align="center">
<div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
       <h2>  <div class="panel-heading" align="center"><i class="fa fa-info-circle"></i>  Create A New Topic</div></h2>
                    <div class="panel-body">

              
                     @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                     @if(Session::has('new_topic_message'))
                          <div class="alert alert-success">
                              {{ Session::get('new_topic_message') }}
                          </div>
                      @endif




      @if (Auth::guest())
            You Must Be Logged In To Create A New Topic!
      @elseif(Auth::user())

                 {!! Form::open() !!}

                  <div class="form-group">
                      {!! Form::label('topic', 'Topic Title:') !!}
                      {!! Form::text('topic', null, ['class' => 'form-control']) !!}
                  </div>


                  {{ Form::submit('CREATE TOPIC', array('class' => 'btn btn-info')) }}

                  {!! Form::close() !!}


                       </div>
          @endif

</div>
</div>
</div>



</div>
</div>
@endsection
