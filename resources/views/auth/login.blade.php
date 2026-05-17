@extends('layouts.master')
@section('title', 'Login')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <div class="row justify-content-center align-items-center g-5">

            <div class="col-lg-5">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">Customer Login</span>
                <h1 class="fw-bold display-5 mb-3">Welcome Back</h1>
                <p class="text-muted fs-5">
                    Login to continue shopping, manage your cart, and track your gadget orders.
                </p>

                <div class="bg-white rounded-4 shadow-sm p-4 mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-shield-halved text-primary fs-3 me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Secure Customer Account</h5>
                            <small class="text-muted">Your shopping information is protected.</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-cart-shopping text-primary fs-3 me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Easy Checkout</h5>
                            <small class="text-muted">Access your cart anytime after login.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="bg-white rounded-4 shadow-sm p-5">

                    <h3 class="fw-bold mb-1">Login</h3>
                    <p class="text-muted mb-4">Enter your account details below.</p>

                    @if ($errors)
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                {{ $err }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email"
                                class="form-control form-control-lg rounded-3"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="example@email.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password"
                                class="form-control form-control-lg rounded-3"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                                <label class="form-check-label" for="remember_me">
                                    Remember me
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold rounded-3">
                            Login
                        </button>

                        <p class="text-center text-muted mt-4 mb-0">
                            No account yet?
                            <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">
                                Register here
                            </a>
                        </p>
                    </form>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection