<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="{{ route('home') }}">
            <img src="{{ asset('images/pod-talk-logo.png') }}" class="logo-image img-fluid" alt="templatemo pod talk">
        </a>

        <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
            <div class="input-group input-group-lg">
                <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                    aria-label="Search">

                <button type="submit" class="form-control" id="submit">
                    <i class="bi-search"></i>
                </button>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('about') ? 'contact' : '' }}"
                        href="{{ route('contact') }}">Contact</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('list') }}">Listing Page</a></li>

                        <li><a class="dropdown-item" href="{{ route('details') }}">Detail Page</a></li>
                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('dashboard') }}">Hi! {{ Auth::user()['name'] }}</a>
                    </li>
                @endauth

            </ul>

            @auth

                <div class="ms-4">
                    <a href="#" class="btn custom-btn custom-border-btn smoothscroll"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @else
                @if (Route::currentRouteNamed('login'))
                    <div class="ms-4">
                        <a href="{{ route('register') }}"
                            class="btn custom-btn custom-border-btn smoothscroll">Register</a>
                    </div>
                @else
                    <div class="ms-4">
                        <a href="{{ route('login') }}" class="btn custom-btn custom-border-btn smoothscroll">Login</a>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</nav>
