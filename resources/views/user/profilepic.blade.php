@extends('layouts.app') 
@section('title') Profile Picture
@stop 
@section('styles')
<style>
  body {
        background:url('{{ asset("img/static/profilepic_back.png") }}') no-repeat center center fixed;
    } 

.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  max-width: 100%;
  max-height: 100%;
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
    height:300px;
  width: 300px;
}

#imgInp{
    height:300px;
  width: 300px;
}


.img-cont{
    height: 100vh;
  padding-top:100px;
  background-color: rgba(255,255,255,0.5);
}

.container,.row, .input-group{
    margin-left: 0;
    margin-right: 0;
    padding-right: 0;
    padding-left: 0;
}
</style>
@stop 
@section('content')
<div class="container img-cont mx-auto d-block">
<h2 align="center" class="font_01">Update Profile Picture</h2>
<br>
<h6 align="center" class="font_03">(Click on image to select new one)</h6>
<!-- Image selection section -->
<form method="POST" action="{{ route('profilepic.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="{{ $user->id }}">
<div class="form-group row">
        <div class="input-group col-md-6 offset-md-4 mx-auto d-block">
            <span class="input-group-btn mx-auto d-block">
                            <span class="btn btn-default btn-file mx-auto d-block">
                            <img id='img-upload' src="/storage/profile_pics/{{ $user->profile_pic }}" class="rounded-circle"><input type="file" id="imgInp" name="upload_img" title="Click on image to select new one" accept="image/*" class="form-control">
                                @if ($errors->has('upload_img'))
                                <br>
                                    <span class="text-danger">
                                                        {{ $errors->first('upload_img') }}
                                                    </span>
                                                    @else
                                                    <br>
                                                    <span class="text-muted">
                                                        (aspect ratio 1:1 is better)
                                                        </span>
                                                    @endif
                                                    </span>
            </span>
        </div>
    </div>
<!--Button -->
    <div class="form-group row" >
            <div class="col-md-6 mx-auto d-block">
                <button type="submit" class="btn btn-success mx-auto d-block">
                    Update Profile Picture
                </button>
            </div>
        </div>
  <!--Button -->
</form>
</div>
@stop
@section('scripts')
<script src="{{ asset('js/profilepic.js') }}" rel="stylesheet"></script>
@stop 
