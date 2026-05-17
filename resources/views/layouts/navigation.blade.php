<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background:#0f172a;">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="/">
            Gadget<span class="text-warning">Pro</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#customerNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="customerNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active text-warning' : '' }}" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products*') ? 'active text-warning' : '' }}" href="/products">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/#featured">Deals</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/#about">About</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <a href="/cart" class="btn btn-outline-warning btn-sm">
                    Cart
                </a>

                @auth
                    <div class="dropdown">
                        <button class="btn btn-warning btn-sm dropdown-toggle fw-semibold" type="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">My Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/orders">My Orders</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-sm fw-semibold">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>