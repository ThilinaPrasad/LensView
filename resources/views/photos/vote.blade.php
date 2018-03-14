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
        margin-bottom: 20px;
        height: auto;
    }
    .cover {
        background-image: url("/storage/contests_covers/{{ $contest->cover_img }}");
        height: 350px;
        width: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .heading {
        padding-top: 10%;
        color: white;
        background-color: rgba(0, 0, 0, 0.4);
        width: 100%;
        height: 100%;
    }
    #go_images {
        opacity: 1;
    }
    #go_images:hover {
        color: white;
        opacity: 0.8;
        cursor: pointer;
    }
    .display-4{
        margin-top: -50px;
    }

a{
    
    color:white;
}

.head{
    margin:30px auto;
}

.below-section{
    background-color: white;
    margin:auto 20px;
    border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
}

.figure{
    transition: transform 0.5s ease;
}

.figure:hover{
    transform: scale(1.1);
}

.vote-btn-2:hover{
    cursor: pointer;
}

.share-btn{
    color:black;
    opacity: 0.4;
}

.social-media{
    margin-right: 0;
    margin-left:auto;
}

.share-btn:hover{
    color:black;
    opacity: 0.6;
}

a:hover{
    text-decoration: none;
    opacity: 0.7;
    color:white;
}
    @media (max-width: 768px) {
        .heading {
            padding-top: 30%;
        }
        .row {
            margin-bottom: 1px;
        }
        .m-text-center{
            text-align: center!important;
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
            <h5 align="center">Organized by : <a href="/users/{{ $user->id }}" title="View Profile">{{ $user->name }}</a></h5>
        <h5 class="text-warning" align="center" >Voting is available from {{ $contest->sub_end_at }}  to {{ $contest->closed_at }}</h6>
            <h1 id="go_images"><i class="fas fa-chevron-circle-down"></i></h1>
        </div>
    </div>
    <h2 align="center" class="font_01 head">All images available for voting</h2>
    @if(count($images)!=0)
    <div class="mx-auto d-block">
        <div class="row" style="margin-left: 0;margin-right: 0;">
            @foreach($images as $image)
            <figure class="figure col-md-4" >
                    <a class="elem" href="/storage/contest_images/{{ $image->image }}" title="{{ $image->title }}" 
                        data-lcl-txt="<div class='h4'><a href='https://www.facebook.com/sharer/sharer.php?u={{ URL::asset("/storage/contest_images/".$image->image) }}' target='_blank' class='vote-btn-2 share-btn' title='Share on Facebook'><i class='fab fa-facebook-square'></i></a>
                            <a href='https://twitter.com/intent/tweet?text={{ $image->title.'image from www.lensview.com' }}&amp;url={{ URL::asset("/storage/contest_images/".$image->image) }}' target='_blank' class='vote-btn-2 share-btn' title='Share on Twitter'><i class='fab fa-twitter-square'></i></a>
                            <a href='http://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::asset("/storage/contest_images/".$image->image) }}' target='_blank' class='vote-btn-2 share-btn' title='Share on LinkedIn'><i class='fab fa-linkedin'></i></a>  
                            <a href='https://plus.google.com/share?url={{ URL::asset("/storage/contest_images/".$image->image) }}' target='_blank' class='vote-btn-2 share-btn' title='Share on Google+'><i class='fab fa-google-plus-square'></i></a></div>
                            <div class='row badge badge-pill badge-info'><i class='fas fa-heart'></i>&nbsp;&nbsp<strong id='vote_count{{ $image->id }}'>{{ ($image->vote_count == null)? 0:$image->vote_count  }}</strong></div><div class='row'><button class='{{ (in_array($image->id,$votes))? "btn btn-info" : "btn btn-secondary" }}' value='{{ $image->id }}' onClick='vote(this);'>{{(in_array($image->id,$votes))? "<i class='fas fa-heart'></i>&nbsp;&nbsp;-Vote" : "<i class='far fa-heart'></i>&nbsp;&nbsp;+Vote"  }}</button>&nbsp;&nbsp;<a href='/storage/contest_images/{{ $image->image }}' class='btn btn-success' download='' {{ $image->downloadable!='on'? 'hidden' : ''}}><i class='fas fa-download'></i>&nbsp;&nbsp;Download</a></div>
                        "
                        data-lcl-author='<a href="/users/{{ $image->user_id }}" title="View profile">{{ Laravel\User::find($image->user_id)->name }}</a>' data-lcl-thumb="/storage/contest_images/{{ $image->image }}">
                        <img src="/storage/contest_images/{{ $image->image }}" class="figure-img img-fluid">
                            </a>
                            <figcaption class="figure-caption below-section row" style="font-size:20px;">      
                                <strong id="vote-btn-2" class="vote-btn-2 text-left col-md-6 m-text-center" title="Add vote" data-id="{{ $image->id }}" data-lcl-txt="{{ ($image->vote_count == null)? 0:$image->vote_count  }}" onClick="voteImg(this);">
                                        <i class="{{ (in_array($image->id,$votes))? 'fas fa-heart' : 'far fa-heart' }}"></i>&nbsp;{{ ($image->vote_count == null)? '0': $image->vote_count  }}
                                    </strong>
                                       <div class="col-md-6 text-right m-text-center">
                                       <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::asset('/storage/contest_images/'.$image->image) }}" target="_blank" class="vote-btn-2 share-btn" title="Share on Facebook"><i class="fab fa-facebook-square"></i></a>
                            <a href="https://twitter.com/intent/tweet?text={{ $image->title." image from www.lensview.com" }}&amp;url={{ URL::asset('/storage/contest_images/'.$image->image) }}" target="_blank" class="vote-btn-2 share-btn" title="Share on Twitter"><i class="fab fa-twitter-square"></i></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::asset('/storage/contest_images/'.$image->image) }}" target="_blank" class="vote-btn-2 share-btn" title="Share on LinkedIn"><i class="fab fa-linkedin"></i></a>  
                            <a href="https://plus.google.com/share?url={{ URL::asset('/storage/contest_images/'.$image->image) }}" target="_blank" class="vote-btn-2 share-btn" title="Share on Google+"><i class="fab fa-google-plus-square"></i></a>               
                        </div> 
                        
                        <small style="font-size:10px;" class="col-md-6 text-left">{{ $image->title }}</small>
                        <small style="font-size:10px;" class="col-md-6 text-right">Uploaded by: <a style="color:black;" href="/users/{{ $image->user_id }}" title="View profile">{{ Laravel\User::find($image->user_id)->name }}</a></small>
                    </figcaption>
                        </figure>            
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

