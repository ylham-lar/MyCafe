<!-- @extends('client.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-warning fw-bold text-center">Our Menu</h2>

    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ route('client.products.show', $product->id) }}" class="text-decoration-none">
                <div class="card shadow-lg border-0 h-100 bg-dark text-light product-card">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                        <p class="text-warning mb-1">${{ number_format($product->price, 2) }}</p>
                        <small class="text-secondary">{{ $product->description }}</small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<style>
    .product-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 0.5rem 1rem rgba(244, 208, 63, 0.6);
    }

    .product-card .card-title {
        transition: color 0.2s, text-shadow 0.2s;
    }

    .product-card:hover .card-title {
        color: #fff3cd;
        text-shadow: 0 0 6px #fff3cd;
    }

    .product-card p {
        transition: color 0.2s;
    }

    .product-card:hover p {
        color: #fff3cd;
    }
</style>
@endsection -->