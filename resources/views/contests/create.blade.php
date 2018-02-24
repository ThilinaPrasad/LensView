@extends('layouts.app') 
@section('title') Create Contest 
@stop 
@section('createcontests') navbar-active
@stop 
@section('content')
<div class="container reg-form">
    <div class="col-md-6 offset-md-2">
        <div class="card card-default">
            <div class="card-body">
                <h2 class="font_01 mb-4 header" align="center">Create Photography Contest</h2>
                <form method="POST" action="{{ route('contests.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!--Section 1-->
                    <div id="sec_01">
                        <h4 align="center" class="font_02">~General~</h4>
                        <hr>
                        <!-- title Field -->
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Contest title</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"
                                    autofocus> @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- Description Field -->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id='description' type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }}</textarea>                                @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span> @endif
                            </div>
                        </div>
                        <!-- sub_start_data Field -->
                        <div class="form-group row">
                            <label for="sub_start_at" class="col-md-4 col-form-label text-md-right">Submission Starting Date</label>
                            <div class="col-md-6">
                                <input id="sub_start_at" type="date" min="{{ $date }}" class="form-control{{ $errors->has('sub_start_at') ? ' is-invalid' : '' }}" name="sub_start_at"
                                    value="{{ old('sub_start_at') }}"> @if ($errors->has('sub_start_at'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sub_start_at') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <!-- sub_end_data Field -->
                        <div class="form-group row">
                            <label for="sub_end_at" class="col-md-4 col-form-label text-md-right">Submission Closing Date</label>
                            <div class="col-md-6">
                                <input id="sub_end_at" type="date" min="{{ $date }}"  class="form-control{{ $errors->has('sub_end_at') ? ' is-invalid' : '' }}" name="sub_end_at"
                                    value="{{ old('sub_end_at') }}"> @if ($errors->has('sub_end_at'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('sub_end_at') }}</strong>
                                        </span> @else
                                        <pre class="small">(*min 5 days after subbmission start)</pre> @endif
                            </div>
                        </div>
                        <!-- closing data Field -->
                        <div class="form-group row">
                            <label for="colosed_at" class="col-md-4 col-form-label text-md-right">Compettion Closing Date</label>
                            <div class="col-md-6">
                                <input id="closed_at" type="date" min="{{ $date }}" class="form-control{{ $errors->has('closed_at') ? ' is-invalid' : '' }}" name="closed_at"
                                    value="{{ old('closed_at') }}"> @if ($errors->has('closed_at'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('closed_at') }}</strong>
                                        </span> @else
                                        <pre class="small">(*min 5 days after subbmission end)</pre> @endif
                            </div>
                        </div>
                        <!-- cover image Field -->
                        <div class="form-group row">
                                <label for="cover_img" class="col-md-4 col-form-label text-md-right">Cover Image</label>
                                <div class="col-md-6">
                                    <input type='file' id='cover_img' type="text" class="form-control {{ $errors->has('cover_img') ? ' is-invalid' : '' }}"
                                        name="cover_img" value="{{ old('cover_img') }}" accept="image/*"> @if ($errors->has('cover_img'))
                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('cover_img') }}</strong>
                                                    </span> @else
                                    <pre class="small">(*image diamensions 1920x1080)</pre> @endif
                                </div>
                            </div>

                       
                        <!-- Next_1 Button Field -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn btn-primary" id="next_1">
                                    Next
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Section 2-->
                    <div id="sec_02" style="display:none;">
                        <h4 align="center" class="font_02">~Prizes~</h4>
                        <hr>
                        <h5 class="font_02" align="center"><i class="fas fa-trophy fa-lg" ></i>&nbsp;&nbsp;Winner&nbsp;&nbsp;<i class="fas fa-trophy fa-lg"></i></h5>
                        <br>
                        <!--winner title Field -->
                        <div class="form-group row">
                            <label for="winner" class="col-md-4 col-form-label text-md-right">Prize</label>
                            <div class="col-md-6">
                                <input id="winner" type="text" class="form-control{{ $errors->has('winner') ? ' is-invalid' : '' }}" name="winner" value="{{ old('winner') }}"
                                    autofocus> @if ($errors->has('winner'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('winner') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <!-- winner info Field -->
                        <div class="form-group row">
                                <label for="winner_info" class="col-md-4 col-form-label text-md-right">Prize Info</label>
                                <div class="col-md-6">
                                    <textarea id='winner_info' type="text" class="form-control{{ $errors->has('winner_info') ? ' is-invalid' : '' }}" name="winner_info">{{ old('winner_info') }}</textarea>                                
                                    @if ($errors->has('winner_info'))
                                    <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('winner_info') }}</strong>
                                                </span> @endif
                                </div>
                            </div>

                        <!-- winner prize image Field -->
                        <div class="form-group row">
                            <label for="winner_img" class="col-md-4 col-form-label text-md-right">Prize Image</label>
                            <div class="col-md-6">
                                <input type='file' id='winner_img' type="text" class="form-control {{ $errors->has('winner_img') ? ' is-invalid' : '' }}"
                                    name="winner_img" value="{{ old('winner_img') }}" accept="image/*"> @if ($errors->has('winner_img'))
                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('winner_img') }}</strong>
                                                </span> @else
                                <pre class="small">(*image aspect ratio must be 1:1)</pre> @endif
                            </div>
                        </div>
                        
                        <!-- Next_2 Button Field -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn btn-primary" id="prev_2">
                                    Prev
                                </div>
                                <div class="btn btn-primary" id="next_2">
                                    Next
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Section 3-->
                    <div id="sec_03" style="display:none;">
                        <h5 align="center" class="font_02">~Partners~</h5>
                        <!--Platinum Partner-->
                        <hr>
                        <h5 class="font_02" align="center"><i class="fas fa-handshake fa-lg"></i>&nbsp;&nbsp;Platinum Partner&nbsp;&nbsp;<i class="fas fa-handshake fa-lg"></i></h5>
                        <br>
                        <!--title Field -->
                        <div class="form-group row">
                            <label for="p_name" class="col-md-4 col-form-label text-md-right">Company/Owner Name:</label>
                            <div class="col-md-6">
                                <input id="p_name" type="text" class="form-control{{ $errors->has('p_name') ? ' is-invalid' : '' }}" name="p_name" value="{{ old('p_name') }}"
                                    autofocus> @if ($errors->has('p_name'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('p_name') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                     <!-- logo Field -->
                        <div class="form-group row">
                            <label for="p_logo" class="col-md-4 col-form-label text-md-right">Official Logo</label>
                            <div class="col-md-6">
                                <input type='file' id='p_logo' type="text" class="form-control {{ $errors->has('p_logo') ? ' is-invalid' : '' }}"
                                    name="p_logo" value="{{ old('p_logo') }}" accept="image/*"> @if ($errors->has('p_logo'))
                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('p_logo') }}</strong>
                                                </span> @else
                                <pre class="small">(*image aspect ratio must be 1:1)</pre> @endif
                            </div>
                        </div>
                        

                         <!--GoldPartner-->
                         <hr>
                         <h5 class="font_02" align="center"><i class="fas fa-handshake fa-lg"></i>&nbsp;&nbsp;Gold Partner&nbsp;&nbsp;<i class="fas fa-handshake fa-lg"></i></h5>
                         <br>
                         <!--title Field -->
                         <div class="form-group row">
                             <label for="g_name" class="col-md-4 col-form-label text-md-right">Company/Owner Name:</label>
                             <div class="col-md-6">
                                 <input id="g_name" type="text" class="form-control{{ $errors->has('g_name') ? ' is-invalid' : '' }}" name="g_name" value="{{ old('g_name') }}"
                                     autofocus> @if ($errors->has('g_name'))
                                 <span class="invalid-feedback">
                                             <strong>{{ $errors->first('g_name') }}</strong>
                                         </span> @endif
                             </div>
                         </div>
 
                      <!-- logo Field -->
                         <div class="form-group row">
                             <label for="g_logo" class="col-md-4 col-form-label text-md-right">Official Logo</label>
                             <div class="col-md-6">
                                 <input type='file' id='g_logo' type="text" class="form-control {{ $errors->has('g_logo') ? ' is-invalid' : '' }}"
                                     name="g_logo" value="{{ old('g_logo') }}" accept="image/*"> @if ($errors->has('g_logo'))
                                 <span class="invalid-feedback">
                                                     <strong>{{ $errors->first('g_logo') }}</strong>
                                                 </span> @else
                                 <pre class="small">(*image aspect ratio must be 1:1)</pre> @endif
                             </div>
                         </div>

                         
                         <!--Bronze Partner-->
                         <hr>
                         <h5 class="font_02" align="center"><i class="fas fa-handshake fa-lg"></i>&nbsp;&nbsp;Bronze Partner&nbsp;&nbsp;<i class="fas fa-handshake fa-lg"></i></h5>
                         <br>
                         <!--title Field -->
                         <div class="form-group row">
                             <label for="b_name" class="col-md-4 col-form-label text-md-right">Company/Owner Name:</label>
                             <div class="col-md-6">
                                 <input id="b_name" type="text" class="form-control{{ $errors->has('b_name') ? ' is-invalid' : '' }}" name="b_name" value="{{ old('b_name') }}"
                                     autofocus> @if ($errors->has('b_name'))
                                 <span class="invalid-feedback">
                                             <strong>{{ $errors->first('b_name') }}</strong>
                                         </span> @endif
                             </div>
                         </div>
 
                      <!-- logo Field -->
                         <div class="form-group row">
                             <label for="b_logo" class="col-md-4 col-form-label text-md-right">Official Logo</label>
                             <div class="col-md-6">
                                 <input type='file' id='b_logo' type="text" class="form-control {{ $errors->has('b_logo') ? ' is-invalid' : '' }}"
                                     name="b_logo" value="{{ old('b_logo') }}" accept="image/*"> @if ($errors->has('b_logo'))
                                 <span class="invalid-feedback">
                                                     <strong>{{ $errors->first('b_logo') }}</strong>
                                                 </span> @else
                                 <pre class="small">(*image aspect ratio must be 1:1)</pre> @endif
                             </div>
                         </div>


                        <!--Previous 3 btn-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn btn-primary" id="prev_3">
                                    Prev
                                </div>
                                <button type="submit" class="btn btn-success">
                                    Save Contest
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop 
@section('scripts')
<script>
    $(document).ready(function(){
        $('#next_1').click(function(){
            $('#sec_01').hide();
            $('#sec_02').show();
            $('.card').css('height','105vh');
        });
       
        $('#next_2').click(function(){
            $('#sec_02').hide();
            $('#sec_03').show();
            $('.card').css('height','auto');
        });
        $('#prev_2').click(function(){
            $('#sec_02').hide();
            $('#sec_01').show();
            $('.card').css('height','auto');
        });
        $('#prev_3').click(function(){
            $('#sec_03').hide();
            $('#sec_02').show();
            $('.card').css('height','105vh');
        });
    });

</script>
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