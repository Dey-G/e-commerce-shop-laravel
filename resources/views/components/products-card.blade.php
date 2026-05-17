@props(['product'])

<div class="col-xl-3 col-lg-4 col-md-6">
    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card">

            <div class="bg-light text-center p-3" style="height: 220px;">
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

<style>
    .product-card {
        transition: all 0.25s ease;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.18) !important;
    }
</style>