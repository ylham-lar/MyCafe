@extends('client.layouts.app')

@section('title', __('app.yourFavorites'))

@section('content')
@php
$locale = app()->getLocale();
$nameField = ($locale === 'en') ? 'name' : 'name_' . $locale;
@endphp
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-4">
                <span class="header-gold">@lang('app.myFavorite')</span> @lang('app.products')
            </h1>
            <p class="header-subtitle fs-5">
                @lang('app.itemsSavedForLater')
            </p>
        </div>

        @if($favorites->count() > 0)
        <div class="row g-4">

            @foreach($favorites as $favorite)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 fade-up">
                <div class="premium-card shadow-lg">

                    <form action="{{ route('client.favorites.destroy', $favorite->id) }}" method="POST" class="delete-btn-wrapper">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" title="@lang('app.removeFromFavorites')"><i class="bi bi-x-circle"></i></button>
                    </form>

                    @if(isset($favorite->product->discount_percent) && $favorite->product->discount_percent > 0)
                    <div class="discount-badge">-{{ $favorite->product->discount_percent }}%</div>
                    @endif

                    <div class="card-image-wrapper">
                        @if($favorite->product->image ?? false)
                        <img src="{{ asset('storage/'.$favorite->product->image) }}" class="card-image" alt="{{ $favorite->product->name ?? __('app.product') }}">
                        @else
                        <div class="card-image-placeholder">
                            <i class="fas fa-heart"></i>
                        </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <h5 class="product-title text-center">{{ $favorite->product->{$nameField} ?? $product->name ?? __('app.productNotFound') }}</h5>

                        <div class="price-section mb-3">
                            @php
                            $price = $favorite->product->price ?? 0;
                            $discount_percent = $favorite->product->discount_percent ?? 0;
                            $discountAmount = ($price * $discount_percent) / 100;
                            $discountedPrice = $price - $discountAmount;
                            @endphp

                            @if($discount_percent > 0)
                            <p class="original-price">${{ number_format($price, 2) }}</p>
                            <p class="discounted-price">${{ number_format($discountedPrice, 2) }}</p>
                            @else
                            <p class="price-tag">${{ number_format($price, 2) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="cart-summary mt-5 fade-in">
            <div class="summary-box p-4" style="max-width: 400px;">
                <h3 class="summary-title">@lang('app.favoriteActions')</h3>
                <div class="summary-actions justify-content-center">
                    <form action="{{ route('client.favorites.destroyAll') }}" method="POST" class="w-100">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-clear w-100">
                            <i class="fas fa-trash"></i> @lang('app.clearAllFavorites')
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @else
        <div class="empty-cart text-center py-5 fade-in">
            <div class="empty-icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3 class="empty-title">@lang('app.emptyFavorites')</h3>
            <p class="empty-text">@lang('app.noFavoritesYet')</p>
            <a href="{{ route('menu') }}" class="btn-start-shopping">
                <i class="fas fa-store"></i> @lang('app.startShopping')
            </a>
        </div>
        @endif

    </div>
</div>

<style>
    body {
        background: #0a0a0a;
    }

    .premium-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        border: 1px solid rgba(255, 215, 90, 0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .premium-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 215, 90, 0.05), transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
        z-index: 1;
    }

    .premium-card:hover {
        transform: translateY(-12px);
        box-shadow:
            0 20px 40px rgba(255, 215, 90, 0.3),
            0 0 80px rgba(255, 215, 90, 0.1);
        border-color: rgba(255, 215, 90, 0.6);
    }

    .premium-card:hover::before {
        opacity: 1;
    }

    .delete-btn-wrapper {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 10;
    }

    .delete-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: rgba(255, 71, 87, 0.9);
        border: none;
        color: white;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(255, 71, 87, 0.4);
    }

    .delete-btn:hover {
        background: #ff4757;
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 6px 20px rgba(255, 71, 87, 0.6);
    }

    .discount-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: linear-gradient(135deg, #ff4757, #ff6348);
        color: white;
        padding: 6px 14px;
        border-radius: 25px;
        font-size: 0.85rem;
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

    .card-image-wrapper {
        position: relative;
        width: 100%;
        padding-top: 100%;
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        overflow: hidden;
    }

    .card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .premium-card:hover .card-image {
        transform: scale(1.1);
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
        color: rgba(255, 215, 90, 0.2);
    }

    .card-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 2;
    }

    .product-title {
        color: #ffd95a;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        transition: all 0.3s ease;
        text-align: center;
    }

    .premium-card:hover .product-title {
        color: #fff7c2;
        text-shadow: 0 0 15px rgba(255, 215, 90, 0.8);
    }

    .price-section {
        text-align: center;
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 215, 90, 0.2);
    }

    .original-price {
        color: rgba(255, 215, 90, 0.7);
        text-decoration: line-through;
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }

    .discounted-price {
        color: #4ade80;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .price-tag {
        color: #ffd95a;
        font-size: 1.3rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 0;
    }

    .cart-summary {
        display: flex;
        justify-content: center;
    }

    .summary-box {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, 0.2);
        border-radius: 20px;
        padding: 2.5rem;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .summary-title {
        color: #ffd95a;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
        text-shadow: 0 0 20px rgba(255, 215, 90, 0.5);
    }

    .summary-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
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
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 71, 87, 0.4);
    }

    .btn-clear:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 71, 87, 0.6);
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
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 90, 0.4);
    }

    .btn-checkout:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, 0.6);
        color: #000;
    }

    .empty-cart {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, 0.1);
        border-radius: 20px;
        padding: 4rem 2rem;
    }

    .empty-icon {
        font-size: 5rem;
        color: rgba(255, 215, 90, 0.2);
        margin-bottom: 1.5rem;
    }

    .empty-title {
        color: #ffd95a;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .empty-text {
        color: rgba(255, 215, 90, 0.6);
        font-size: 1.1rem;
        margin-bottom: 2rem;
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
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 90, 0.4);
    }

    .btn-start-shopping:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, 0.6);
        color: #000;
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

    .row.g-4 .fade-up:nth-child(4n + 1) {
        animation-delay: 0.1s;
    }

    .row.g-4 .fade-up:nth-child(4n + 2) {
        animation-delay: 0.2s;
    }

    .row.g-4 .fade-up:nth-child(4n + 3) {
        animation-delay: 0.3s;
    }

    .row.g-4 .fade-up:nth-child(4n + 4) {
        animation-delay: 0.4s;
    }
</style>

@endsection