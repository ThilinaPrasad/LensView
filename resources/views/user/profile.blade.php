@extends('layouts.app') 
@section('title') Photo Contests 
@stop 
@section('styles')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@stop 
@section('content')
<div class="container profile-view">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                <a href="/profilepic/{{ $user->id }}" class="profile-userpic" title="Change profile picture">
                        <img src="/storage/profile_pics/{{ $user->profile_pic }}" class="img-responsive mx-auto d-block" alt="">
                    </a>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                            <div id="user_id" style="display:none;">
                                    {{ $user->id }}
                                </div>
                        <div class="profile-usertitle-name">
                            {{ $user->name }}
                        </div>
                        <div class="profile-usertitle-job">
                            {{ $role->name}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    @if(Auth::check() && Auth::user()->id==$user->id)
                    <div class="profile-userbuttons">
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" id='deleteButton'><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                    </div>
                    @endif
                    <!-- END SIDEBAR BUTTONS -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <br>
                        <h2 class="font_01" align="center"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Personal Data&nbsp;&nbsp;<i class="fas fa-user-circle"></i></h2>
                        <br>
                        <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fas fa-user">&nbsp;&nbsp;</i>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->name }}
                                </a>
                            <a href="mailto:{{ $user->email }}" class="list-group-item list-group-item-action" title="Send E-mail to {{ $user->name }}"><i class="fas fa-envelope"></i>&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->email }}</a>
                            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-home"></i>&nbsp;&nbsp;Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->address }}</a>
                                <a href="tel:{{ $user->telephone }}" class="list-group-item list-group-item-action" title="Make a call to {{ $user->name }}"><i class="fas fa-phone"></i>&nbsp;&nbsp;Telephone No : {{ $user->telephone }}</a>
                            <a href="#" class="list-group-item list-group-item-action disabled"><i class="fas fa-smile"></i>&nbsp;&nbsp;User Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $role->name }}</a>
                              </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
<script>
    $(document).ready(function(){
    $('#deleteButton').click(function(){
        var alerted = false;
        $.confirm({
                        theme: 'modern',
                        icon: 'fas fa-user-times',
                        title: 'Remove Account ?',
                        content: 'Please enter your password'+
                        '<br><input type="password" placeholder="Password" class="del-pass form-control is-invalid" required />' ,
                        autoClose: 'cancel|25000',
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
                           
                                var user_id = $('#user_id').text().trim();
                
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        if(this.responseText=='success'){
                                            $.alert({
                                    theme: 'modern',
                                    icon: 'far fa-check-circle',
                                    title: 'User account deleted !',
                                    content: 'Your account has deleted successfully !',
                                    autoClose: 'ok|8000',
                                    closeIcon: true,
                                    draggable: true,
                                    type: 'green',
                                    onClose: function () {
                                        $(location).attr('href','/');
        
                                    }
                                });
                                
                                        }else{
                                            $.alert({
                                    theme: 'modern',
                                    icon: 'far fa-times-circle',
                                    title: 'Incorrect password !',
                                    content: 'Please enter your password to delete account from LensView',
                                    closeIcon: true,
                                    draggable: true,
                                    type: 'red',
                                    
                                });
                                alerted = true;
                                        }
                                    }
                                };
                                xhttp.open("GET", "/deleteuser/"+user_id+"/"+this.$content.find('.del-pass').val(), true);
                                xhttp.send();
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