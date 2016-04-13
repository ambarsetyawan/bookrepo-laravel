@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"  align="center">



            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    
                    <div class="panel-heading"><i class="fa fa-database"></i> Books On the Website Database </div>
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

                        @if(Session::has('bookaddedmessage'))
                            <div class="alert alert-success">
                                {{ Session::get('bookaddedmessage') }}
                            </div>
                        @endif


                         <div class="table-responsive">
                           <table class="table table-bordered table-striped" >

                            <thread>
                                 <tr>
                                     <th >Cover</th>
                                     <th>Title</th>
                                     <th>Authur</th>
                                     <th>Description</th>
                                     <th>Genre</th>
                                     <th>Published</th>
                                     <th>Retail Link</th>
                                     <th>Manage</th>
                                 </tr>
                             </thread></div>
                             @foreach($AddedBooks as $key => $book)
                             <thread>
                                   <tr align="center">
                                     <td><img src="/uploads/{{ $book->id }}.jpg" width="55" height="105"></th >
                                     <td>{{ $book->title }}</th >
                                     <td>{{ $book->authur }}</th>
                                     <td><div class="showmore">{{ $book->description }}</div></th>
                                     <td>{{ $book->genre }}</th>
                                     <td>{{ $book->published }}</th>
                                     <td><a href ="{{ $book->retail }}">Click Here</a></th>
                                     <td> {{ Form::open(['route' => ['managebooks', $book->id], 'method' => 'delete']) }}
                                          <input type="hidden" name="_method" value="DELETE"></br>
                                          <button type="submit"class="btn btn-danger btn-mini">Delete</button></p>
                                          {{ Form::close() }}

                                          <a href ="managebooks/edit/{{$book->id}}" class ='btn btn-info'>Edit</a></td>
                                   </tr>
                                </thread>
                             @endforeach
                         </table>


                                     {!! $AddedBooks->render() !!} 
                                     
                        </div>


                    </div>
                </div>
                </div>
            </div>
    </div>
@endsection
