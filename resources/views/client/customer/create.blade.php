@extends('client.layouts.app')

@section('title', __('app.welcome'))

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-4">
                <span class="header-gold">{{ __('app.welcomeToStore') }}</span>
            </h1>
            <p class="header-subtitle fs-5">{{ __('app.provideDeliveryInfo') }}</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-xl-6">
                @if($errors->any())
                <div class="alert-error mb-4 fade-in">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="alert-content">
                        <h5 class="alert-title">{{ __('app.pleaseFixErrors') }}</h5>
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <div class="premium-form-card fade-up">
                    <div class="welcome-icon mb-3 text-center">
                        <i class="fas fa-user-circle fa-3x" style="color: #ffd95a;"></i>
                    </div>

                    <form action="{{ route('client.customer.store') }}" method="POST">
                        @csrf

                        <div class="form-group-wrapper mb-3">
                            <label class="form-label-premium">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ __('app.deliveryAddress') }} <span class="required-star">*</span>
                            </label>
                            <input type="text"
                                name="address"
                                value="{{ old('address') }}"
                                class="form-control-premium @error('address') is-invalid @enderror"
                                placeholder="{{ __('app.enterAddress') }}"
                                required>
                            @error('address')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group-wrapper mb-4">
                            <label class="form-label-premium">
                                <i class="fas fa-phone"></i>
                                {{ __('app.phoneNumber') }}
                            </label>
                            <input type="text"
                                name="phone_number"
                                value="{{ old('phone_number') }}"
                                class="form-control-premium @error('phone_number') is-invalid @enderror"
                                placeholder="{{ __('app.enterPhone') }}">
                            @error('phone_number')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary-premium px-5">
                                {{ __('app.startShopping') }}
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="secure-notice mt-4 fade-in">
                    <i class="fas fa-shield-alt"></i>
                    <span>{{ __('app.secureInfo') }}</span>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    body {
        background: #0a0a0a;
    }

    .premium-form-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        padding: 2.5rem;
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

    .welcome-icon {
        position: relative;
        z-index: 2;
        animation: pulse 2s ease-in-out infinite;
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

    /* Language Selector Styles */
    .language-selector {
        position: relative;
        z-index: 2;
    }

    .btn-group {
        display: inline-flex;
        gap: 0;
        background: rgba(255, 215, 90, .05);
        border-radius: 10px;
        padding: 4px;
        border: 1px solid rgba(255, 215, 90, .2);
    }

    .lang-btn {
        padding: 0.5rem 1.25rem;
        background: transparent;
        border: none;
        border-radius: 8px;
        color: rgba(255, 215, 90, .6);
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all .3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .lang-btn:hover {
        color: #ffd95a;
        background: rgba(255, 215, 90, .1);
    }

    .lang-btn.active {
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        color: #111;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(255, 215, 90, .3);
    }

    .form-group-wrapper {
        position: relative;
        z-index: 2;
    }

    .form-label-premium {
        color: #ffd95a;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: .5rem;
        display: flex;
        align-items: center;
        gap: .5rem;
    }

    .form-label-premium i {
        font-size: 0.9rem;
        opacity: .8;
    }

    .required-star {
        color: #ff4757;
        margin-left: .25rem;
    }

    .form-control-premium {
        width: 100%;
        padding: 0.75rem 1rem;
        background: rgba(255, 215, 90, .05);
        border: 2px solid rgba(255, 215, 90, .3);
        border-radius: 10px;
        color: #ffd95a;
        font-size: 0.95rem;
        transition: all .3s ease;
    }

    .form-control-premium::placeholder {
        color: rgba(255, 215, 90, .4);
        font-size: 0.9rem;
    }

    .form-control-premium:focus {
        outline: none;
        border-color: #ffd95a;
        background: rgba(255, 215, 90, .08);
        box-shadow: 0 0 20px rgba(255, 215, 90, .2);
    }

    .form-control-premium.is-invalid {
        border-color: #ff4757;
        background: rgba(255, 71, 87, .05);
    }

    .invalid-feedback-custom {
        color: #ff4757;
        font-size: .85rem;
        margin-top: .4rem;
        display: flex;
        align-items: center;
        gap: .5rem;
    }

    .alert-error {
        background: linear-gradient(145deg, #2a1a1a, #1f0f0f);
        border: 1px solid rgba(255, 71, 87, .4);
        border-radius: 15px;
        padding: 1.25rem;
        display: flex;
        gap: 1rem;
        box-shadow: 0 4px 20px rgba(255, 71, 87, .2);
    }

    .alert-icon {
        font-size: 1.75rem;
        color: #ff4757;
    }

    .alert-content {
        flex: 1;
    }

    .alert-title {
        color: #ff4757;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: .75rem;
    }

    .alert-error ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .alert-error li {
        color: rgba(255, 215, 90, .8);
        padding: .4rem 0;
        border-bottom: 1px solid rgba(255, 71, 87, .2);
        font-size: 0.9rem;
    }

    .alert-error li:last-child {
        border-bottom: none;
    }

    .form-actions {
        display: flex;
        justify-content: center;
        position: relative;
        z-index: 2;
    }

    .btn-primary-premium {
        min-width: 200px;
        padding: 0.85rem 2rem;
        background: linear-gradient(135deg, #ffd95a, #ffed4e);
        border: none;
        border-radius: 10px;
        color: #111;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all .3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 90, .4);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
    }

    .btn-primary-premium:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, .6);
        color: #000;
    }

    .secure-notice {
        text-align: center;
        color: rgba(255, 215, 90, .6);
        font-size: .9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
    }

    .secure-notice i {
        color: #4ade80;
        font-size: 1rem;
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
        animation-delay: .2s;
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

        .btn-primary-premium {
            width: 100%;
        }

        .lang-btn {
            padding: 0.4rem 1rem;
            font-size: 0.85rem;
        }
    }
</style>
@endsection