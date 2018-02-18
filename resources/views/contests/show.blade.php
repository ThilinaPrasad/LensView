@extends('layouts.app') 
@section('title') Photo Contests 
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet">
<link href="{{ asset('css/cricular.progress.css') }}" rel="stylesheet"> 
@stop 
@section('content')
<!--cover Section-->
<div class="row show-row">
    <div class="col-md-12 contest-item">
        <div class="card card-inverse">
            <img class="card-img img-fluid" src="{{ asset('img/1.jpg') }}" alt="Card image">
            <div class="card-img-overlay show-overlay text-center">
                <!--Circular Progress-->
                <div class="col-sm-1 mx-auto d-block">
                    <div class="progress" data-percentage="70">
                        <span class="progress-left">
                                        <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                                        <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                            <div>
                                5<br>
                                <span>days left</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Circular Progress-->
                <h1 class="card-title display-3">Name</h1>
                <h3 class="prize">Win amazing</h3>
                <a href="#" class="btn btn-light font_03"><i class="fas fa-upload"></i>&nbsp;&nbsp;Submit Photographs</a>
            </div>
        </div>
    </div>
</div>
<!--cover Section-->
<!--about section-->
<div class="jumbotron jumbotron-fluid text-center show-about">
    <div class="container">
        <p class="h1 font_01">About Title Here</p>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>
<!--about section-->
<!--prizes section-->
<div class="jumbotron text-center prize-section">
    <p class="font_01 h1 prize-head"><i class="fas fa-chess-queen"></i> Win Amazing Prize <i class="fas fa-chess-queen"></i></p>
    <p class="font_03 h3">Canon 6d</p>
    <img src="{{ asset('img/prize.jpg') }}" class="hover-effect-2 mx-auto d-block img-fluid prize_img rounded-circle">
    <p class="col-md-6 offset-md-3" style="margin-top:20px;">It's not about the prizes, but...the prizes do rock. From getting published to scoring Canon 5Ds, winning contests isn't
        just about bragging rights. Elevate your photography and get inspired!</p>
</div>
<!--prizes section-->
<!--Partners Section-->
<div class="jumbotron marketing text-center show-partner">
        <p class="h1 font_01"><i class="fas fa-handshake"></i> Partnesr with us <i class="fas fa-handshake"></i></p>
    <div class="row">
        <div class="col-lg-4">
            <img class="rounded-circle hover-effect-2" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                width="140" height="140">
            <h3>Partner 1</h3>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle hover-effect-2" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                width="140" height="140">
            <h3>Partner 2</h3>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle hover-effect-2" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                width="140" height="140">
            <h3>Partner 3</h3>
        </div>
    </div>
</div>
<!--Partners Section-->

<!--Owner Info-->
<div class="container-fluid owner-sec">
    <div class="text-center">
        <strong>Organized by</strong>
    <a href="#" class="organizer">
        <img src="{{ asset('img/prize.jpg') }}" class="rounded-circle mx-auto d-block" width="80" height="80" title="View Profile">
        <strong>Thilina Prasad</strong>
    </a>
</div>
</div>
@stop