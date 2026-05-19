@extends('layouts.master')
@section('title', 'Checkout')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="mb-4">
            <span class="badge bg-warning text-dark px-3 py-2 mb-2">Checkout</span>
            <h1 class="fw-bold">Delivery Details</h1>
            <p class="text-muted">Fill in your information to complete your order.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="bg-white rounded-4 shadow-sm p-4">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="customer_name" class="form-control rounded-3" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control rounded-3" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address" class="form-control rounded-3" rows="4" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Notes</label>
                            <textarea name="notes" class="form-control rounded-3" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-semibold rounded-3">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="bg-white rounded-4 shadow-sm p-4">
                    <h4 class="fw-bold mb-3">Order Items</h4>

                    @php $total = 0; @endphp

                    @foreach ($cartItems as $item)
                        @php
                            $itemTotal = $item->Price * $item->pivot->quantity;
                            $total += $itemTotal;
                        @endphp

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <div>
                                <div class="fw-semibold">{{ $item->Name }}</div>
                                <small class="text-muted">Qty: {{ $item->pivot->quantity }}</small>
                            </div>
                            <div class="fw-semibold">₱{{ number_format($itemTotal, 2) }}</div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between mt-4">
                        <h5 class="fw-bold">Total</h5>
                        <h5 class="fw-bold text-primary">₱{{ number_format($total, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection