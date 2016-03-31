@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">



   


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><h2> <i class="fa fa-plus"></i> Add A New Book</h2></div>
                <div class="panel-body">


<div class="col-md-6 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Book Cover </div>
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

                

                           

                 {!! Form::open(['action'=>'BooksController@store', 'files'=>true]) !!}
                  <!-- Title form input -->
                  <div class="form-group">
                      {!! Form::label('Book Cover') !!}
                      {!! Form::file('book_cover', null) !!}


                </div>

                    </div>
                </div>
        </div>


<div class="col-md-6 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>  Book Details </div>
                    <div class="panel-body">
                            

                  <div class="form-group">
                      {!! Form::label('title', 'Title:') !!}
                      {!! Form::text('title', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('authur', 'Authur:') !!}
                      {!! Form::text('authur', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('description', 'Description:') !!}
                      {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
                  </div>

                   <div class="form-group">
                      {!! Form::label('genre', 'Genre:') !!}
                      {!! Form::text('genre', null, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('published', 'Publish Date:') !!}
                      {!! Form::text('published', null,['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group">

                      {!! Form::label('retail', 'Retail Link:') !!}
                      {!! Form::text('retail', null, ['class' => 'form-control']) !!}
                  </div>

                {{ Form::submit('ADD BOOK', array('class' => 'btn btn-info')) }}

              {!! Form::close() !!}

                    </div>
                </div>
        </div>



                </div>
            </div>
        </div>


            


            </div>

    </div>
</div>
@endsection
