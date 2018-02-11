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
                <li class="{{ Request::segment(1) === 'contests' ? 'navbar-active' : null }}"><a class="nav-link text-center" href="#">Photo Contests</a></li>
                <li class="{{ Request::segment(1) === 'photos' ? 'navbar-active' : null }}"><a class="nav-link text-center" href="#">Photos</a></li>
                <li class="{{ Request::segment(1) === 'vote' ? 'navbar-active' : null }}"><a class="nav-link text-center" href="#">Vote</a></li>
                <li class="{{ Request::segment(1) === 'about' ? 'navbar-active' : null }}"><a class="nav-link text-center" href="#">About Us</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="{{ Request::segment(1) === 'login' ? 'navbar-active' : null }}"><a class="nav-link text-center" href="{{ route('login') }}">LogIn</a></li>
                <li class="{{ Request::segment(1) === 'register' ? 'navbar-active' : null }}"><a class="nav-link text-center" href="{{ route('register') }}">Register</a></li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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