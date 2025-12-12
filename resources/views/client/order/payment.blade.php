@extends('client.layouts.app')

@section('title', __('app.paymentMethod'))

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-4">
                <span class="header-gold">@lang('app.paymentMethod')</span>
            </h1>
            <p class="header-subtitle fs-5">@lang('app.selectPaymentMethod')</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">

                <div class="info-card mb-4 fade-in">
                    <div class="info-header">
                        <i class="fas fa-user-circle"></i>
                        <h5>@lang('app.customerInformation')</h5>
                    </div>
                    <div class="info-body">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <span class="info-label">@lang('app.address')</span>
                                <span class="info-value">{{ $customer->address }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span class="info-label">@lang('app.phoneNumber')</span>
                                <span class="info-value">{{ $customer->phone_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('cart'))
                <div class="cart-summary-card mb-4 fade-in">
                    <div class="cart-header">
                        <i class="fas fa-shopping-bag"></i>
                        <h5>@lang('app.orderSummary')</h5>
                    </div>
                    <div class="cart-body">
                        @php
                        $total = 0;
                        @endphp
                        @foreach(session('cart') as $id => $item)
                        @php
                        $product = App\Models\Product::find($id);
                        if($product) {
                        $quantity = $item['quantity'] ?? 1;
                        $subtotal = $product->price * $quantity;
                        $total += $subtotal;
                        }
                        @endphp
                        @if($product)
                        <div class="cart-item">
                            <div class="cart-item-info">
                                <span class="cart-item-name">{{ $product->name }}</span>
                                <span class="cart-item-qty">{{ $quantity }} x {{ number_format($product->price, 2) }} $</span>
                            </div>
                            <span class="cart-item-price">{{ number_format($subtotal, 2) }} $</span>
                        </div>
                        @endif
                        @endforeach
                        <div class="cart-total">
                            <span>@lang('app.total')</span>
                            <span class="total-amount">{{ number_format($total, 2) }} $</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="premium-form-card fade-up">
                    <form action="{{ route('client.order.store') }}" method="POST" id="paymentForm">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                        <div class="payment-header mb-4">
                            <i class="fas fa-credit-card"></i>
                            <h4>@lang('app.choosePayment')</h4>
                        </div>

                        <div class="payment-methods">
                            <button type="submit" name="payment_method" value="0" class="payment-btn cash-btn">
                                <div class="payment-icon-wrapper">
                                    <div class="payment-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="payment-glow"></div>
                                </div>
                                <div class="payment-content">
                                    <h5>@lang('app.cashPayment')</h5>
                                </div>
                                <div class="payment-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </button>

                            <button type="submit" name="payment_method" value="1" class="payment-btn card-btn">
                                <div class="payment-icon-wrapper">
                                    <div class="payment-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="payment-glow"></div>
                                </div>
                                <div class="payment-content">
                                    <h5>@lang('app.cardPayment')</h5>
                                </div>
                                <div class="payment-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>

                        <div class="form-actions mt-4">
                            <a href="{{ route('client.cart.index') }}" class="btn-secondary-premium">
                                <i class="fas fa-arrow-left"></i>
                                @lang('app.back')
                            </a>
                        </div>
                    </form>
                </div>

                <div class="secure-notice mt-4 fade-in">
                    <i class="fas fa-shield-alt"></i>
                    <span>@lang('app.secureTransaction')</span>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    body {
        background: #0a0a0a;
    }

    .info-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .4);
    }

    .info-header {
        background: linear-gradient(135deg, rgba(255, 215, 90, .15), rgba(255, 215, 90, .05));
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(255, 215, 90, .2);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .info-header i {
        font-size: 1.5rem;
        color: #ffd95a;
    }

    .info-header h5 {
        margin: 0;
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .info-body {
        padding: 2rem;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 215, 90, .1);
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-item i {
        font-size: 1.2rem;
        color: rgba(255, 215, 90, .6);
        margin-top: .2rem;
    }

    .info-item>div {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: .25rem;
    }

    .info-label {
        color: rgba(255, 215, 90, .5);
        font-size: .9rem;
        font-weight: 500;
    }

    .info-value {
        color: #ffd95a;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .cart-summary-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .4);
    }

    .cart-header {
        background: linear-gradient(135deg, rgba(255, 215, 90, .15), rgba(255, 215, 90, .05));
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(255, 215, 90, .2);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .cart-header i {
        font-size: 1.5rem;
        color: #ffd95a;
    }

    .cart-header h5 {
        margin: 0;
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .cart-body {
        padding: 2rem;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 215, 90, .1);
    }

    .cart-item-info {
        display: flex;
        flex-direction: column;
        gap: .25rem;
    }

    .cart-item-name {
        color: #ffd95a;
        font-weight: 600;
        font-size: 1.05rem;
    }

    .cart-item-qty {
        color: rgba(255, 215, 90, .6);
        font-size: .9rem;
    }

    .cart-item-price {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .cart-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1.5rem;
        margin-top: 1rem;
        border-top: 2px solid rgba(255, 215, 90, .3);
    }

    .cart-total span:first-child {
        color: #ffd95a;
        font-size: 1.3rem;
        font-weight: 700;
    }

    .total-amount {
        color: #ffd95a;
        font-size: 1.8rem;
        font-weight: 800;
        text-shadow: 0 0 20px rgba(255, 215, 90, .5);
    }

    .premium-form-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, .5);
        position: relative;
        overflow: hidden;
    }

    .premium-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 215, 90, .05), transparent);
        opacity: .3;
        pointer-events: none;
    }

    .payment-header {
        text-align: center;
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .payment-header i {
        font-size: 2rem;
        color: #ffd95a;
    }

    .payment-header h4 {
        color: #ffd95a;
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
    }

    .payment-methods {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-top: 2rem;
        position: relative;
        z-index: 2;
    }

    .payment-btn {
        background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        border: 2px solid rgba(255, 215, 90, .3);
        border-radius: 20px;
        padding: 2rem 1.5rem;
        cursor: pointer;
        transition: all .4s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }

    .payment-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 90, .1), transparent);
        transition: left .6s ease;
    }

    .payment-btn:hover::before {
        left: 100%;
    }

    .payment-btn:hover {
        transform: translateY(-8px);
        border-color: #ffd95a;
        box-shadow: 0 15px 40px rgba(255, 215, 90, .4);
    }

    .cash-btn:hover {
        background: linear-gradient(145deg, #2a4a2a, #1a3a1a);
        border-color: #4ade80;
        box-shadow: 0 15px 40px rgba(74, 222, 128, .3);
    }

    .card-btn:hover {
        background: linear-gradient(145deg, #2a2a4a, #1a1a3a);
        border-color: #60a5fa;
        box-shadow: 0 15px 40px rgba(96, 165, 250, .3);
    }

    .payment-icon-wrapper {
        position: relative;
        width: 80px;
        height: 80px;
    }

    .payment-icon {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
        transition: all .4s ease;
    }

    .cash-btn:hover .payment-icon {
        background: linear-gradient(135deg, #4ade80, #22c55e);
        transform: scale(1.1) rotate(360deg);
    }

    .card-btn:hover .payment-icon {
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        transform: scale(1.1) rotate(360deg);
    }

    .payment-icon i {
        font-size: 2rem;
        color: #111;
    }

    .payment-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255, 215, 90, .4), transparent);
        border-radius: 50%;
        opacity: 0;
        transition: all .4s ease;
    }

    .payment-btn:hover .payment-glow {
        opacity: 1;
        width: 150%;
        height: 150%;
    }

    .payment-content {
        text-align: center;
    }

    .payment-content h5 {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: .5rem;
        transition: all .3s ease;
    }

    .payment-content p {
        color: rgba(255, 215, 90, .6);
        font-size: .95rem;
        margin: 0;
        transition: all .3s ease;
    }

    .cash-btn:hover .payment-content h5 {
        color: #4ade80;
    }

    .card-btn:hover .payment-content h5 {
        color: #60a5fa;
    }

    .payment-arrow {
        opacity: 0;
        transform: translateX(-10px);
        transition: all .3s ease;
    }

    .payment-arrow i {
        font-size: 1.5rem;
        color: #ffd95a;
    }

    .payment-btn:hover .payment-arrow {
        opacity: 1;
        transform: translateX(0);
    }

    .form-actions {
        display: flex;
        justify-content: center;
        position: relative;
        z-index: 2;
    }

    .btn-secondary-premium {
        padding: 1rem 2rem;
        background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        border: 1px solid rgba(255, 215, 90, .3);
        border-radius: 12px;
        color: #ffd95a;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all .3s ease;
        display: inline-flex;
        align-items: center;
        gap: .5rem;
    }

    .btn-secondary-premium:hover {
        background: linear-gradient(145deg, #3a3a3a, #2a2a2a);
        border-color: #ffd95a;
        color: #fff7c2;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 215, 90, .2);
    }

    .secure-notice {
        text-align: center;
        color: rgba(255, 215, 90, .6);
        font-size: .95rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
    }

    .secure-notice i {
        color: #4ade80;
        font-size: 1.1rem;
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 30px rgba(255, 215, 90, .6);
    }

    .header-subtitle {
        color: rgba(255, 215, 90, .7);
    }

    .fade-in {
        opacity: 0;
        animation: fadeIn .8s ease forwards;
    }

    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp .8s ease forwards;
        animation-delay: .3s;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .premium-form-card {
            padding: 2rem 1.5rem;
        }

        .payment-methods {
            grid-template-columns: 1fr;
        }

        .info-body,
        .cart-body {
            padding: 1.5rem;
        }

        .payment-btn {
            padding: 1.5rem 1rem;
        }
    }
</style>
@endsection