@extends('layouts.master')
@section('title', 'Products')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">Gadget Catalog</span>
            <h1 class="fw-bold display-5">Explore Our Products</h1>
            <p class="text-muted">Find smartphones, laptops, accessories, and gaming devices.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3">
                <div class="bg-white rounded-4 shadow-sm p-4 sticky-top" style="top: 95px;">
                    <h5 class="fw-bold mb-3">Filter Products</h5>

                    <form action="{{ route('products.index') }}" method="GET">

                        <div class="mb-3">
                            <label for="search" class="form-label fw-semibold">Search</label>
                            <input type="text" name="search" id="search" class="form-control rounded-3"
                                placeholder="Search gadget..." value="{{ request('search') }}">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold">Category</label>
                            <input type="text" name="category" id="category" class="form-control rounded-3"
                                placeholder="Laptop, Phone..." value="{{ request('category') }}">
                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label fw-semibold">Brand</label>
                            <input type="text" name="brand" id="brand" class="form-control rounded-3"
                                placeholder="Apple, Samsung..." value="{{ request('brand') }}">
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="min_price" class="form-label fw-semibold">Min</label>
                                <input type="number" name="min_price" id="min_price" class="form-control rounded-3"
                                    value="{{ request('min_price') }}">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="max_price" class="form-label fw-semibold">Max</label>
                                <input type="number" name="max_price" id="max_price" class="form-control rounded-3"
                                    value="{{ request('max_price') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-3 fw-semibold mb-2">
                            Filter
                        </button>

                        <a class="btn btn-outline-secondary w-100 rounded-3"
                            href="{{ route('products.index') }}">
                            Reset
                        </a>

                    </form>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">

                    @forelse ($products as $product)
                        <div class="col-xl-4 col-md-6">
                            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card">

                                    <div class="bg-white text-center p-3" style="height: 220px;">
                                        <img src="{{ $product->Thumbnail }}"
                                            class="img-fluid h-100"
                                            style="object-fit: contain;"
                                            alt="{{ $product->Name }}">
                                    </div>

                                    <div class="card-body p-4">
                                        <span class="badge bg-primary mb-2">Gadget</span>

                                        <h5 class="fw-bold mb-2">
                                            {{ $product->Name }}
                                        </h5>

                                        <p class="text-muted small mb-3">
                                            {{ \Illuminate\Support\Str::limit($product->Description, 70, '...') }}
                                        </p>

                                        <div class="mb-3">
                                            <x-rating-stars :rating="$product->Rating" />
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="fw-bold text-primary mb-0">
                                                ₱{{ number_format($product->Price, 2) }}
                                            </h5>

                                            <span class="btn btn-warning btn-sm fw-semibold">
                                                View
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="bg-white rounded-4 shadow-sm p-5 text-center">
                                <h4 class="fw-bold">No products found</h4>
                                <p class="text-muted">Try adjusting your search or filters.</p>
                                <a href="{{ route('products.index') }}" class="btn btn-warning fw-semibold">
                                    Reset Filters
                                </a>
                            </div>
                        </div>
                    @endforelse

                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $products->onEachSide(0)->links() }}
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .product-card {
        transition: all 0.25s ease;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.18) !important;
    }
</style>

@endsection