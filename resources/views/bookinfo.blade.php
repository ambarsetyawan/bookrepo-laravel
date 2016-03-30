@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">
        <div class="col-md-7 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h1><i class="fa fa-info-circle"></i> BOOK DETAILS <th></h1></div>

          <div class="panel-body">

                                <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Book Cover </div>
                                                    <div class="panel-body">
                                                     <h1> <img class="book-zoom img-responsive" src="/uploads/{{ $bookinfo->id }}.jpg"> <th></h1>
                                                    </div>
                                                </div>
                                        </div>

                                 <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Authur </div>
                                                    <div class="panel-body">
                                                      {{ $bookinfo->authur }}
                                                    </div>
                                                </div>
                                        </div>

                                 <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Published On </div>
                                                    <div class="panel-body">
                                                      {{ $bookinfo->published }}
                                                    </div>
                                                </div>
                                        </div>


                                                <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Genre </div>
                                                    <div class="panel-body">
                                                      {{ $bookinfo->genre }}
                                                    </div>
                                                </div>
                                        </div>



                                       <div class="col-md-4 col-md-offset-0">
                                            <div class="panel panel-default">
                                    
                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Ratings </div>
                                                                                             
                                                    <div class="panel-body">
                                                  @foreach($votes as $rating)      

                                                      Likes {{ $rating->booklikes }} / 
                                                     
                                                      Dislikes {{ $rating->bookdislikes }}

                                                   @endforeach
                                                    </div>
                                      
                                                
                                        </div>
                                      </div>



                                                 <div class="col-md-8 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Buy It! </div>
                                                    <div class="panel-body">
                                                     @if (Auth::guest())
                                                      You Must Be Logged In To View The Link!
                                                      @elseif(Auth::user())
                                                      <a href="{{ $bookinfo->retail }}">Click Here</a>
                                                      @endif
                                                    </div>
                                                </div>
                                        </div>


                                         <div class="col-md-12 col-md-offset-0">
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Description </div>
                                                    <div class="panel-body">
                                                      <div class="showmore">{{ $bookinfo->description }}</div>
                                                    </div>
                                                </div>
                                        </div>



                             </div>
  </div>


                    <button class="btn btn-primary" onclick="history.go(-1)">
                      « Return Back
                    </button>
    </div>

<div class="row" align="center">
        <div class="col-md-5 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><i class="fa fa-commenting-o"></i> COMMENTS & REVIEWS <th></h2></div>

  <div class="panel-body" align="left">




    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('commentsuccess'))
        <div class="alert alert-success">
            {{ Session::get('commentsuccess') }}
        </div>
    @endif


@if (Auth::guest())
<h3>You Must Be Logged In To Comment!</h3>
@elseif(Auth::user())

@foreach($comments as $comments)
    <article>
        <p><small>Posted by <b>{{$comments->commentername}}</b>, On <b>{{$comments->bookstitle}}</b> at <b>{{$comments->created_at}}</b></small></p>
          <p>{{$comments->content}}
          <p>  _____________________________________________________________________________</p>
    </article>
    @endforeach

<!-- Content form input -->
<div class="form-group">
  {!! Form::label('content', 'Share Your Review:') !!}
  {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
</div>
{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{!! Form::close() !!}
@endif


  </div>
        </div>
    </div>
</div>
</div>

  </div>

</div>




</div>
@endsection
