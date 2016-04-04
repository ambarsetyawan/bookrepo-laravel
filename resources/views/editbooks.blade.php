@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading"><h2> <i class="fa fa-plus"></i> Edit Book</h2></div>
                <div class="panel-body">


<div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Book Cover </div>
                    <div class="panel-body">

              
                   {!! Form::open() !!}
                  <!-- Title form input -->
                  <div class="form-group">
                      {!! Form::label('Book Cover') !!}
               
                </div>

              

                    </div>
                </div>

                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
        </div>


<div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Book Details </div>
                    <div class="panel-body">
                            


                  <div class="form-group">
                      {!! Form::label('title', 'Title:') !!}
                      {!! Form::text('title', $data->title, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('authur', 'Authur:') !!}
                      {!! Form::text('authur', $data->authur, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('description', 'Description:') !!}
                      {!! Form::textarea('description', $data->description, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
                  </div>

                   <div class="form-group">
                      {!! Form::label('genre', 'Genre:') !!}
                      {!! Form::text('genre', $data->genre, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('published', 'Publish Date:') !!}
                      {!! Form::text('published', $data->published,['id' => 'datepicker']) !!}
                  </div>
          
                    </div>
                </div>
        </div>


<div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Book Retail Link </div>
                    <div class="panel-body">


               
                  <!-- Title form input -->
                   <div class="form-group">

                      {!! Form::label('retail', 'Retail Link:') !!}
                      {!! Form::text('retail', $data->retail, ['class' => 'form-control']) !!}
              
        
                   </div>

                    </div>
                </div>
        </div>



                </div>
                  {{ Form::submit('UPDATE', array('class' => 'btn btn-info')) }}

                  {!! Form::close() !!}
            </div>


        </div>


            


            </div>

    </div>
</div>
@endsection
