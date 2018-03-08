@extends('layouts.app')
@section('title')
Login
@stop
@section('content')
<div class="container reg-form">
    <div class="row">
        <div class="col-md-6 left-sec">
                <div class="left-container">
                        <img src="{{ asset('img/static/animation_6.gif') }}" class="animation">
                        <div class="text-center">
                            <h1 class="font_01 left_text">LensView</h1>
                            <h4 class="font_02 left_text">Always Focus On Your Dreams</h4>
                        </div>
                    </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                         <div class="card-body">
                        <h2 class="font_01 mb-4 header" align="center">Change Password</h2>
                    <form method="POST" action="{{ route('changepass.updatepassword') }}">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <!-- OLd Password Field -->
                        <div class="form-group row">
                            <label for="old-password" class="col-md-4 col-form-label text-md-right">Old Password</label>
                            <div class="col-md-6">
                                <input id="old-password" type="password" class="form-control{{ $errors->has('old-password') ? ' is-invalid' : '' }}" name="old-password">                                
                                @if ($errors->has('old-password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('old-password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- Confirm Password Field -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-save"></i>&nbsp;&nbsp;Save new password
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