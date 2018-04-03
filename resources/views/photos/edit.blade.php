@extends('layouts.app') 
@section('title') Edit Image Data
@stop 
@section('content')
<div class="container reg-form">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <div class="card card-default" style="padding-top:70px;">
                <div class="card-body">
                    <h2 class="font_01 mb-4 header" align="center">Edit Image Data</h2>
                    <form method="POST" action="/photographs/{{$image->id}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <!-- contest id Field -->
                        <!-- title Field -->
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Image title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $image->title }}"
                                    autofocus> @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- Description Field -->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Image description</label>
                            <div class="col-md-6">
                                <textarea id='description' type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"> {{ $image->description }}</textarea>                                @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span> @endif
                            </div>
                        </div>
                        <!-- Image  section -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                <img id='img-upload' src="/storage/contest_images/{{ $image->image }}"/>                                                
                                </span>
                                </span>
                            </div>
                        </div>
                        <!-- Downloadable toggle switch -->
                        <div class="form-group row mb-0">
                            <label for="downloadable" class="col-md-4 col-form-label text-md-right" value="{{ old('downloadable') }}">Downloadable</label>
                            <div class="col-md-6 row" style="padding-top:8px;">
                                &nbsp;&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;
                                <div class="material-switch pull-right">
                                    <input id="downloadable" name="downloadable" type="checkbox" {{ $image->downloadable=='on'? 'checked' : ''}}>
                                    <label for="downloadable" class="label-success"></label>
                                </div>
                                &nbsp;&nbsp;Yes
                            </div>
                        </div>
                        <br>
                        <!-- category dropdown -->
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Image Category</label>
                            <div class="col-md-6">
                                <select id='category' class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}">
                                        <option value="{{ $image->category_id }}" hidden>{{ $img_category->name }}</option>
                                    @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select> @if ($errors->has('category'))
                                <span class="invalid-feedback">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span> @endif
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                        <i class="far fa-save"></i>&nbsp;&nbsp;Update Data
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
<link href="{{ asset('css/photos.blade.css') }}" rel="stylesheet">
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
        height: auto;
    }
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    #img-upload {
        width: 100%;
    }
    @media only screen and (max-width: 768px) {
        .card {
            margin-right: auto;
        }
        .header {
            margin-top: 5%;
        }
    }
</style>
@stop 
@section('scripts')
<script>
    </script>
@stop