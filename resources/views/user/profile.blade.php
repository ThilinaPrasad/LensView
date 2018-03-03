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
                    <div class="profile-userpic">
                        <img src="/storage/profile_pics/{{ $user->profile_pic }}" class="img-responsive mx-auto d-block" alt="">
                    </div>
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
                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" id='deleteButton'><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                    </div>
                    @endif
                    <!-- END SIDEBAR BUTTONS -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
<script>
    $(document).ready(function(){
    $('#deleteButton').click(function(){
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
                                     
                                        $(location).attr('href','/');
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