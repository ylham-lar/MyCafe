@extends('client.layouts.app')

@section('title', $product->name)

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-5">
                <span class="header-gold">{{ $product->name }}</span>
            </h1>
            <p class="header-subtitle fs-5">Check out the details and customize your order.</p>
        </div>

        <div class="row g-4 justify-content-center align-items-center">

            <div class="col-md-4 col-lg-3 fade-up">
                <div class="product-image-wrapper position-relative text-center">
                    <a data-fancybox="gallery" href="{{ asset('img/Pizza.jpg') }}">
                        <img src="{{ asset('img/Pizza.jpg') }}" class="img-fluid product-image" alt="{{ $product->name }}">
                    </a>
                    @if($product->discount_percent > 0)
                    <div class="position-absolute top-0 end-0 m-3 badge bg-warning text-dark fw-bold product-badge-glow">
                        -{{ $product->discount_percent }}%
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-4 col-lg-3 d-flex flex-column justify-content-center text-center fade-up">
                <h2 class="fw-bold text-warning product-title">{{ $product->name }}</h2>
                <p class="text-gold-fade product-category">{{ $product->category->name ?? 'Uncategorized' }}</p>

                @php
                $originalPrice = $product->price;
                $discountPercent = $product->discount_percent ?? 0;
                $discountAmount = ($originalPrice * $discountPercent) / 100;
                $finalPrice = $originalPrice - $discountAmount;
                @endphp

                <h4 class="mt-3 product-price-section">
                    @if($discountPercent > 0)
                    <span class="h6 text-danger price-label">Original:</span>
                    <span class="text-danger text-decoration-line-through h6">${{ number_format($originalPrice,2) }}</span><br>
                    <span class="text-danger h6 fw-bold discount-text">Discount: {{ $discountPercent }}%</span><br>
                    <span class="text-warning h4 fw-bold final-price-text">${{ number_format($finalPrice,2) }}</span>
                    @else
                    <span class="text-warning h4 fw-bold">${{ number_format($originalPrice,2) }}</span>
                    @endif
                </h4>

                <p class="mt-4 text-gold-fade h5 fw-bold product-description">{{ $product->description }}</p>
            </div>

            <div class="col-md-4 col-lg-3 fade-up">
                <div class="mt-4 text-center">
                    <form action="{{ route('client.cart.add', $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center mb-4 quantity-control">
                            <span class="text-gold-fade h6 fw-bold me-3">Quantity:</span>
                            <div class="input-group quantity-modifier" style="width: 130px;">
                                <button type="button" class="btn quantity-btn minus-btn border-warning">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="form-control text-center quantity-input">
                                <button type="button" class="btn quantity-btn plus-btn border-warning">+</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-glow"><i class="fas fa-shopping-cart me-2"></i> Add to Cart</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .product-image-wrapper {
        padding: 12px;
        background: linear-gradient(180deg, #1a1a1a, #222, #2a2a2a);
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.45);
        transition: all 0.3s ease;
    }

    .product-image-wrapper:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 0 20px rgba(255, 215, 90, 0.45);
    }

    .product-image {
        max-height: 300px;
        object-fit: contain;
        border-radius: 50%;
        display: block;
        margin: 0 auto;
    }

    .product-title {
        color: #ffd95a;
        text-shadow: 0 0 12px rgba(255, 215, 90, 0.8);
    }

    .text-gold-fade {
        color: rgba(255, 215, 90, 0.75);
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .final-price-text {
        color: #fff7c2;
        text-shadow: 0 0 10px rgba(255, 215, 90, 0.7);
    }

    .text-danger {
        text-shadow: 0 0 6px rgba(255, 0, 0, 0.5);
    }

    .product-badge-glow {
        box-shadow: 0 0 8px rgba(255, 215, 90, 0.7);
    }

    .btn-glow {
        background: #ffd95a;
        color: #1a1a1a;
        transition: all 0.3s ease;
        box-shadow: 0 0 12px rgba(255, 215, 90, 0.6);
        padding: 12px 40px;
        border-radius: 8px;
        font-weight: 700;
    }

    .btn-glow:hover {
        box-shadow: 0 0 25px rgba(255, 215, 90, 0.85);
        transform: translateY(-2px) scale(1.02);
        color: #1a1a1a;
    }

    .quantity-btn {
        padding: .5rem .8rem;
        background-color: #333 !important;
        color: #ffd95a !important;
        border: 1px solid #ffd95a !important;
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        background-color: #ffd95a !important;
        color: #1a1a1a !important;
    }

    .quantity-input {
        background-color: #1b1c1f !important;
        color: #fff !important;
        border-top: 1px solid #ffd95a !important;
        border-bottom: 1px solid #ffd95a !important;
        border-left: none !important;
        border-right: none !important;
        transition: all 0.3s ease;
    }

    .quantity-input:focus {
        box-shadow: 0 0 8px rgba(255, 215, 90, 0.6) !important;
        background-color: #2c2c2c !important;
    }

    .fade-up,
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const quantityControl = document.querySelector(".quantity-control");
        if (quantityControl) {
            const minusBtn = quantityControl.querySelector(".minus-btn");
            const plusBtn = quantityControl.querySelector(".plus-btn");
            const quantityInput = quantityControl.querySelector(".quantity-input");

            minusBtn.addEventListener("click", () => {
                let value = parseInt(quantityInput.value);
                if (value > 1) quantityInput.value = value - 1;
            });
            plusBtn.addEventListener("click", () => {
                let value = parseInt(quantityInput.value);
                quantityInput.value = value + 1;
            });
        }

        const elements = document.querySelectorAll(".fade-up, .fade-in");
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }
            });
        }, {
            threshold: 0.2
        });
        elements.forEach(el => observer.observe(el));
    });
</script>
@endsection