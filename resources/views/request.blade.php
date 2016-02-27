@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   Found A Book Thats Not On The Website? Make A Request To The Admin!<th>

                </th> </div>
                <div class="panel-body">


                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/request') }}">
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


                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Book Title</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                              @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group{{ $errors->has('authur') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Book Authur</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="authur" value="{{ old('authur') }}">

                              @if ($errors->has('authur'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('authur') }}</strong>
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
