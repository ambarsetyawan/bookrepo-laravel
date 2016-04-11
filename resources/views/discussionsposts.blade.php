@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">


        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-info-circle"></i>  Topic Title </div>
                        <div class="panel-body">


                          @if(Session::has('commentsuccess'))
                              <div class="alert alert-success">
                                  {{ Session::get('commentsuccess') }}
                              </div>
                          @endif



                          <article>
                         
                              <p><small>Posted by <b><---name---></b> - 
                              At <b><---created at---></b></small> 
                              <p><--post content-->        
                              <p>  ______________________________________________________________________________</p>

                          </article>


                        <button class="btn btn-primary" onclick="history.go(-1)">
                                            « Return Back
                                          </button>


                        </div>



                </div>
        </div>







        <div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Discussion Threads  </div>
                    <div class="panel-body"> 
                                    
                    </div>
                </div>
        </div>






<div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">

                     <h2>  <div class="panel-heading" align="center"><i class="fa fa-info-circle"></i>  Submit A Post</div></h2>
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
                      

                   {!! Form::open(['action'=>'DiscussionsController@createtopicpost', 'files'=>true]) !!}


                  <div class="form-group">
                      {!! Form::textarea('discussion_post', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
                  </div>


                  {{ Form::submit('POST', array('class' => 'btn btn-info')) }}

                  {!! Form::close() !!}


                       </div>
                </div>
        </div>




    </div>
</div>

@endsection
