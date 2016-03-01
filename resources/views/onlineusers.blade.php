@extends('layouts.adminuser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">   This is where you can view and manage users of the website.<th>


                </th> </div>
                    <div class="panel-body">


                                        <h2><i class="fa fa-users"></i> Users Management</h2>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Joined On</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>



                                            </table>
                                        </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection
