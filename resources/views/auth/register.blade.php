@extends('layouts.app') 
@section('title') Register 
@stop 
@section('content')
<div class="container reg-form">
    <div class="row">
        <div class="col-md-6 left-sec">
            <div class="left-container">
                <img src="{{ asset('img/static/animation_1.gif') }}" class="animation">
                <div class="text-center">
                    <h1 class="font_01 left_text">LensView</h1>
                    <h4 class="font_02 left_text">Capture Your Passion</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-body">
                    <h2 class="font_01 mb-4 header" align="center">User Registration</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- name Field -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                    autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- email Field -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- address Field -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <textarea id='address' type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address">{{ old('address') }}</textarea>                                @if ($errors->has('address'))
                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span> @endif
                            </div>
                        </div>
                        <!-- Telephone Field -->
                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                            <div class="col-md-6">
                                <input id="telephone" type="tel" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone"
                                    value="{{ old('telephone') }}"> @if ($errors->has('telephone'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!--User Type Field-->
                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">User Type</label>
                            <div class="col-md-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="role1" name="role" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label align-bottom" for="role1">Voter</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="role2" name="role" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="role2">Photographer</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="role3" name="role" class="custom-control-input" value="3">
                                    <label class="custom-control-label" for="role3">Contest Organizer</label>
                                </div>
                                @if ($errors->has('role'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- Confirm Password Field -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox form-group row">
                            <div class="col-md-6 offset-md-4">
                                <input type="checkbox" class="custom-control-input {{ $errors->has('condition') ? ' is-invalid' : '' }}" id="customControlInline"
                                    name='condition' {{ old( 'condition') ? 'checked' : '' }}>
                                <label class="custom-control-label ml-2" for="customControlInline">I agree with <a href="#">terms</a> & conditions of the <a href="/">LensView</a>.</label>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                </div>
                <!--section 2 -->
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
        background:url('{{ asset("img/static/reg_back.png") }}') no-repeat center center fixed;
    }
    .card {
        border: none;
        border-radius: 0;
        margin-right: -22.1%;
        padding: 15% 0 3% 0;
        opacity: 0.8;
        height: auto;
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