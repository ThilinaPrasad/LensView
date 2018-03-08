@extends('layouts.app') 
@section('title') Photo Contests 
@stop 
@section('styles')
<link href="{{ asset('css/contests.blade.css') }}" rel="stylesheet">
<link href="{{ asset('css/cricular.progress.css') }}" rel="stylesheet"> 
<style>
    
.d-flex picture {
  width:300px;
  flex: auto;
}

.show-img{
    max-height:500px;
    overflow-y: scroll;
}

@media (min-width: 992px) { 
  .w-lg-50 {width:50%!important;}
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
                <!--Circular Progress-->
                <div class="show-overlay">
                    <div class="col-sm-1 mx-auto d-block">
                        <div class="progress" data-percentage="{{ $days_presentage }}">
                            <span class="progress-left">
                                        <span class="progress-bar"></span>
                            </span>
                            <span class="progress-right">
                                        <span class="progress-bar"></span>
                            </span>
                            <div class="progress-value">
                                <div>
                                    {{$days_left}}<br>
                                    <span>
                                    @if($days_left!=1)
                                    {{ "days" }}
                                    @else
                                    {{ "day" }}
                                    @endif left</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--Circular Progress-->
                    <h1 class="card-title display-3">{{ $contest->title }}</h1>
                    <h3 class="prize">Try With Your Creativity & Win
                        <p> <strong class="h1">{{ $contest->prize }} </strong></h3>
                            @if(Auth::check() && (Auth::user()->role_id != '1'))
                    <a href="/photographs/upload/{{$contest->id}}" class="btn btn-light font_03"><i class="fas fa-upload"></i>&nbsp;&nbsp;Submit Photographs</a>                    
                    @endif
                    @if(Auth::check() && (Auth::user()->id == $contest->user_id))
                    <a href="/contests/{{ $contest->id }}/edit" class="btn btn-light font_3"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</a>    
                    <a href="#" class="btn btn-light font_3 delete-btn" id="deleteButton"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</a>               
                    <form method="post" action="{{ route('contests.destroy',[$contest->id]) }}" id="delete-contest" style="display:none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete ">
                        </form>
                    @endif
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
        <p class="badge badge-pill badge-info">Submission available in {{ $contest->sub_start_at }}&nbsp; to &nbsp;{{ $contest->sub_end_at }}</p>
    </div>
</div>
<!--about section-->
<!--prizes section-->
<div class="jumbotron text-center prize-section">
    <p class="font_01 h1 prize-head"><i class="fas fa-chess-queen"></i> Win Amazing Prize <i class="fas fa-chess-queen"></i></p>
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
        <p class="font_01 h1 prize-head"><i class="fas fa-images"></i> Uploaded Photographs <i class="fas fa-images"></i></p>
<div class="container show-img">
    <div class="d-flex flex-row flex-wrap">
        @foreach($photos as $photo)
   <picture>
   <img src="/storage/contest_images/{{ $photo->image }}" alt="placeholder image"  class="img-fluid" title="Uploaded by {{$photo->name}}">
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
</script>
@stop