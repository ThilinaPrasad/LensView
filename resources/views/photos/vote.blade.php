@extends('layouts.app') 
@section('title') Vote Images
@stop 
@section('styles') 
<style type="text/css">
    .elem, .elem * {
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
    .elem > span {
        display: block;
        cursor: pointer;
        height: 0;
        padding-bottom:	70%;
        background-size: cover;	
        background-position: center center;
    }

    .contest-wrapper{
        margin-top: 100px;
    }
    </style>
    <link rel="stylesheet" href="{{ asset('css/vote_img/lc_lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vote_img/minimal.css') }}" />
@stop 
@section('content')
<div class="contest-wrapper">
<!--h1 align="center" class="font_01">Contest Name Here</h1-->
<div class="mx-auto d-block">
    <div class="row">
        <a class="elem col-md-4" href="/storage/contests_covers/ce1ae24b6ddcee7e2bbb21585885c814e34b6537_1519496935.jpg" title="image 1" data-lcl-txt="lorem ipsum dolor sit amet" data-lcl-author="Test" data-lcl-thumb="/storage/contests_covers/ce1ae24b6ddcee7e2bbb21585885c814e34b6537_1519496935.jpg">
         <span style="background-image: url(/storage/contests_covers/ce1ae24b6ddcee7e2bbb21585885c814e34b6537_1519496935.jpg);"></span>
     </a>
     <a class="elem col-md-4" href="/storage/contests_covers/fd9240e54c001dcb26f37c0ba6989ddd8dfe91cd_1519496993.jpg" title="image 2" data-lcl-txt="lorem ipsum dolor sit amet" data-lcl-author="someone" data-lcl-thumb="/storage/contests_covers/fd9240e54c001dcb26f37c0ba6989ddd8dfe91cd_1519496993.jpg">
         <span style="background-image: url(/storage/contests_covers/fd9240e54c001dcb26f37c0ba6989ddd8dfe91cd_1519496993.jpg);"></span>
     </a>
     
     <a class="elem col-md-4" href="https://images.unsplash.com/photo-1442850473887-0fb77cd0b337?dpr=1&auto=format&fit=crop&w=2000&q=80&cs=tinysrgb" title="image 3" data-lcl-txt="lorem ipsum dolor sit amet" data-lcl-author="someone" data-lcl-thumb="https://images.unsplash.com/photo-1442850473887-0fb77cd0b337?dpr=1&auto=format&fit=crop&w=150&q=80&cs=tinysrgb">
         <span style="background-image: url(https://images.unsplash.com/photo-1442850473887-0fb77cd0b337?dpr=1&auto=format&fit=crop&w=400&q=80&cs=tinysrgb);"></span>
     </a>
    </div>
    </div>
</div>
    @stop
    @section('scripts') 
    <script src="{{ asset('js/vote_img/lc_lightbox.lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/vote_img/alloy_finger.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
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