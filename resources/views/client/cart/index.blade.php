@extends('client.layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h2 class="fw-bold display-5 text-warning">Your Shopping Cart</h2>
            <p class="text-gold-fade fs-5">Check your items and proceed to checkout.</p>
        </div>

        @if($products->count() > 0)
        <div class="row g-4 justify-content-center">
            @php $total = 0; @endphp

            @foreach($products as $product)
            @php
            $lineTotal = $product->price * $product->quantity;
            $total += $lineTotal;
            @endphp

            <div class="col-12 col-sm-6 col-md-3 fade-up">
                <div class="cart-card shadow-lg rounded-4 position-relative p-3">
                    <form action="{{ route('client.cart.delete', $product->id) }}" method="POST" class="position-absolute top-0 end-0 m-2">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">&times;</button>
                    </form>

                    <div class="text-center mb-3">
                        @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="cart-product-img rounded-circle">
                        @else
                        <div class="cart-product-img bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light">No Image</div>
                        @endif
                    </div>

                    <h5 class="text-warning text-center">{{ $product->name }}</h5>
                    <p class="text-gold-fade text-center mb-2">${{ number_format($product->price,2) }}</p>

                    <div class="d-flex justify-content-center align-items-center quantity-control mb-2">
                        <form action="{{ route('client.cart.add', $product->id) }}" method="POST" class="d-flex align-items-center quantity-form" data-product-id="{{ $product->id }}">
                            @csrf
                            <button type="button" class="btn btn-dark btn-sm minus-btn" data-product-id="{{ $product->id }}">-</button>
                            <input type="number" name="quantity" value="{{ $product->quantity }}" min="1" class="form-control text-center quantity-input" style="width:50px;" data-product-id="{{ $product->id }}">
                            <button type="button" class="btn btn-dark btn-sm plus-btn" data-product-id="{{ $product->id }}">+</button>
                        </form>
                    </div>

                    <p class="text-center fw-bold mb-0 line-total text-warning">${{ number_format($lineTotal,2) }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <h4 class="text-warning fw-bold">Total: $<span id="cart-total">{{ number_format($total,2) }}</span></h4>
            <a href="" class="btn btn-warning btn-lg mt-3 px-5">Proceed to Checkout</a>
        </div>

        @else
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart" style="font-size: 80px; color: rgba(255, 215, 90, 0.3); margin-bottom: 20px;"></i>
            <p class="text-muted fs-5">Your cart is empty.</p>
            <a href="{{ route('home') }}" class="btn btn-warning mt-3">Start Shopping</a>
        </div>
        @endif

    </div>
</div>

<style>
    /* Şeýle CSS, öňkiňiz ýaly işläp biler, diňe kartlar responsiw gridde ýerleşýär */
    .cart-card {
        background: linear-gradient(180deg, #1a1a1a, #222, #2a2a2a);
        color: #f8f9fa;
        border-radius: 14px;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .cart-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 12px 28px rgba(255, 215, 90, 0.45);
        border: 1px solid rgba(255, 215, 90, 0.5);
    }

    .cart-card h5 {
        color: #ffd95a;
        text-align: center;
        font-size: 1.1rem;
        transition: 0.3s ease;
    }

    .cart-card:hover h5 {
        color: #fff7c2;
        text-shadow: 0 0 12px rgba(255, 215, 90, 1);
    }

    .cart-product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 0 auto;
        border: 2px solid rgba(255, 215, 90, 0.3);
        transition: all 0.3s ease;
    }

    .cart-card:hover .cart-product-img {
        border-color: rgba(255, 215, 90, 0.7);
        transform: scale(1.05);
    }

    .quantity-control {
        gap: 5px;
        justify-content: center;
    }

    .quantity-control button {
        width: 32px;
        height: 32px;
        border: 1px solid #ffd95a;
        background: #222;
        color: #ffd95a;
        transition: all 0.3s ease;
    }

    .quantity-control button:hover {
        background: #ffd95a;
        color: #111;
        transform: scale(1.1);
    }

    .quantity-input {
        width: 50px;
        height: 32px;
        background: #111;
        border: 1px solid #ffd95a;
        color: #fff;
    }

    .line-total {
        font-size: 1.2rem;
        text-shadow: 0 0 8px rgba(255, 215, 90, 0.5);
    }

    .text-gold-fade {
        color: rgba(255, 215, 90, 0.75) !important;
    }
</style>

<script>
    // Quantity + - işleýşi we AJAX update kodunuz öňki ýaly bolup biler
</script>
@endsection