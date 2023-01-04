<nav class="navbar navbar-expand-lg navbar-dark adminnavbar">
    <div class="container container-fluid">
        <a href="/admin/dashboard" class="navbar-brand animated bounce"
            style="animation-iteration-count: infinite;"><span style="font-weight:bold;">HARE</span><span
                class="text-primary" style="font-weight:bold;">K</span><span class="text-primary dotunderletter"
                style="font-weight:bold;">RSN</span><span class="text-primary" style="font-weight:bold;">A</span><span
                style="font-weight:bold;">BLISS</span>&nbsp;
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('admin.login'))
                @auth
                <li class="nav-item text-light" style="font-size: 1.2em; margin: 12px 10px 0 0">
                    <em>Welcome {{ Auth::guard('admin')->user()->name }}!</em>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                        <button class="btn btn-light btn-sm">DASHBOARD</button>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <button class="btn btn-danger btn-sm">LOGOUT</button>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                        <button class="btn btn-light btn-sm">DASHBOARD</button>
                    </a>
                </li>
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>