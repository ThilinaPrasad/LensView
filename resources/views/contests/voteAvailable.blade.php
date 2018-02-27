@extends('layouts.app') 
@section('title') Vote Contests 
@stop 
@section('vote') navbar-active 
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet">
<link href="{{ asset('css/cricular.progress.css') }}" rel="stylesheet">
<style>
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
    @if(count($contests)>0) @foreach($contests as $contest)
    <?php
    $today = \Carbon\Carbon::today();
    $days_left = date_diff(date_create($today),date_create($contest->closed_at))->format('%a');
        $period = date_diff(date_create($contest->closed_at),date_create($contest->sub_end_at))->format('%a');
        $days_presentage = round(100 *((int)$days_left) /(int)$period);
        if($days_presentage!=100){
            $days_presentage = (string)$days_presentage;
            $days_presentage = substr($days_presentage,0,1)."0";
        }
        ?>
    <div class="row ">
    <a href="photographs/{{ $contest->id }}" class="col-md-12 contest-item">
            <div class="card card-inverse">
                <img class="card-img img-fluid" src="/storage/contests_covers/{{ $contest->cover_img }}" alt="Card image">
                <div class="card-img-overlay text-center">
                    <!--Circular Progress-->
                    <div class="show-overlay">
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
                                                <span>
                                                @if($days_left!=1)
                                                {{ "days" }}
                                                @else
                                                {{ "day" }}
                                                @endif left</span>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <!--Circular Progress-->
                    <h1 class="card-title">{{ $contest->title }}</h1>
                    <div class="vote-btn">
                        <img src="{{ asset('img/static/overlay_pattern.png') }}" class="mx-auto d-block img-fluid">
                        <h2 class="vote-now mx-auto d-block overlay-element">Vote Now</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach @else
    <div style="height:100vh;padding-top:25vh;">
        <img src="{{ asset('img/static/animation_4.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
        <h1 align="center" class="font_01">No Available Contests</h1>
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