@extends('layouts.app') 
@section('title') Photo Contests 
@stop 
@section('contests') navbar-active
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet"> 
@stop 
@section('content')
<div class="container-fluid contests-container">
        @if(count($contests)>0)
    <div class="row ">
        <a href="/contests/{{ $contests[0]->id }}" class="col-md-12 contest-item">
            <div class="card card-inverse">
                <img class="card-img img-fluid" src="/storage/contests_covers/{{ $contests[0]->cover_img }}" alt="Card image">
                <div class="card-img-overlay text-center">
                    <h5 class="card-text">Win amazing {{ $contests[0]->prize }}</h5>
                    <h1 class="card-title display-3">{{ $contests[0]->title }}</h1>
                    <p class="card-text"><small>Publisd at : {{ $contests[0]->created_at }}</small></p>
                </div>
            </div>
        </a>
    </div>
    @for ($i = 1; $i < count($contests); $i+=2)
    <div class="row">
            <a href="/contests/{{ $contests[$i]->id }}" class="col-md-6 contest-item">
                <div class="card card-inverse">
                    <img class="card-img" src="/storage/contests_covers/{{ $contests[$i]->cover_img }}" alt="Card image">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-text">Win amazing {{ $contests[$i]->prize }}</h5>
                        <h1 class="card-title display-3">{{ $contests[$i]->title }}</h1>
                        <p class="card-text"><small>Publisd at : {{ $contests[$i]->created_at}}</small></p>
                    </div>
                </div>
            </a>
            @if($i+1<count($contests))
            <a href="/contests/{{ $contests[$i+1]->id }}" class="col-md-6 contest-item">
                <div class="card">
                    <img class="card-img" src="/storage/contests_covers/{{ $contests[$i+1]->cover_img }}" alt="Card image">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-text">Win amazing {{ $contests[$i+1]->prize }}</h5>
                        <h1 class="card-title">{{ $contests[$i+1]->title }}</h1>
                        <p class="card-text"><small>Publisd at : {{ $contests[$i]->created_at}}</small></p>
                    </div>
                </div>
            </a>
            @endif
        
    </div>
    @endfor
    @else
    <div style="height:100vh;padding-top:25vh;">
    <img src="{{ asset('img/static/animation_4.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
        <h1 align="center" class="font_01">No Available Contests</h1>
    </div>
        @endif
</div>

@stop