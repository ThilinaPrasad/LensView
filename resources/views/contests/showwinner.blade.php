@extends('layouts.app') 
@section('title') Winner Contest
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet">

<style>
    
.d-flex picture {
  width:300px;
  flex: auto;
}

.show-img{
    max-height:500px;
    overflow-y: scroll;
}

.winner-section{
    
    background:url('{{ asset('img/static/winner-back.gif') }}');
    padding:0;
    padding-top:20px;
    margin:32px 16px;
    
}

.winner-img{
    margin-top: 15px;
   border: 4px dashed rgba(255,215,0,0.8);
}

.winner_name:hover{
    text-decoration: none;
    color:black;
    opacity: 0.7;
}

.gold{
    color: rgb(255,215,0);
    text-shadow: gray 2px 2px 2px;
}

.winner_img{
    width:50vw;
    border: 4px dashed rgba(255,215,0,0.7);
    border-radius: 50px;
    transition:transform 0.5s ease ;
    cursor: pointer;
}

.winner_img:hover{
    transform: scale(1.1);
}

.winner_img_head{
    margin-top:30px;
    margin-bottom: 20px;
}

#review_box,.review-show{
    border-radius: 80px;
    padding: 20px 50px;
    margin-top: 20px;
    border: 2px double rgba(255,215,0,0.3);
}

.review-show{
    background-color: rgb(255,255,255);
    font-size: 18px;

}

#reviewSubmit{
    margin-top:10px;
    border-radius:20px;
}



@media (max-width: 992px) { 
  .w-lg-50 {width:50%!important;}

  .overlay-gif{
      transform: scale(0.5);
  }
  .prize{
      margin-top: -20px;
      margin-bottom: -50px;
  }
  .winner_img{
      width:80vw;
      border-radius: 15px;
  }
}


</style>
@stop 
@section('content')
<!--cover Section-->
<div class="row show-row">
    <div class="col-md-12 contest-item">
        <div class="card card-inverse">
            <img class="card-img img-fluid" src="/storage/contests_covers/{{ $contest->cover_img }}" alt="Card image">
            <div class="card-img-overlay  text-center">
                    <h1 class="card-title display-3">{{ $contest->title }}</h1>
                    <h3 class="prize">Winner Price
                        <p> <strong class="h1">{{ $contest->prize }} </strong></h3>
                            <img src="{{ asset('img/static/animation_9.gif') }}" class="rounded-circle mx-auto d-block overlay-gif" style="margin:10px;opacity:0.6;width:150px;height:150px;">
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--cover Section-->
<!--about section-->
<div class="jumbotron jumbotron-fluid text-center show-about">
    <div class="container">
        <p class="h1 font_01">About {{ $contest->title }} Contest</p>
        <p class="lead">{{ $contest->description }}</p>
        <p class="badge badge-pill badge-info">Winner Selected date : {{ $contest->winner_selected_date }}</p>
    </div>
</div>
<!--about section-->
<!--winner section-->
<div class="jumbotron text-center prize-section winner-section">
    <p class="font_01 h1 prize-head gold"><i class="fas fa-chess-queen"></i> Winner <i class="fas fa-chess-queen"></i></p>
<a href="/users/{{ $winner->id }}" class="font_03 h3 winner_name" data-toggle="tooltip" data-placement="right" title="View profile">{{ $winner->name }}</a>
    <a href="/users/{{ $winner->id }}" class="prize-img" data-toggle="tooltip" data-placement="bottom" title="View profile"><img src="/storage/profile_pics/{{ $winner->profile_pic }}"  class="hover-effect-2 mx-auto d-block img-fluid prize_img rounded-circle winner-img"></a>
    <h2 class="font_01 winner_img_head gold" align="center"><i class="far fa-image"></i>&nbsp;&nbsp;Winner Image&nbsp;&nbsp;<i class="far fa-image"></i></h2>
    <img src="/storage/contest_images/{{ $winner_img }}" data-toggle="tooltip" data-placement="bottom" title="Winner Image" class="winner_img">
    @if(Auth::check()&& Auth::user()->id == $winner->id)
    <!--Review section-->
<div class="form-group col-md-6 mx-auto d-block review-section">
        @if(count($review)==0))
    <textarea class="form-control" title="Enter your idea here"  rows="2" id="review_box" placeholder="{{ $winner->name }} leave your idea about LensView here..."></textarea>
<button id="reviewSubmit" class="btn btn-success" title="Send your idea" data-user="{{ $winner->id }}" data-contest="{{ $contest->winner_contest }}" data-image="{{ $contest->winner_img  }}" onclick="review(this);"><i class="far fa-star"></i>&nbsp;&nbsp;Send</button>
@else

