@extends('layouts.app') 
@section('title') Dashboard 
@stop 
@section('content') 
@if(Auth::check() && Auth::user()->role_id== '1')
    @include('user.voterdashboard') 
    @endif 
@stop 
@section('scripts')
@if(Auth::check() && Auth::user()->role_id== '1')
<script>
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
  }}
</script>
@endif 
@stop 
@section('styles') @if(Auth::check() && Auth::user()->role_id == '1')
<style>
    .feed {
        padding: 80px;
        width: 80%;
        min-height: 100vh;
        background-color: white;
    }
    .profile-img {
        width: 50px;
        height: 50px;
        float: left;
        margin-right: 10px;
    }
    .img-cont {
        margin: 0;
    }
    .user-data {
        vertical-align: middle;
        padding-top: 3px;
    }
    .vote-btn-2:hover {
        cursor: pointer;
    }
    .post-img {
        width: 90%;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    .post-desc {
        padding-left: 5%;
        padding-right: 5%;
        font-size: 11px;
    }
    .below-section {
        background-color: white;
        margin: auto 35px auto 34px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
        border: 1px solid rgba(102, 102, 102, 0.2);
    }
    .share-btn {
        color: gray;
    }
    .post-title {
        padding-left: 5%;
        padding-right: 5%;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 0;
    }
    .post-contest {
        padding-left: 5%;
        padding-right: 5%;
        font-size: 13px;
    }
    .container {
        padding: 0;
    }
    a {
        color: black;
    }
    .head {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .jumbotron {
        background-color: white;
        border: 1px solid rgba(102, 102, 102, 0.2);
        border-radius: 10px;
        padding-bottom: 10px;
        padding-top: 30px;
        margin-bottom: 15px;
    }
    a:hover {
        text-decoration: none;
        color: black;
        opacity: 0.7;
    }
    @media (max-width: 768px) {
        .feed {
            padding-left: 30px;
            padding-right: 30px;
            width: 100vw;
        }
        .below-section {
            margin: auto 12px auto 12px;
        }
        .m-text-center {
            text-align: center!important;
        }
    }
</style>
@endif 
@stop