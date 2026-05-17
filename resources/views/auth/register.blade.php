@extends('layouts.master')
@section('title', 'Register')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <div class="row justify-content-center align-items-center g-5">

            <div class="col-lg-5">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    Create Account
                </span>

                <h1 class="fw-bold display-5 mb-3">
                    Join GadgetPro
                </h1>

                <p class="text-muted fs-5">
                    Create your customer account and enjoy a modern gadget shopping experience.
                </p>

                <div class="bg-white rounded-4 shadow-sm p-4 mt-4">

                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-bolt text-primary fs-3 me-3"></i>

                        <div>
                            <h5 class="fw-bold mb-0">Fast Shopping</h5>
                            <small class="text-muted">
                                Add gadgets to your cart quickly.
                            </small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-lock text-primary fs-3 me-3"></i>

                        <div>
                            <h5 class="fw-bold mb-0">Secure Account</h5>
                            <small class="text-muted">
                                Your information stays protected.
                            </small>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="bg-white rounded-4 shadow-sm p-5">

                    <h3 class="fw-bold mb-1">Register</h3>

                    <p class="text-muted mb-4">
                        Fill in your information below.
                    </p>

                    @if ($errors)
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <i class="fa-solid fa-triangle-exclamation me-2"></i>

                                {{ $err }}

                                <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                                </button>

                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input type="text"
                                class="form-control form-control-lg rounded-3"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter full name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input type="email"
                                class="form-control form-control-lg rounded-3"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="example@email.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <input type="password"
                                class="form-control form-control-lg rounded-3"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Enter password">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Confirm Password
                            </label>

                            <input type="password"
                                class="form-control form-control-lg rounded-3"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm password">
                        </div>

                        <button class="btn btn-warning btn-lg w-100 fw-semibold rounded-3">
                            Create Account
                        </button>

                        <p class="text-center text-muted mt-4 mb-0">
                            Already registered?
                            <a href="{{ route('login') }}"
                                class="fw-semibold text-decoration-none">

                                Login here

                            </a>
                        </p>

                    </form>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection