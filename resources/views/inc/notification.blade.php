<?php $notifications = \Laravel\Http\Controllers\NotificationsController::show() ?>
<li class="nav-item dropdown user-dropdown">
    <a class="nav-link dropdown-toggle text-center notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false" title="View my notifications">
                <i class="far fa-bell fa-lg"></i><span class="badge badge-pill badge-success align-top" id="not_count">{{ count($notifications)}}</span>
                    </a>
    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="navbarDropdown">
        <div class="dropdown-header row head-inner"><span class="col-md-10 font_01 notification-head lead text-center">LensView Notification Center</span><span class="offset-md-5 col-md-2 read-all"
                data-toggle="tooltip" data-placement="top" title="Mark all as read" onClick="readAll();"><i class="fas fa-eye fa-lg"></i></span></div>
        <div class="dropdown-divider"></div>
        <!-- Notifications goes here -->
        <div class="notification-section">
            @if(count($notifications)!=0)
            @foreach($notifications as $notification)
            <!--Notification-->
        <div class="dropdown-item notification" id="{{ "not".$notification->not_id }}">
                <div class="row">
                <a href="/users/{{ $notification->sender_id }}" class="col-md-2" title="{{  $notification->sender_id!=0 ? 'View '.$notification->name."'s profile" : "" }}">
                    <img src="/storage/profile_pics/{{ $notification->profile_pic }}" class="rounded-circle notification-icon-1">
                    </a>
                    <div class="col-md-7 notification-text">
                    <a {{  $notification->sender_id!=0 ? 'href="/users/"'.$notification->sender_id : "" }} title="{{  $notification->sender_id!=0 ? 'View '.$notification->name."'s profile" : "" }}">{{ $notification->name }}</a>&nbsp;{!! $notification->messege !!}
                    <br><span class="text-muted"><i class="far fa-clock"></i> {{ $notification->sent_date }}</span>
                </div>
                    <div class="col-md-2">
                        @if($notification->img_link!=null)
                    <img src="{{ $notification->img_link }}" class="notification-icon-1">
                    @endif
                    </div>
                    <div class="col-md-1 pt-3">
                        @if($notification->type!='public')
                    <span class="read"  data-toggle="tooltip" data-placement="top" title="Mark as read" data-id="{{ $notification->not_id }}" onclick="read(this);"><i class="far fa-dot-circle"></i></span>
                @endif    
                </div>
                </div>
            </div>
            <!--Notification-->
            @endforeach
            @else
            <div class="dropdown-item notification">
                    <div class="row">
                        <div class="col-md-12 notification-text text-center">
                        <p class="lead"><i class="far fa-check-circle"></i>&nbsp;All notifications are read!</p>
                    </div>
                </div>
                </div>
            @endif
           
        </div>
    </div>
</li>