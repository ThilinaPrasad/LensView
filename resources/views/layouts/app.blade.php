<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'LensView') }} | @yield('title')</title>
    <!-- Styles -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> @yield('styles')
    <!-- Fonts -->
    @include('fonts.fonts')
</head>

<body>
    <div class="alert alert-danger" id="protected_alert"><i class="fas fa-exclamation-circle fa-lg"></i>&nbsp;&nbsp;Content Protected by LensView!</div>
    <div id="app">
    @include('inc.navbar') @yield('content')
    @include('inc.footer')
    </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Smooth Scrolling -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-scrollLock.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script>
        //Notification handeller
            function read(notification) {
                var id = $(notification).attr('data-id');
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(parseInt($("#not_count").text().trim())-1==0){
                            $("#not"+id).html('<div class="row"><div class="col-md-12 notification-text text-center"><p class="lead"><i class="far fa-check-circle"></i>&nbsp;All notifications are read!</p></div></div>');
                        }else{
                            $("#not"+id).css('display','none');
                        }
                        $("#not_count").text(parseInt($("#not_count").text().trim())-1);
                    }

  };
                 xhttp.open("get", "/read/"+id, true);
                 xhttp.send();
                }

                function readAll(notification) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {    
                            $(".notification-section").html('<div class="dropdown-item notification"><div class="row"><div class="col-md-12 notification-text text-center"><p class="lead"><i class="far fa-check-circle"></i>&nbsp;All notifications are read!</p></div></div></div>');
                        $("#not_count").text(0);
                    }

  };
                 xhttp.open("get", "/readall", true);
                 xhttp.send();
                }
    </script>
    @yield('scripts')
    @include('inc.messages')
</body>

</html>