@extends('layouts.app') 
@section('title') Upload Image 
@stop 
@section('content')
<div class="container reg-form">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <div class="card card-default" style="padding-top:70px;">
                <div class="card-body">
                    <h2 class="font_01 mb-4 header" align="center">Upload Images</h2>
                    <form method="POST" action="{{ route('photographs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- contest id Field -->
                        <input type="text" value="{{ $contest }}" name="contest_id" hidden>
                        <!-- title Field -->
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Image title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"
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
                                <textarea id='description' type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"> {{ old('description') }}</textarea>                                @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span> @endif
                            </div>
                        </div>
                        <!-- Image selection section -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Upload Image</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    <img id='img-upload' src="/storage/contest_images/{{ $errors->has('description') ? 'upload_image_warn.jpg' : 'upload_image.jpg' }}"/><input type="file" id="imgInp" name="upload_img" title="Select Image" accept="image/*" class="form-control">
                                                    @if ($errors->has('upload_img'))
                                                    <br>
                                                        <span class="text-danger">
                                                                            {{ $errors->first('upload_img') }}
                                                                        </span>
                                                                        @else
                                                                        <br>
                                                                        <span class="text-muted">
                                                                                (*Image diamensions 1920x1080)
                                                                            </span>
                                                                        @endif
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
                                    <input id="downloadable" name="downloadable" type="checkbox" checked>
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
                                        <i class="fas fa-upload"></i>&nbsp;&nbsp;Upload
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
    $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		   // var input = $(this).parents('.input-group').find(':text'),
		    //    log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>
@stop