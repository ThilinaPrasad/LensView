@extends('layouts.app') 
@section('title') Photo Contests 
@stop 
@section('styles')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
<style>
    .user-image{
        width:150px;
        margin-bottom:-10px;
    }
    .profile-sidebar{
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .profile-content{
        min-height: 96vh;
    }

.container{
    padding: 0;
}

.notification{
    border:1px solid rgba(0,0,0,0.2);
    margin:5px auto;
}


    @media only screen and (max-width: 768px) {
        .user-card{
            display: none;
        }
    }
</style>
@stop 
@section('content')
<div class="container profile-view">
        <div class="row profile">
            <div class="col-md-3 user-card">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
               
                <img src="/storage/profile_pics/{{ Auth::user()->profile_pic }}" class="img-responsive mx-auto d-block rounded-circle user-image" alt="">
        
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                                {{ Auth::user()->name }}
                        </div>
                        <div class="profile-usertitle-job">
                            {{ Laravel\Models\Role::find(Auth::user()->role_id)->name }}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div>
            </div>
            <div class="col-md-9 notifications">
                <div class="profile-content">
                    <h3 align="center" class="text-muted"><i class="far fa-bell fa-lg"></i></h3>
                    <h2 class="font_01 text-muted" align="center">LensView Notifications Center</h2>
                    <hr>

                    <!--Notifiocations ceter-->
                    <!--Notification-->
                    @if(count($notifications)!=0)
            @foreach($notifications as $notification)
                <div class="notification rounded {{ $notification->status==0 ? 'read' : '' }}" id="{{ "not".$notification->not_id }}">
            
                <div class="row">
                <a href="/users/{{ $notification->sender_id }}" class="col-md-2 offset-md-1" title="title here">
                    <img src="/storage/profile_pics/{{ $notification->profile_pic }}" class="rounded-circle notification-icon-1">
                    </a>
                    <div class="col-md-7 notification-text ">
                            <a {{  $notification->sender_id!=1 ? 'href=users/'.$notification->sender_id : "" }} title="{{  $notification->sender_id!=1 ? 'View '.$notification->name."'s profile" : "" }}">{{ $notification->name }}</a>&nbsp;{!! $notification->messege !!}
                            <br><span class="text-muted"><i class="far fa-clock"></i> {{ date_format(date_create($notification->sent_date),'d-M-Y  G:i A') }}</span>
                </div>
                    <div class="col-md-2">
                            @if($notification->img_link!=null)
                    <img src="{{ $notification->img_link }}" class="notification-icon-1">
                @endif    
                </div>
               
                </div>
            </div>
            <!--Notification-->
            @endforeach
            @else
            <div class="dropdown-item notification rounded">
                    <div class="row notification rounded">
                        <div class="col-md-12 notification-text text-center">
                        <p class="lead"><i class="far fa-comment"></i>&nbsp;No notifications to show!</p>
                    </div>
                </div>
                </div>
            @endif
                    <!--Notifiocations ceter-->
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
<script>
    
</script>
@stop