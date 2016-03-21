@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center" >
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1><i class="fa fa-info-circle"></i> MESSAGE CONTENTS <th></h1></div>
                  <div class="panel-body" align="left">


                                      <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i> Sender Name </div>
                                                    <div class="panel-body">
                                                      {{ $messageinfo->name }}
                                                    </div>
                                                </div>
                                        </div>


                                       <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i> Email </div>
                                                    <div class="panel-body">
                                                      {{ $messageinfo->email }}
                                                    </div>
                                                </div>
                                        </div>


                                      <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i> Recieved at  </div>
                                                    <div class="panel-body">
                                                     {{$messageinfo->created_at}}
                                                    </div>
                                                </div>
                                        </div>


                                       <div class="col-md-12 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i> Message </div>
                                                    <div class="panel-body">
                                                     {{ $messageinfo->message }}
                                                    </div>
                                                </div>
                                        </div>

                    </div>
              </div>

                    <button class="btn btn-primary" onclick="history.go(-1)">
                      « Return Back
                    </button>
    </div>


</div>
</div>
</div>
</div>
@endsection
