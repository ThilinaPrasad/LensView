@extends('layouts.app') 
@section('title') Photo Contests 
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet"> 
@stop 
@section('content')
<div class="container-fluid contests-container">
    <div class="row">
        <a href="#" class="col-md-12 contest-item">
            <div class="card card-inverse">
                <img class="card-img img-fluid" src="{{ asset('img/3.jpg') }}" alt="Card image">
                <div class="card-img-overlay text-center">
                    <h5 class="card-text">Price details</h5>
                    <h1 class="card-title">Contest Name</h1>
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <a href="#" class="col-md-6 contest-item">
            <div class="card card-inverse">
                <img class="card-img" src="{{ asset('img/1.jpg') }}" alt="Card image">
                <div class="card-img-overlay text-center">
                    <h5 class="card-text">Price details</h5>
                    <h1 class="card-title">Contest Name</h1>
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
            </div>
        </a>
        <a href="#" class="col-md-6 contest-item">
            <div class="card">
                <img class="card-img" src="{{ asset('img/2.jpg') }}" alt="Card image">
                <div class="card-img-overlay text-center">
                    <h5 class="card-text">Price details</h5>
                    <h1 class="card-title">Contest Name</h1>
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
            </div>
        </a>
    </div>
</div>
@stop