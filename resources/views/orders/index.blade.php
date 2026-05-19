@extends('layouts.master')
@section('title', 'My Orders')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <div class="mb-4">
            <span class="badge bg-warning text-dark px-3 py-2 mb-2">
                Orders
            </span>

            <h1 class="fw-bold">My Orders</h1>

            <p class="text-muted">
                Track your gadget purchases and delivery status.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->count() > 0)

            <div class="bg-white rounded-4 shadow-sm p-4">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($orders as $order)

                                <tr>

                                    <td>
                                        {{ $order->product_name }}
                                    </td>

                                    <td>
                                        {{ $order->quantity }}
                                    </td>

                                    <td>
                                        ₱{{ number_format($order->total_price, 2) }}
                                    </td>

                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ $order->status }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $order->created_at->format('M d, Y') }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @else

            <div class="bg-white rounded-4 shadow-sm p-5 text-center">

                <h3 class="fw-bold">
                    No orders yet
                </h3>

                <p class="text-muted">
                    Your checkout orders will appear here.
                </p>

                <a href="{{ route('products.index') }}"
                   class="btn btn-warning fw-semibold px-4">
                    Shop Now
                </a>

            </div>

        @endif

    </div>
</section>

@endsection