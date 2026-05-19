@extends('layouts.master')
@section('title', 'Cart')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <div class="mb-4">
            <span class="badge bg-warning text-dark px-3 py-2 mb-2">Shopping Cart</span>
            <h1 class="fw-bold">Your Cart</h1>
            <p class="text-muted">Review your selected gadgets before checkout.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger rounded-3">
                {{ session('error') }}
            </div>
        @endif

        @auth
            @php
                $total = 0;
                foreach ($cartItems as $item) {
                    $total += $item->Price * $item->pivot->quantity;
                }
            @endphp

            @if ($cartItems->count() > 0)
                <div class="row g-4">

                    <div class="col-lg-8">
                        <div class="bg-white rounded-4 shadow-sm p-4">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <x-cart-items :item="$item" />
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white rounded-4 shadow-sm p-4 sticky-top" style="top: 95px;">
                            <h4 class="fw-bold mb-3">Order Summary</h4>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-semibold">₱{{ number_format($total, 2) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping</span>
                                <span class="fw-semibold">To be confirmed</span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold text-primary fs-5">₱{{ number_format($total, 2) }}</span>
                            </div>

                            <form action="{{ route('cart.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning w-100 fw-semibold rounded-3 mb-2">
                                    Proceed to Checkout
                                </button>
                            </form>

                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100 rounded-3">
                                Continue Shopping
                            </a>
                        </div>
                    </div>

                </div>
            @else
                <div class="bg-white rounded-4 shadow-sm p-5 text-center">
                    <h3 class="fw-bold">Your cart is empty</h3>
                    <p class="text-muted">Start browsing gadgets and add your favorite products.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-warning fw-semibold px-4">
                        Continue Shopping
                    </a>
                </div>
            @endif
        @else
            <div class="bg-white rounded-4 shadow-sm p-5 text-center">
                <h3 class="fw-bold">Login required</h3>
                <p class="text-muted">Please login to view your cart.</p>
                <a href="{{ route('login') }}" class="btn btn-warning fw-semibold px-4">
                    Login
                </a>
            </div>
        @endauth

    </div>
</section>

@endsection