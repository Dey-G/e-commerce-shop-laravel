<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background:#0f172a;">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold fs-3" href="/">
            Gadget<span class="text-warning">Pro</span>
        </a>

        <!-- MOBILE BUTTON -->
        <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- NAVBAR -->
        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- CENTER MENU -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">

                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold"
                        href="{{ route('home.index') }}">

                        <i class="fa-solid fa-house me-1"></i>
                        Home

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold"
                        href="{{ route('products.index') }}">

                        <i class="fa-solid fa-store me-1"></i>
                        Products

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold"
                        href="{{ route('home.about') }}">

                        <i class="fa-solid fa-circle-info me-1"></i>
                        About

                    </a>
                </li>

                @auth

                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold"
                        href="{{ route('cart.index') }}">

                        <i class="fa-solid fa-cart-shopping me-1"></i>
                        Cart

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold"
                        href="{{ route('orders.index') }}">

                        <i class="fa-solid fa-bag-shopping me-1"></i>
                        My Orders

                    </a>
                </li>

                @endauth

            </ul>

            <!-- RIGHT SIDE -->
            <div class="d-flex align-items-center gap-2">

                @guest

                    <a href="{{ route('login') }}"
                        class="btn btn-outline-light px-4">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                        class="btn btn-warning fw-semibold px-4">

                        Register

                    </a>

                @endguest

                @auth

                    <div class="dropdown">

                        <button class="btn btn-warning dropdown-toggle fw-semibold"
                            data-bs-toggle="dropdown">

                            <i class="fa-solid fa-user me-1"></i>
                            {{ Auth::user()->name }}

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('profile.edit') }}">

                                    My Profile

                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST"
                                    action="{{ route('logout') }}">

                                    @csrf

                                    <button type="submit"
                                        class="dropdown-item text-danger">

                                        Logout

                                    </button>

                                </form>
                            </li>

                        </ul>

                    </div>

                @endauth

            </div>

        </div>

    </div>
</nav>