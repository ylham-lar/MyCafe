@extends('client.layouts.app')

@section('title', __('app.yourShoppingCart'))

@section('content')
@php
$locale = app()->getLocale();
$nameField = ($locale === 'en') ? 'name' : 'name_' . $locale;
@endphp

<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-4">
                <span class="header-gold">@lang('app.yourShoppingCart')</span>
            </h1>
            <p class="header-subtitle fs-5">@lang('app.reviewItems')</p>
        </div>

        @if($products->count() > 0)
        <div class="row g-4">
            @php $total = 0; @endphp
            @foreach($products as $product)
            @php
            $discountAmount = ($product->price * $product->discount_percent) / 100;
            $discountedPrice = $product->price - $discountAmount;
            $lineTotal = $discountedPrice * $product->quantity;
            $total += $lineTotal;
            @endphp
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 fade-up">
                <div class="premium-card shadow-lg">
                    <form action="{{ route('client.cart.delete', $product->id) }}" method="POST" class="delete-btn-wrapper">
                        @csrf
                        <button type="submit" class="delete-btn"><i class="bi bi-x-circle"></i></button>
                    </form>

                    @if($product->discount_percent > 0)
                    <div class="discount-badge">-{{ $product->discount_percent }}%</div>
                    @endif

                    <div class="card-image-wrapper">
                        @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-image" alt="{{ $product->name }}">
                        @else
                        <div class="card-image-placeholder">
                            <i class="fas fa-box-open"></i>
                        </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <h5 class="product-title">{{ $product->{$nameField} ?? $product->name }}</h5>
                        <div class="price-section mb-3">
                            @if($product->discount_percent > 0)
                            <p class="original-price">${{ number_format($product->price, 2) }}</p>
                            <p class="discounted-price">${{ number_format($discountedPrice, 2) }}</p>
                            @else
                            <p class="price-tag">${{ number_format($product->price, 2) }}</p>
                            @endif
                        </div>

                        <div class="quantity-wrapper mb-3">
                            <form action="{{ route('client.cart.add', $product->id) }}" method="POST" class="quantity-form" data-product-id="{{ $product->id }}">
                                @csrf
                                <button type="button" class="qty-btn minus-btn" data-product-id="{{ $product->id }}">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" name="quantity" value="{{ $product->quantity }}" min="1" class="qty-input" data-product-id="{{ $product->id }}">
                                <button type="button" class="qty-btn plus-btn" data-product-id="{{ $product->id }}">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </form>
                        </div>

                        <div class="line-total-wrapper">
                            <span class="total-label">@lang('app.total'):</span>
                            <span class="line-total">${{ number_format($lineTotal, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="cart-summary mt-5 fade-in">
            <div class="summary-box">
                <h3 class="summary-title">@lang('app.cartSummary')</h3>
                <div class="summary-row">
                    <span>@lang('app.totalAmount'):</span>
                    <span class="summary-total">${{ number_format($total, 2) }}</span>
                </div>
                <div class="summary-actions">
                    <form action="{{ route('client.cart.clear') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-clear">
                            <i class="fas fa-trash"></i> @lang('app.clearCart')
                        </button>
                    </form>

                    <a href="" class="btn-checkout">
                        @lang('app.proceedCheckout') <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        @else
        <div class="empty-cart text-center py-5 fade-in">
            <div class="empty-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h3 class="empty-title">@lang('app.emptyCartTitle')</h3>
            <p class="empty-text">@lang('app.emptyCartText')</p>
            <a href="{{ route('menu') }}" class="btn-start-shopping">
                <i class="fas fa-store"></i> @lang('app.startShopping')
            </a>
        </div>
        @endif

    </div>
</div>
<style>
    body {
        background: #0a0a0a
    }

    .premium-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border-radius: 20px;
        overflow: hidden;
        transition: all .4s cubic-bezier(.4, 0, .2, 1);
        position: relative;
        border: 1px solid rgba(255, 215, 90, .1);
        height: 100%;
        display: flex;
        flex-direction: column
    }

    .premium-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 215, 90, .05), transparent);
        opacity: 0;
        transition: opacity .4s ease;
        pointer-events: none;
        z-index: 1
    }

    .premium-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(255, 215, 90, .3), 0 0 80px rgba(255, 215, 90, .1);
        border-color: rgba(255, 215, 90, .6)
    }

    .premium-card:hover::before {
        opacity: 1
    }

    .delete-btn-wrapper {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 10
    }

    .delete-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: rgba(255, 71, 87, .9);
        border: none;
        color: white;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: all .3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(255, 71, 87, .4)
    }

    .delete-btn:hover {
        background: #ff4757;
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 6px 20px rgba(255, 71, 87, .6)
    }

    .discount-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: linear-gradient(135deg, #ff4757, #ff6348);
        color: white;
        padding: 6px 14px;
        border-radius: 25px;
        font-size: .85rem;
        font-weight: bold;
        z-index: 10;
        box-shadow: 0 4px 15px rgba(255, 71, 87, .5);
        animation: pulse 2s infinite
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1)
        }

        50% {
            transform: scale(1.05)
        }
    }

    .card-image-wrapper {
        position: relative;
        width: 100%;
        padding-top: 100%;
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        overflow: hidden
    }

    .card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease
    }

    .premium-card:hover .card-image {
        transform: scale(1.1)
    }

    .card-image-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: rgba(255, 215, 90, .2)
    }

    .card-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 2
    }

    .product-title {
        color: #ffd95a;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: .75rem;
        transition: all .3s ease;
        text-align: center
    }

    .premium-card:hover .product-title {
        color: #fff7c2;
        text-shadow: 0 0 15px rgba(255, 215, 90, .8)
    }

    .price-section {
        text-align: center
    }

    .original-price {
        color: rgba(255, 215, 90, .7);
        text-decoration: line-through;
        font-size: .95rem;
        margin-bottom: .25rem
    }

    .discounted-price {
        color: #4ade80;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0
    }

    .price-tag {
        color: #ffd95a;
        font-size: 1.3rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 0
    }

    .quantity-wrapper {
        display: flex;
        justify-content: center
    }

    .quantity-form {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 215, 90, .05);
        padding: 8px;
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, .2)
    }

    .qty-btn {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        background: linear-gradient(135deg, #2a2a2a, #1a1a1a);
        border: 1px solid rgba(255, 215, 90, .3);
        color: #ffd95a;
        cursor: pointer;
        transition: all .3s ease;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .qty-btn:hover {
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        color: #111;
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(255, 215, 90, .4)
    }

    .qty-input {
        width: 50px;
        height: 35px;
        background: #0f0f0f;
        border: 1px solid rgba(255, 215, 90, .3);
        border-radius: 8px;
        color: #ffd95a;
        text-align: center;
        font-weight: 600;
        font-size: 1rem
    }

    .qty-input:focus {
        outline: none;
        border-color: #ffd95a;
        box-shadow: 0 0 10px rgba(255, 215, 90, .3)
    }

    .line-total-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 215, 90, .2)
    }

    .total-label {
        color: rgba(255, 215, 90, .7);
        font-size: .9rem
    }

    .line-total {
        color: #ffd95a;
        font-size: 1.2rem;
        font-weight: 700;
        text-shadow: 0 0 10px rgba(255, 215, 90, .5)
    }

    .cart-summary {
        display: flex;
        justify-content: center
    }

    .summary-box {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        padding: 2.5rem;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 10px 40px rgba(0, 0, 0, .5)
    }

    .summary-title {
        color: #ffd95a;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
        text-shadow: 0 0 20px rgba(255, 215, 90, .5)
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 215, 90, .2);
        color: rgba(255, 215, 90, .8);
        font-size: 1.1rem
    }

    .summary-total {
        color: #ffd95a;
        font-size: 2rem;
        font-weight: 700;
        text-shadow: 0 0 15px rgba(255, 215, 90, .6)
    }

    .summary-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap
    }

    .btn-clear {
        flex: 1;
        min-width: 150px;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #ff4757, #ff6348);
        border: none;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all .3s ease;
        box-shadow: 0 4px 15px rgba(255, 71, 87, .4)
    }

    .btn-clear:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 71, 87, .6)
    }

    .btn-checkout {
        flex: 2;
        min-width: 200px;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        border: none;
        border-radius: 12px;
        color: #111;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        transition: all .3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 90, .4)
    }

    .btn-checkout:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, .6);
        color: #000
    }

    .empty-cart {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .1);
        border-radius: 20px;
        padding: 4rem 2rem
    }

    .empty-icon {
        font-size: 5rem;
        color: rgba(255, 215, 90, .2);
        margin-bottom: 1.5rem
    }

    .empty-title {
        color: #ffd95a;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem
    }

    .empty-text {
        color: rgba(255, 215, 90, .6);
        font-size: 1.1rem;
        margin-bottom: 2rem
    }

    .btn-start-shopping {
        padding: 1rem 2.5rem;
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        border: none;
        border-radius: 12px;
        color: #111;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        transition: all .3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 90, .4)
    }

    .btn-start-shopping:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, .6);
        color: #000
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 30px rgba(255, 215, 90, .6)
    }

    .header-subtitle {
        color: rgba(255, 215, 90, .7);
        font-size: 1.1rem
    }

    .fade-up,
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp .8s ease forwards
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .fade-up:nth-child(1) {
        animation-delay: .1s
    }

    .fade-up:nth-child(2) {
        animation-delay: .2s
    }

    .fade-up:nth-child(3) {
        animation-delay: .3s
    }

    .fade-up:nth-child(4) {
        animation-delay: .4s
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.plus-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const input = document.querySelector(`.qty-input[data-product-id="${productId}"]`);
                input.value = parseInt(input.value) + 1;
                const form = this.closest('form');
                form.submit();
            });
        });

        document.querySelectorAll('.minus-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const input = document.querySelector(`.qty-input[data-product-id="${productId}"]`);
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    const form = this.closest('form');
                    form.submit();
                }
            });
        });
    });
</script>
@endsection