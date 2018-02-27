@extends('layouts.app') 
@section('title') Vote Images 
@stop 
@section('styles')
<style type="text/css">
    .elem,
    .elem * {
        box-sizing: border-box;
        margin: 0 !important;
    }
    .elem {
        display: inline-block;
        font-size: 0;
        border: 20px solid transparent;
        border-bottom: none;
        background: #fff;
        padding: 10px;
        height: auto;
        background-clip: padding-box;
    }
    .elem>span {
        display: block;
        cursor: pointer;
        height: 0;
        padding-bottom: 70%;
        background-size: cover;
        background-position: center center;
    }
    .contest-wrapper {
        margin-top: 60px;
        margin-bottom:20px;
        height:auto;
    }

    .cover {
    background-image: url("/storage/contests_covers/{{ $contest->cover_img }}");
    height: 350px; 
    width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.heading{
    padding-top: 10%;
    color: white;
    background-color: rgba(0,0,0,0.4);
    width:100%;
    height: 100%;
}

#go_images{
    opacity: 1;
}

#go_images:hover{
    color:white;
    opacity: 0.8;
    cursor: pointer;
}

@media (max-width: 768px) {
    .heading{
        padding-top:30%; 
    }

    .row{
        margin-bottom:1px;
    }
}
</style>
<link rel="stylesheet" href="{{ asset('css/vote_img/lc_lightbox.css') }}" />
<link rel="stylesheet" href="{{ asset('css/vote_img/minimal.css') }}" /> 
@stop 
@section('content')
<div class="contest-wrapper">
    <div class="cover">
        <div class="heading text-center">
    <h1 align="center" class="font_01 display-4">{{ $contest->title }}</h1>
    <h2 align="center" class="font_01">Add Your Votes <i class="far fa-heart"></i></h2>
    <h1  id="go_images"><i class="fas fa-chevron-circle-down"></i></h1>
        </div>
    </div>
    @if(count($images)!=0)
    <div class="mx-auto d-block" >
        <div class="row" style="margin-left: 0;margin-right: 0;" >
            @foreach($images as $image)
        <a class="elem col-md-4" href="/storage/contest_images/{{ $image->image }}" title="{{ $image->title }}"
        data-lcl-txt="<button class='btn btn-secondary'><i class='far fa-heart'>&nbsp;&nbsp;</i>AddVote</button>&nbsp;&nbsp;<a href='/storage/contest_images/{{ $image->image }}' class='btn btn-success' download='' {{ $image->downloadable!='on'? 'hidden' : ''}}><i class='fas fa-download'></i>&nbsp;&nbsp;Download</a>" data-lcl-author="{{ $user->name }}" data-lcl-thumb="/storage/contest_images/{{ $image->image }}">
                <span style="background-image: url(/storage/contest_images/{{ $image->image }});"></span>
                </a>    
            @endforeach
    </div>
    
</div>
@else
<div style="height:100vh;padding-top:25vh;">
    <img src="{{ asset('img/static/animation_4.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
    <h1 align="center" class="font_01">No Photographs for Voting</h1>
</div>
@endif
</div>
@stop 

@section('scripts')
<script src="{{ asset('js/vote_img/lc_lightbox.lite.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/vote_img/alloy_finger.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">

    $("#go_images").click(function () {
    TweenLite.to(window, 1, { scrollTo: 350 });
});

    $(document).ready(function(e) {
           
            // live handler
            lc_lightbox('.elem', {
                wrap_class: 'lcl_fade_oc',
                gallery : true,	
                thumb_attr: 'data-lcl-thumb', 
                
                skin: 'minimal',
                radius: 0,
                padding	: 0,
                border_w: 0,
            });	
        
        });
</script>
@stop