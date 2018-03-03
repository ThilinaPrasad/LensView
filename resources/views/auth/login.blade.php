@extends('layouts.app')
@section('title')
Login
@stop
@section('content')
<div class="container reg-form">
    <div class="row">
        <div class="col-md-6 left-sec">
                <div class="left-container">
                        <img src="{{ asset('img/static/animation_2.gif') }}" class="animation">
                        <div class="text-center">
                            <h1 class="font_01 left_text">LensView</h1>
                            <h4 class="font_02 left_text">Always Focus On Your Dreams</h4>
                        </div>
                    </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                         <div class="card-body">
                        <h2 class="font_01 mb-4 header" align="center">User Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox form-group row">
                                <div class="col-md-6 offset-md-4">
                                <input type="checkbox" class="custom-control-input {{ $errors->has('condition') ? ' is-invalid' : '' }}" id="customControlInline" name='condition' {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label ml-2" for="customControlInline">Remember me</label>
                                </div>
                              </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('styles')
<style>
    body {
        background:url('{{ asset("img/static/login_back.png") }}') no-repeat center center fixed;
    }
    .card {
        border: none;
        border-radius: 0;
        margin-right: -22.1%;
        padding: 30% 0 4% 0;
        opacity: 0.8;
        height:100vh;
    }

    .left-container {
        margin-top: 30%;
    }
    .animation {
        border-radius: 30%;
        opacity: 0.8;
        transform: rotate(-20deg);
        box-shadow: 5px 10px 8px #000;
    }
    .left_text {
        color: white;
        text-shadow: 4px 4px 4px #000000;
        z-index: 500;
    }
    @media only screen and (max-width: 768px) {
        .left-sec {
            display: none;
        }
        .card {
            margin-right: auto;
        }
        .header {
            margin-top: 5%;
        }
    }
</style>
@stop
