<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container container-fluid">
        <a href="/" class="navbar-brand animated bounce logo" style="animation-iteration-count: infinite;"><span
                style="font-weight:bold;">HARE</span><span class="text-primary" style="font-weight:bold;">K</span><span
                class="text-primary dotunderletter" style="font-weight:bold;">RSN</span><span class="text-primary"
                style="font-weight:bold;">A</span><span style="font-weight:bold;">BLISS</span>&nbsp;
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::segment(1) === null ? 'active' : null }}" id="#home">
                    <a href="/" class="nav-link">Home</a>
                </li>

                <li class="nav-item {{ Request::segment(1) === 'blogs' ? 'active' : null }}">
                    <a href="{{ url('blogs') }}" class="nav-link">Blogs</a>
                </li>

                <li class="nav-item {{ Request::segment(1) === 'darshans' ? 'active' : null }}">
                    <a href="{{ url('/darshans') }}" class="nav-link">Divine Darshans</a>
                </li>

                <li class="nav-item {{ Request::segment(1) === 'sankirtans' ? 'active' : null }}">
                    <a href="{{ url('/sankirtans') }}" class="nav-link">Sankirtans</a>
                </li>

                <li class="nav-item {{ Request::segment(1) === 'shop' ? 'active' : null }}">
                    <a href="{{ url('/shop') }}" class="nav-link">Shop</a>
                </li>

                @if (Route::has('login'))
                @auth
                <li class="nav-item {{ Request::segment(1) === 'cart' ? 'active' : null }}">
                    <a href="{{ url('/cart') }}" class="nav-link">Cart</a>
                </li>

                <li class="nav-item dropdown ml-2 {{ Request::segment(1) === 'profile' ? 'active' : null }}">
                    <a class="nav-link dropdown-toggle text-dark btn btn-light btn-sm" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ url('dashboard') }}" class="nav-link text-dark">My Orders</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="nav-link btn btn-danger btn-sm m-2 text-light">Logout</a>
                    </div>
                </li>

                @else
                <li class="nav-item dropdown {{ Request::segment(1) === 'login' ? 'active' : null }}">
                    <a class="nav-link dropdown-toggle text-light btn btn-success btn-sm mx-3" href="#"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('login') }}" class="nav-link text-dark">User</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.login') }}" class="nav-link text-dark">Admin</a>
                    </div>
                </li>

                @if (Route::has('register'))
                <li class="nav-item {{ Request::segment(1) === 'register' ? 'active' : null }}">
                    <a href="{{ route('register') }}" class="nav-link btn text-light btn-primary btn-sm">Register</a>
                </li>
                @endif

                {{-- <li class="nav-item {{ Request::segment(1) === 'donate' ? 'active' : null }}">
                    <button type="button" class="btn btn-warning btn-sm mt-1 ml-2 text-white donateBtn">DONATE</button>
                </li> --}}
                @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>