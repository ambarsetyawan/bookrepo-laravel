@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">   Have A Problem? Send The Admin A Message! </div>
              </div>
            </div>


            <div class="col-md-3 col-md-offset-0">
                <div class="panel panel-default">

                        <div class="panel-body">

                          <div id="makeMeScrollable">
                              <img src="images/20.jpg" id="20" />
                              <img src="images/19.jpg" id="19" />
                              <img src="images/18.jpg" id="18" />
                              <img src="images/17.jpg" id="17" />
                              <img src="images/16.jpg" id="16" />
                              <img src="images/15.jpg" id="15" />
                              <img src="images/14.jpg" id="14" />
                              <img src="images/13.jpg" id="13" />
                              <img src="images/12.jpg" id="12" />
                              <img src="images/11.jpg" id="11" />
                              <img src="images/10.jpg" id="10" />
                              <img src="images/9.jpg" id="9" />
                              <img src="images/8.jpg" id="8" />
                              <img src="images/7.jpg" id="7" />
                              <img src="images/6.jpg" id="6" />
                              <img src="images/5.jpg" id="5" />
                              <img src="images/4.jpg" id="4" />
                              <img src="images/3.jpg" id="3" />
                              <img src="images/2.jpg" id="2" />
                              <img src="images/1.jpg" id="1" />

                          </div>
                        </div>
                    </div>
            </div>



                <div class="col-md-4 col-md-offset-1">
                    <div class="panel panel-default">

                    <div class="panel-body">
                      <h2><i class="fa fa-envelope-square"></i> CONTACT ADMIN</h2>

                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      @if(Session::has('sentmessage'))
                          <div class="alert alert-success">
                              {{ Session::get('sentmessage') }}
                          </div>
                      @endif


                      {!! Form::open() !!}

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('name', 'Name:') !!}
                          {!! Form::text('name', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('email', 'Email:') !!}
                          {!! Form::text('email', null, ['class' => 'form-control']) !!}
                      </div>
                      <!-- Content form input -->
                      <div class="form-group">
                          {!! Form::label('message', 'Message:') !!}
                          {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 40]) !!}
                      </div>


                    {{ Form::submit('Send', array('class' => 'btn')) }}

                    {!! Form::close() !!}

                    </div>

                    </div>

                </div>


                <div class="col-md-3 col-md-offset-1">
                    <div class="panel panel-default">
                            <div class="panel-body">

                              <div id="makeMeScrollable">
                                <img src="images/1.jpg" id="1" />
                                <img src="images/2.jpg" id="2" />
                                <img src="images/3.jpg" id="3" />
                                <img src="images/4.jpg" id="4" />
                                <img src="images/5.jpg" id="5" />
                                <img src="images/6.jpg" id="6" />
                                <img src="images/7.jpg" id="7" />
                                <img src="images/8.jpg" id="8" />
                                <img src="images/9.jpg" id="9" />
                                <img src="images/10.jpg" id="10" />
                                <img src="images/11.jpg" id="11" />
                                <img src="images/12.jpg" id="12" />
                                <img src="images/13.jpg" id="13" />
                                <img src="images/14.jpg" id="14" />
                                <img src="images/15.jpg" id="15" />
                                <img src="images/16.jpg" id="16" />
                                <img src="images/17.jpg" id="17" />
                                <img src="images/18.jpg" id="18" />
                                <img src="images/19.jpg" id="19" />
                                <img src="images/20.jpg" id="20" />
                              </div>
                            </div>
                        </div>
                </div>


            </div>

    </div>
</div>
@endsection
