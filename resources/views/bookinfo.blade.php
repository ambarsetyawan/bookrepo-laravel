@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1> BOOK DETAILS <th></h1>

                  <div class="col-md-3 col-md-offset-0">
                      <div class="panel panel-default">
                        <div class="panel-heading"><h1> Cover <th></h1>
                              <div class="panel-body">


                              </div>
                          </div>
                        </div>
                  </div>

                </th> </div>
                    <div class="panel-body">

                      <table border="1" bordercolor="green">
                      <tr><td rowspan="2"></td><td>Authur: </td><td>  Published On:</td></tr>
                      <tr><td>{{ $bookinfo->authur }}</td><td>{{ $bookinfo->published }}</td></tr>
                      <tr><td colspan="3">{{ $bookinfo->description }}</td></tr>
                      <tr><td colspan="4">{{ $bookinfo->retail }}</td></tr>
                      </table>

                    </div>

                    <button class="btn btn-primary" onclick="history.go(-1)">
                      « Back
                    </button>

        </div>
    </div>
</div>
</div>
</div>
@endsection
