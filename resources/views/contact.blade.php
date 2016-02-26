@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   Have A Problem? Send The Admin A Message!<th>
                </th> </div>
                    <div class="panel-body">


                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
                          {!! csrf_field() !!}

                          <div class="form-group{{ $errors->has('yourname') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Your Name</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="yourname" value="{{ old('yourname') }}">

                                  @if ($errors->has('yourname'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('yourname') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('youremail') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Your E-Mail Address</label>

                              <div class="col-md-6">
                                  <input type="email" class="form-control" name="youremail" value="{{ old('youremail') }}">

                                  @if ($errors->has('youremail'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('youremail') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group{{ $errors->has('yourmessage') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Type Message</label>


                                  <textarea rows="7" cols="60">
                                 </textarea>

                                  @if ($errors->has('yourmessage'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('yourmessage') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-5">
                                  <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-envelope-o"></i> Send
                                  </button>

                              </div>
                          </div>    
                      </form>


                    </br>
                    </div>

                </div>
        </div>
    </div>
</div>
@endsection
