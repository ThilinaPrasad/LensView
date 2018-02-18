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
                    <div class="progress" data-percentage="{{ $days_presentage }}">
                        <span class="progress-left">
                                        <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                                        <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                            <div>
                                {{$days_left}}<br>
                                <span>days left</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Circular Progress-->
                <h1 class="card-title display-3">{{ $contest->title }}</h1>
                <h3 class="prize">Try With Your Creativity & Win<p> <strong class="h1">{{ $contest->prize }} </strong></h3>
                <a href="#" class="btn btn-light font_03"><i class="fas fa-upload"></i>&nbsp;&nbsp;Submit Photographs</a>
            </div>
        </div>
    </div>
</div>
<!--cover Section-->

<!--about section-->
<div class="jumbotron jumbotron-fluid text-center show-about">
    <div class="container">
        <p class="h1 font_01">About {{ $contest->title }} Contest</p>
        <p class="lead">{{ $contest->description }}</p>
    </div>
</div>
<!--about section-->
<!--prizes section-->
<div class="jumbotron text-center prize-section">
    <p class="font_01 h1 prize-head"><i class="fas fa-chess-queen"></i> Win Amazing Prize <i class="fas fa-chess-queen"></i></p>
    <p class="font_03 h3">{{ $contest->prize }}</p>
    <img src="/storage/contests_prizes/{{ $contest->prize_image }}" class="hover-effect-2 mx-auto d-block img-fluid prize_img rounded-circle">
    <p class="col-md-6 offset-md-3" style="margin-top:20px;">{{ $contest->prize_description }}</p>
</div>
<!--prizes section-->
<!--Partners Section-->
<div class="jumbotron marketing text-center show-partner">
        <p class="h1 font_01"><i class="fas fa-handshake"></i> Partnesr with us <i class="fas fa-handshake"></i></p>
    <div class="row">
        @foreach($sponsors as $sponsor)
        <div class="col-lg-4">
            <img class="rounded-circle hover-effect-2" src="/storage/contests_sponsors/{{ $sponsor->logo }}" alt="Generic placeholder image"
                width="140" height="140">
            <h3>{{ $sponsor->name }}</h3>
        </div>
@endforeach
        </div>
    </div>
</div>
<!--Partners Section-->

<!--Owner Info-->
<div class="container-fluid owner-sec">
    <div class="text-center">
        <strong>Organized by</strong>
    <a href="#" class="organizer">
        <img src="/storage/profile_pics/{{ $owner->profile_pic}}" class="rounded-circle mx-auto d-block" width="80" height="80" title="View Profile">
        <strong>{{ $owner->name}}</strong>
    </a>
</div>
</div>
@stop