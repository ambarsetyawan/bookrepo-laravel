@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"  align="center">

        <div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-plus"></i> Add A New Book</div>
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

                  @if(Session::has('bookaddedmessage'))
                      <div class="alert alert-success">
                          {{ Session::get('bookaddedmessage') }}
                      </div>
                  @endif

                  @if(Session::has('bookupdatedmessage'))
                      <div class="alert alert-success">
                          {{ Session::get('bookupdatedmessage') }}
                      </div>
                  @endif



                  {!! Form::open(['action'=>'BooksController@store', 'files'=>true]) !!}
                  <!-- Title form input -->

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
                      {!! Form::label('published', 'Publish Date:') !!}
                      {!! Form::text('published', null,['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group">

                      {!! Form::label('retail', 'Retail Link:') !!}
                      {!! Form::text('retail', null, ['class' => 'form-control']) !!}
                  </div>

                {{ Form::submit('ADD BOOK', array('class' => 'btn')) }}

              {!! Form::close() !!}

                </div>
            </div>
        </div>

            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-database"></i> Books On the Website Database</div>
                       <div class="panel-body">

                         @if(Session::has('delete_message'))
                             <div class="alert alert-success">
                                 {{ Session::get('delete_message') }}
                             </div>
                         @endif

                         @if(Session::has('book_update_message'))
                             <div class="alert alert-success">
                                 {{ Session::get('book_update_message') }}
                             </div>
                         @endif



                         <div class="table-responsive" >
                           <table class="table table-bordered table-striped">

                             <thead>
                                 <tr>
                                     <th>Cover</th>
                                     <th>Title</th>
                                     <th>Authur</th>
                                     <th>Description</th>
                                     <th>Published On</th>
                                     <th>Retail Link</th>
                                     <th>Manage</th>
                                 </tr>
                             </thead>
                             @foreach($AddedBooks as $key => $book)
                             <tr>
                              <td >{{ $book->cover }}</th >
                               <td >{{ $book->title }}</th >
                               <td>{{ $book->authur }}</th>
                               <td>{{ $book->description }}</th>
                               <td>{{ $book->published }}</th>
                               <td>{{ $book->retail }}</th>
                               <td> {{ Form::open(['route' => ['managebooks', $book->id], 'method' => 'delete']) }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit"class="btn btn-danger btn-mini">Delete</button>
                                    {{ Form::close() }}

                                    <!-- {{ Form::open(['route' => ['editbooks', $book->id], 'method' => 'POST']) }}
                                         <input type="hidden" name="_method" value="EDIT">
                                         <button type="submit"class="btn btn-info btn-mini">Edit</button>
                                    {{ Form::close() }} -->
                                    <a href ="/managebooks/edit/{{$book->id}}" class ='btn btn-info'>Edit</a></td>

                                       </th>
                             </tr>
                             @endforeach
                         </table>
                        </div>

                    </div>
                </div>

                </div>
            </div>
    </div>
@endsection
