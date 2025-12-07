@extends('client.layouts.app')

@section('title', $product->name)

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-4">
                <span class="header-gold">{{ $product->name }}</span>
            </h1>
            <p class="header-subtitle fs-5">Check out the details and customize your order</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5 fade-up">
                <div class="product-card">
                    @if($product->discount_percent > 0)
                    <div class="discount-badge">-{{ $product->discount_percent }}%</div>
                    @endif

                    <button
                        class="favorite-btn"
                        data-id="{{ $product->id }}"
                        title="@if($product->is_favorite) Remove from Favorites @else Add to Favorites @endif"
                        aria-label="@if($product->is_favorite) Remove product from favorites @else Add product to favorites @endif">
                        <i class="fas fa-heart @if($product->is_favorite) text-danger @else text-secondary @endif"></i>
                    </button>

                    <div class="product-image-wrapper">
                        <a data-fancybox="gallery" href="{{ asset('storage/'.$product->image) }}">
                            @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="product-image" alt="{{ $product->name }}">
                            @else
                            <div class="product-image-placeholder">
                                <i class="fas fa-box-open"></i>
                            </div>
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 fade-up">
                <div class="product-details-card">
                    <div class="product-header mb-4">
                        <h2 class="product-title mb-2">{{ $product->name }}</h2>
                        <p class="product-category">
                            <i class="fas fa-tag me-2"></i>{{ $product->category->name ?? 'Uncategorized' }}
                        </p>
                    </div>

                    {{-- **THIS IS THE CORRECTED SECTION (LINE 54 IS HERE)** --}}
                    @php
                    $originalPrice = $product->price;
                    $discountPercent = $product->discount_percent ?? 0;
                    $discountAmount = ($originalPrice * $discountPercent) / 100;
                    $finalPrice = $originalPrice - $discountAmount;
                    @endphp

                    <div class="price-section mb-4">
                        @if($discountPercent > 0)
                        <div class="price-row mb-2">
                            <span class="price-label">Original Price:</span>
                            <span class="original-price">${{ number_format($originalPrice, 2) }}</span>
                        </div>
                        <div class="price-row mb-2">
                            <span class="price-label">Discount:</span>
                            <span class="discount-amount">{{ $discountPercent }}% OFF</span>
                        </div>
                        <div class="price-divider"></div>
                        <div class="price-row final-price-row">
                            <span class="price-label">Final Price:</span>
                            <span class="final-price">${{ number_format($finalPrice, 2) }}</span>
                        </div>
                        <div class="savings-badge">
                            You save: ${{ number_format($discountAmount, 2) }}
                        </div>
                        @else
                        <div class="price-row final-price-row">
                            <span class="price-label">Price:</span>
                            <span class="final-price">${{ number_format($originalPrice, 2) }}</span>
                        </div>
                        @endif
                    </div>

                    @if($product->description)
                    <div class="product-description mb-4">
                        <h5 class="description-title">
                            <i class="fas fa-info-circle me-2"></i>Description
                        </h5>
                        <p class="description-text">{{ $product->description }}</p>
                    </div>
                    @endif

                    <div class="add-to-cart-section">
                        <form action="{{ route('client.cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="quantity-wrapper mb-4">
                                <label class="quantity-label">Quantity:</label>
                                <div class="quantity-control">
                                    <button type="button" class="qty-btn minus-btn">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" name="quantity" value="1" min="1" class="qty-input">
                                    <button type="button" class="qty-btn plus-btn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn-add-to-cart">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    body {
        background: #0a0a0a;
    }

    .favorite-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 10;
        background: rgba(26, 26, 26, 0.9);
        border: 2px solid rgba(255, 215, 90, 0.4);
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
    }

    .favorite-btn:hover {
        background: rgba(255, 215, 90, 0.1);
        border-color: #ffd95a;
        transform: scale(1.1);
    }

    .favorite-btn i {
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }

    .text-danger {
        color: #ff4757;
    }

    .text-secondary {
        color: rgba(255, 215, 90, 0.5);
    }

    .product-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(255, 215, 90, 0.1);
        position: relative;
        height: 100%;
    }

    .discount-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, #ff4757, #ff6348);
        color: white;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: bold;
        z-index: 10;
        box-shadow: 0 4px 15px rgba(255, 71, 87, 0.5);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .product-image-wrapper {
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 400px;
    }

    .product-image {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
        border-radius: 15px;
        transition: transform 0.5s ease;
    }

    .product-image:hover {
        transform: scale(1.05);
    }

    .product-image-placeholder {
        width: 300px;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: rgba(255, 215, 90, 0.2);
    }

    .product-details-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border-radius: 20px;
        border: 1px solid rgba(255, 215, 90, 0.1);
        padding: 2.5rem;
        height: 100%;
    }

    .product-header {
        border-bottom: 1px solid rgba(255, 215, 90, 0.2);
        padding-bottom: 1.5rem;
    }

    .product-title {
        color: #ffd95a;
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 0 20px rgba(255, 215, 90, 0.6);
    }

    .product-category {
        color: rgba(255, 215, 90, 0.7);
        font-size: 1.1rem;
        margin: 0;
    }

    .price-section {
        background: rgba(255, 215, 90, 0.05);
        border: 1px solid rgba(255, 215, 90, 0.2);
        border-radius: 15px;
        padding: 1.5rem;
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .price-label {
        color: rgba(255, 215, 90, 0.7);
        font-size: 1rem;
        font-weight: 600;
    }

    .original-price {
        color: rgba(255, 215, 90, 0.6);
        text-decoration: line-through;
        font-size: 1.1rem;
    }

    .discount-amount {
        color: #ff4757;
        font-size: 1.1rem;
        font-weight: 700;
    }

    .price-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 90, 0.3), transparent);
        margin: 1rem 0;
    }

    .final-price-row {
        margin-bottom: 0;
    }

    .final-price {
        color: #ffd95a;
        font-size: 2rem;
        font-weight: 700;
        text-shadow: 0 0 15px rgba(255, 215, 90, 0.6);
    }

    .savings-badge {
        background: linear-gradient(135deg, #4ade80, #22c55e);
        color: white;
        text-align: center;
        padding: 0.75rem;
        border-radius: 10px;
        margin-top: 1rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(74, 222, 128, 0.3);
    }

    .product-description {
        background: rgba(255, 215, 90, 0.03);
        border-left: 3px solid #ffd95a;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .description-title {
        color: #ffd95a;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .description-text {
        color: rgba(255, 215, 90, 0.8);
        line-height: 1.8;
        margin: 0;
    }

    .add-to-cart-section {
        border-top: 1px solid rgba(255, 215, 90, 0.2);
        padding-top: 1.5rem;
    }

    .quantity-wrapper {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .quantity-label {
        color: rgba(255, 215, 90, 0.8);
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 215, 90, 0.05);
        padding: 0.5rem;
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, 0.2);
    }

    .qty-btn {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: linear-gradient(135deg, #2a2a2a, #1a1a1a);
        border: 1px solid rgba(255, 215, 90, 0.3);
        color: #ffd95a;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-btn:hover {
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        color: #111;
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(255, 215, 90, 0.4);
    }

    .qty-input {
        width: 70px;
        height: 40px;
        background: #0f0f0f;
        border: 1px solid rgba(255, 215, 90, 0.3);
        border-radius: 8px;
        color: #ffd95a;
        text-align: center;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .qty-input:focus {
        outline: none;
        border-color: #ffd95a;
        box-shadow: 0 0 10px rgba(255, 215, 90, 0.3);
    }

    .btn-add-to-cart {
        width: 100%;
        padding: 1.2rem 2rem;
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        border: none;
        border-radius: 12px;
        color: #111;
        font-weight: 700;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 90, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-add-to-cart:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, 0.6);
        background: linear-gradient(135deg, #ffed4e, #ffd95a);
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 30px rgba(255, 215, 90, 0.6);
    }

    .header-subtitle {
        color: rgba(255, 215, 90, 0.7);
        font-size: 1.1rem;
    }

    .fade-up,
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 0.8s ease forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-up:nth-child(1) {
        animation-delay: 0.1s;
    }

    .fade-up:nth-child(2) {
        animation-delay: 0.2s;
    }

    @media (max-width: 991px) {
        .product-details-card {
            margin-top: 2rem;
        }

        .product-title {
            font-size: 1.6rem;
        }

        .final-price {
            font-size: 1.6rem;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const minusBtn = document.querySelector(".minus-btn");
        const plusBtn = document.querySelector(".plus-btn");
        const quantityInput = document.querySelector(".qty-input");

        if (minusBtn && plusBtn && quantityInput) {
            minusBtn.addEventListener("click", () => {
                let value = parseInt(quantityInput.value);
                if (value > 1) quantityInput.value = value - 1;
            });

            plusBtn.addEventListener("click", () => {
                let value = parseInt(quantityInput.value);
                quantityInput.value = value + 1;
            });
        }

        // Intersection Observer for fade-in animations
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
<script>
    document.querySelector('.favorite-btn').addEventListener('click', function() {
        let button = this;
        let id = button.dataset.id;

        fetch("/favorite/toggle/" + id, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(res => res.json())
            .then(data => {

                let icon = button.querySelector('i');

                if (data.status === 'added') {
                    icon.classList.remove('text-secondary');
                    icon.classList.add('text-danger');
                    button.setAttribute('title', 'Remove from Favorites');
                    button.setAttribute('aria-label', 'Remove product from favorites');
                } else {
                    icon.classList.remove('text-danger');
                    icon.classList.add('text-secondary');
                    button.setAttribute('title', 'Add to Favorites');
                    button.setAttribute('aria-label', 'Add product to favorites');
                }
            });
    });
</script>

@endsection