<div class="review-show font_03">
        <h5 class="font_01">Your review on this contest</h5>
    <i class="fas fa-quote-left"></i><br>{{ $review[0]->comment }}<br><i class="fas fa-quote-right"></i>
</div>
@endif  
</div>
<!--Review section-->

@endif
</div>
<!--winner section-->

<!--prizes section-->
<div class="jumbotron text-center prize-section">
    <p class="font_01 h1 prize-head"><i class="fas fa-chess-queen"></i> Winner Prize <i class="fas fa-chess-queen"></i></p>
    <p class="font_03 h3">{{ $contest->prize }}</p>
    <img src="/storage/contests_prizes/{{ $contest->prize_image }}" class="hover-effect-2 mx-auto d-block img-fluid prize_img rounded-circle">
    <p class="col-md-6 offset-md-3" style="margin-top:20px;">{{ $contest->prize_description }}</p>
</div>
<!--prizes section-->
<!--Partners Section-->
<div class="jumbotron marketing text-center show-partner">
    <p class="h1 font_01"><i class="fas fa-handshake"></i> Partnesr with us <i class="fas fa-handshake"></i></p>
    <div class="row">
        @foreach($sponsors as $sponsor)
        <div class="col-lg-4">
            <img class="rounded-circle hover-effect-2" src="/storage/contests_sponsors/{{ $sponsor->logo }}" alt="Generic placeholder image"
                width="140" height="140">
            <h3>{{ $sponsor->name }}</h3>
        </div>
        @endforeach
    </div>
</div>
</div>
<!--Partners Section-->
<!--Currently uploaded Images-->
@if(count($photos)!=0)
<div class="jumbotron text-center">
        <p class="font_01 h1 prize-head"><i class="fas fa-images"></i> Submitted Photographs <i class="fas fa-images"></i></p>
<div class="container show-img">
    <div class="d-flex flex-row flex-wrap">
        @foreach($photos as $photo)
   <picture>
   <img src="/storage/contest_images/{{ $photo->image }}" alt="placeholder image"  class="img-fluid" data-toggle="tooltip" data-placement="top" title="Uploaded by {{$photo->name}}">
  </picture>
      @endforeach
    </div>
</div>
</div>
@endif
<!--Currently uploaded Images-->
<!--Owner Info-->
<div class="container-fluid owner-sec">
    <div class="text-center">
        <strong>Organized by</strong>
    <a href="/users/{{ $owner->id }}" class="organizer">
        <img src="/storage/profile_pics/{{ $owner->profile_pic}}" class="rounded-circle mx-auto d-block" width="80" height="80" title="View Profile">
        <strong>{{ $owner->name}}</strong>
    </a>
    </div>
</div>
@stop
@section('scripts')
<script>
    $(document).ready(function(){
    $('#deleteButton').click(function(){
        $.confirm({
                        theme: 'modern',
                        icon: 'far fa-trash-alt',
                        title: 'Delete Contest!',
                        content: 'Do you want to delete this contest ?',
                        autoClose: 'cancel|10000',
                        closeIcon: true,
                        draggable: true,
                        animationBounce: 2.5,
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            Delete: {
                            text: 'Delete',
                            btnClass: 'btn-red',
                            action : function () {
                                event.preventDefault();
                                $('#delete-contest').submit();
                            }
                        },
                            cancel: function () {
                                
                            }
                            
                        }
                    });
    });

});

function review(btn){
        var user_id = $(btn).attr('data-user');
        var contest_id = $(btn).attr('data-contest');
        var image_id = $(btn).attr('data-image');
        var review = $('#review_box').val();
      
   if(review!=''){
        $.post("/review",
    {
        _token: $('meta[name="csrf-token"]').attr('content'),
        user: user_id,
        contest: contest_id,
        image : image_id,
        comment : review
    },
    function(data, status){
        if(status="success"){
            $.alert({
    theme: 'modern',
    icon: 'far fa-check-circle',
    title: 'Success !',
    content: "Your review successfully added! ",
    autoClose: 'ok|3000',
    type: 'green',
            typeAnimated: true,
});

$('.review-section').fadeOut(2000);

$('.review-section').html('<div class="review-show font_03"><h5 class="font_01">Your review on this contest</h5><i class="fas fa-quote-left"></i><br>'+review+'<br><i class="fas fa-quote-right"></i></div>');
$('.review-section').fadeIn(2000);

        }
    });
   }else{
    $.alert({
    theme: 'modern',
    icon: 'far fa-times-circle',
    title: 'Alert !',
    content: "Please enter your review before submit !",
    autoClose: 'ok|3000',
    type: 'red',
            typeAnimated: true,
});
   }
    }
</script>
@stop