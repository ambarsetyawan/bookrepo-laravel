@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        <div class="col-md-7 col-md-offset-0">
            <div class="panel panel-default">
  
                    <div class="panel-heading" align="center">       
                        <h3><i class="fa fa-info-circle"></i>  Discussion Topic </h3></div>
                              <div class="panel-body">

                      @foreach($titleposts as $topicpost)
                       

                                <article>

                               @if (Auth::user()->id == $topicpost->userid)

                                            {{ Form::open(['route' => ['discussions', $topicpost->postid], 'method' => 'delete']) }}
                                                  <input type="hidden" name="_method" value="DELETE">

                                           <p><small>Posted by <b>{{$topicpost->discussername}}</b> - 
                                            At <b>{{$topicpost->created_at}}</b></small> - <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                            
                                            {{ Form::close() }}



                                @elseif (Auth::user()->admin==1)


                                           {{ Form::open(['route' => ['discussions', $topicpost->postid], 'method' => 'delete']) }}
                                                  <input type="hidden" name="_method" value="DELETE">

                                           <p><small>Posted by <b>{{$topicpost->discussername}}</b> - 
                                            At <b>{{$topicpost->created_at}}</b></small> - <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                            
                                            {{ Form::close() }}



                                @elseif (Auth::user()->name != $topicpost->userid)

                                       <p><small>Posted by <b>{{$topicpost->discussername}}</b> - 
                                          At <b>{{$topicpost->created_at}}</b></small>
                                  
                                @endif

                                    <p>{{$topicpost->discussion_post}}        
                                    <p>  ________________________________________________________________________________________________________________</p>
                                </article>
                      
                        @endforeach

                              <div align="center">{!! $titleposts->render() !!}<br>  
                                <button class="btn btn-primary" onclick="history.go(-1)">
                                    « Return Back
                              </button>
                            </div>
                        </div>
                </div>
        </div>



<div class="col-md-5 col-md-offset-0">
            <div class="panel panel-default" align="center">

                     <h4>  <div class="panel-heading" align="center"><i class="fa fa-info-circle"></i>  Submit A Post</div></h4>
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


                        @if(Session::has('topic_post_success'))
                              <div class="alert alert-success">
                                  {{ Session::get('topic_post_success') }}
                              </div>
                          @endif

                      
      @if (Auth::guest())

            You Must Be Logged In To Submit A New Post!

      @elseif(Auth::user())

                 {!! Form::open() !!}
                  <div class="form-group">
                      {!! Form::textarea('discussion_post', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
                  </div>
                  {{ Form::submit('POST', array('class' => 'btn btn-info')) }}
                  {!! Form::close() !!}

      @endif
                       </div>
                </div>
        </div>
    </div>
</div>

@endsection
