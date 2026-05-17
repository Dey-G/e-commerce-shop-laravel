@extends('layouts.master')

@section('title', 'GadgetPro | Home')

@section('content')

<section class="py-5" style="background: linear-gradient(135deg, #0f172a, #1d4ed8);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-white">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2">New Gadgets Available</span>
                <h1 class="display-4 fw-bold mb-3">Upgrade Your Tech Lifestyle</h1>
                <p class="lead mb-4">
                    Shop the latest smartphones, laptops, accessories, and gaming devices with fast checkout and reliable service.
                </p>
                <div class="d-flex gap-3">
                    <a href="/products" class="btn btn-warning btn-lg fw-semibold">Shop Now</a>
                    <a href="#featured" class="btn btn-outline-light btn-lg">View Deals</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div id="heroCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/black_friday_web_banner_18.png') }}" class="d-block w-100" alt="Gadget promo">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Black-Friday-Web-Banner-11.png') }}" class="d-block w-100" alt="Tech sale">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/SAM 32 5300 TV SMART.jpg') }}" class="d-block w-100" alt="Smart device">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <h3 class="fw-bold text-primary">100%</h3>
                    <p class="mb-0">Quality Gadgets</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <h3 class="fw-bold text-primary">24/7</h3>
                    <p class="mb-0">Online Ordering</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <h3 class="fw-bold text-primary">Fast</h3>
                    <p class="mb-0">Checkout Process</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <h3 class="fw-bold text-primary">Secure</h3>
                    <p class="mb-0">Customer Account</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="featured" class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Latest Gadget Listings</h2>
                <p class="text-muted mb-0">Fresh tech products added for customers.</p>
            </div>
            <a href="/products" class="btn btn-outline-primary">View All</a>
        </div>

        <div class="row g-4">
            @foreach ($latestLisings as $listing)
                <x-products-card :product="$listing" />
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 text-white" style="background: #0f172a;">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Best Selling Products</h2>
                <p class="text-white-50">
                    Discover the most purchased gadgets this month, selected by our customers.
                </p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a href="/products" class="btn btn-warning btn-lg">Browse Products</a>
            </div>
        </div>

        <div class="row g-4 mt-3">
            @foreach ($bestSellings as $product)
                <x-products-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose GadgetPro?</h2>
            <p class="text-muted">A customer-focused online gadget shopping experience.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <h4 class="fw-bold">Modern Product Catalog</h4>
                    <p class="text-muted mb-0">Customers can browse gadgets with product details, prices, and availability.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <h4 class="fw-bold">Easy Cart System</h4>
                    <p class="text-muted mb-0">Add products to cart, review items, and proceed to checkout smoothly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <h4 class="fw-bold">Customer Account</h4>
                    <p class="text-muted mb-0">Registered customers can manage their profile and orders securely.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection