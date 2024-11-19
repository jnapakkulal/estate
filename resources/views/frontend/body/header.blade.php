<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="{{ asset('frontend/img/logo.png') }}" alt=""> -->
            <h1 class="sitename">Estate<span>Agency</span></h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('properties') }}">Properties</a></li>
                <li><a href="{{ route('agents') }}">Agents</a></li>
                <!--<li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        -<li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        
                    </ul>
                </li>-->
                <li><a href="{{ route('contacts') }}">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                        {{-- <li><a href="{{url('/dashboard')}}">Dashboard</a></li> --}}
                        @if (auth()->user()->role === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <!-- @if (Route::has('register'))
    -->
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <!--
    @endif-->
                    @endauth
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
