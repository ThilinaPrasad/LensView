@extends('layouts.app') 
@section('title') Winner Contests
@stop 
@section('winners') navbar-active 
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet">
<style>

.winner-contest-btn{
    margin-top:20px;
}

    @media (max-width: 768px) {
        .show-overlay {
            transform: scale(0.55);
        }
        .card-img-overlay {
            padding-top: 100px;
        }
        .vote-btn {
            display: inline;
        }
    }
</style>
@stop 
@section('content')
<div class="container-fluid contests-container">
    @if(count($winning_contests)>0) 
    @foreach($winning_contests as $contest)
    <div class="row ">
    <a href="/winner/{{ $contest->id }}" class="col-md-12 contest-item">
            <div class="card card-inverse">
                <img class="card-img img-fluid" src="/storage/contests_covers/{{ $contest->cover_img }}" alt="Card image">
                <div class="card-img-overlay text-center">
                    <h1 class="card-title">{{ $contest->title }}</h1>
                    <div class="vote-btn">
                        <img src="{{ asset('img/static/overlay_pattern_2.png') }}" class="mx-auto d-block img-fluid">
                        <h2 class="vote-now mx-auto d-block overlay-element winner-contest-btn">View Winner</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach @else
    <div style="height:100vh;padding-top:25vh;">
        <img src="{{ asset('img/static/animation_9.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
        <h5 align="center" class="font_01">No winner selcted contests</h5>
    </div>
    @endif
</div>

@stop 
@section('scripts')
<script>
    $(document).ready(function(){
    $(".contest-item").hover(function(){
        $(".vote-btn").css("opacity", "1");
        }, function(){
        $(".vote-btn").css("opacity", "0");
    });
});
</script>
@stop