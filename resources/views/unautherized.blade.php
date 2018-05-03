<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'LensView') }} | Unautherized</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> @yield('styles')
    <!-- Fonts -->
    @include('fonts.fonts')
</head>
<div class="card mx-auto d-block height:100vh;">
    <div style="padding:25vh 50px;height:100vh;">
        <img src="{{ asset('img/static/unautherized.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:150px;height:150px;opacity:0.4;">
        <h2 align="center" class="font_01" style="color:#ef5350;">Unautherized Access to this URL!</h2>
        <h6 align="center" class="font_02" style="color:#ef5350;">LensView Detected you as unautherized user to the sysetm and system automatically blocked this URL for you.<br>is there any issue contact LensView team lenasview.info@gmail.com</h6>
        <h4 align="center" class="font_01" style="color:#ef5350;">Thank You!</h4>
        <center>
      <a href="/" class="btn btn-danger font_03 mx-auto"><< Goto Back Home</a>
        </center>
        
    </div>
</div>
</body>
</html>