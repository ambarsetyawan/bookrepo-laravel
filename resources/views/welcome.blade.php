@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" align="center">

        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading"><i class="fa fa-info-circle"></i>   Welcome to Bookrepo! </div>
                    <div class="panel-body">
                        Here you can browse books and find information about them. Such as:</p>
                        - Description</p>
                        - Authurs</p>
                        - Ratings</p>
                        - Reviews</p>
                        - Retail Links
                    </div>
                </div>
        </div>

        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-exclamation"></i>     Important Information! </div>
                    <div class="panel-body">
                    </p>* As a regular user, you can only browse books, read the information and see comments by other users.</p>
                        * But if you are a registered user, you can have the advantages of adding comments, rating the books and clicking links to retail sites.
                          </br>
                    </div>

                </div>
        </div>


        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">

                    <div class="panel-heading"><i class="fa fa-gavel"></i>     Rules To Follow! </div>
                    <div class="panel-body">
                      Any or all evidence from the following list found will not be tolerated and will results in serious penalty:</p>
                        - Use of profanity,</p>
                        - Insulting other users,</p>
                        - Scamming through comments,</p>
                        - Redirecting other users through fake links
                    </div>
                </div>
        </div>

        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                    <div class="panel-body">

                      <div id="makeMeScrollable">
                    		<img src="images/1.jpg" id="1" />
                    		<img src="images/2.jpg" id="2" />
                    		<img src="images/3.jpg" id="3" />
                    		<img src="images/4.jpg" id="4" />
                    		<img src="images/5.jpg" id="5" />
                    		<img src="images/6.jpg" id="6" />
                    		<img src="images/7.jpg" id="7" />
                    		<img src="images/8.jpg" id="8" />
                        <img src="images/9.jpg" id="9" />
                        <img src="images/10.jpg" id="10" />
                        <img src="images/11.jpg" id="11" />
                        <img src="images/12.jpg" id="12" />
                        <img src="images/13.jpg" id="13" />
                        <img src="images/14.jpg" id="14" />
                        <img src="images/15.jpg" id="15" />
                        <img src="images/16.jpg" id="16" />
                        <img src="images/17.jpg" id="17" />
                        <img src="images/18.jpg" id="18" />
                        <img src="images/19.jpg" id="19" />
                        <img src="images/20.jpg" id="20" />
                    	</div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
