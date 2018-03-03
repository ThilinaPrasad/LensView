<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
    <div class="container">
        <a class="navbar-brand hover_effect" href="{{ url('/') }}">
                    <img src="{{ asset('img/static/navbarlogo.png') }}" class="image-fluid">
                </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="@yield('contests') navigation"><a class="nav-link text-center" href="/contests">Photo Contests</a></li>
                <li class="@yield('photos') navigation"><a class="nav-link text-center" href="/photos">Photos</a></li>
                <li class=" @yield('vote') navigation"><a class="nav-link text-center" href="/votes/contests">Vote</a></li>
                <li class="@yield('about') navigation"><a class="nav-link text-center" href="#">About Us</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="{{ Request::segment(1) === 'login' ? 'navbar-active' : null }} navigation"><a class="nav-link text-center" href="{{ route('login') }}">LogIn</a></li>
                <li class="{{ Request::segment(1) === 'register' ? 'navbar-active' : null }} navigation"><a class="nav-link text-center" href="{{ route('register') }}">Register</a></li>
                @else
                @if(Auth::user()->role_id == 3)
                <li class="@yield('createcontests') navigation"><a class="nav-link text-center" href="{{ route('contests.create') }}">Create Contest</a></li>
                @endif
                <li class="nav-item dropdown user-dropdown">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/storage/profile_pics/{{ Auth::user()->profile_pic }}" class="navbar-thumb rounded-circle">  <span class="caret"></span>
                                </a>
                    <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="navbarDropdown">
                        <!-- Dropdown Account Settings -->
                        <div class="dropdown-item ">
                            <div class="row"><img src="/storage/profile_pics/{{ Auth::user()->profile_pic }}" class="navbar-thumb-drop rounded-circle mx-auto d-block"></div>
                            <div class="row ">
                                <lable class="mx-auto d-block">{{ Auth::user()->name }}</lable>
                            </div>
                        <small class="row "><a href="/users/{{ Auth::user()->id }}" class="mx-auto d-block">View Profile</a></small>
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- Account Setings Section -->
                        <h5 class="dropdown-header">My ACCOUNT</h5>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="/dashboard">
                                    <i class="fas fa-chart-line"></i>&nbsp;&nbsp;
                                   Dashboard
                   </a>
                        <a class="dropdown-item " href="#">
                            <i class="fas fa-cog"></i>&nbsp;&nbsp;
                           Edit Account
           </a>
           @if(Auth::user()->role_id == 3)
           <div class="dropdown-divider"></div>
           <a class="dropdown-item " href="{{ route('contests.create') }}">
                <i class="fas fa-images"></i>

&nbsp;&nbsp;
               Create Contest
</a>
@endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;
                                                    Logout
                                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>