function vote(vote_btn) {
var img_id = vote_btn.value;
var xhttp = new XMLHttpRequest();
//console.log(img_id);
  if($(vote_btn).attr('class')=='btn btn-secondary'){
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //vote_btn.removeClass('btn-secondary');
        $(vote_btn).attr("class" , "btn btn-info");
        $(vote_btn).html('<i class="fas fa-heart"></i>&nbsp;&nbsp;-Vote');
        var temp = $("#vote_count"+img_id);
        temp.text((parseInt(temp.text())+1).toString());
    }

  };
  xhttp.open("get", "/addvote/"+img_id, true);
  xhttp.send();
  }else{
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //vote_btn.removeClass('btn-secondary');
        $(vote_btn).attr("class" , "btn btn-secondary");
        $(vote_btn).html('<i class="far fa-heart"></i>&nbsp;&nbsp;+Vote');
        var temp = $("#vote_count"+img_id);
        temp.text((parseInt(temp.text())-1).toString());
    }
  };
  xhttp.open("get", "/removevote/"+img_id, true);
  xhttp.send();
  }  
}

  function voteImg(btn){
      var voteCount = $(btn).attr("data-lcl-txt").trim();
      var inner = $(btn).html().trim();
      var id = $(btn).attr("data-id").trim();
       var xhttp = new XMLHttpRequest();
       if(inner=='<i class="far fa-heart"></i>&nbsp;'+voteCount){
           
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //vote_btn.removeClass('btn-secondary');
        $(btn).attr("data-lcl-txt",(parseInt(voteCount)+1).toString());
        $(btn).html('<i class="fas fa-heart"></i>&nbsp;'+(parseInt(voteCount)+1).toString());
    }

  };
  xhttp.open("get", "/addvote/"+id, true);
  xhttp.send();
  }else{
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //vote_btn.removeClass('btn-secondary');
        $(btn).attr("data-lcl-txt",(parseInt(voteCount)-1).toString());
        $(btn).html('<i class="far fa-heart"></i>&nbsp;'+(parseInt(voteCount)-1).toString());
    }

  };
  xhttp.open("get", "/removevote/"+id, true);
  xhttp.send();
  }

  }
</script>
@stop