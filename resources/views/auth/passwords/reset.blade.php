@extends('layouts.app')
@section('title')
Reset Password
@stop
@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-6 left-sec">
                        <div class="left-container">
                                <img src="{{ asset('img/static/animation_3.gif') }}" class="animation">
                                <div class="text-center">
                                    <h1 class="font_01 left_text">LensView</h1>
                                    <h4 class="font_02 left_text">Use Your Camera As A Weapon</h4>
                                </div>
                            </div>
                </div>
                <div class="col-md-6">

    
            <div class="card card-default">
                <h2 class="header font_01" align="center">Reset Password</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
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
        padding: 40% 0 4% 0;
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
