@extends('client.layouts.app')

@section('title', __('app.orderSuccess'))

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-4">
                <span class="header-gold">@lang('app.orderSuccess')</span>
            </h1>
            <p class="header-subtitle fs-5">@lang('app.yourOrderHasBeenCreated')</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="success-card fade-up">
                    <div class="success-icon-wrapper mb-4">
                        <i class="fas fa-check-circle success-icon"></i>
                    </div>

                    <h3 class="success-title mb-3">@lang('app.thankYou')</h3>
                    <p class="success-text mb-4">@lang('app.yourOrderIsBeingProcessed')</p>

                    <div class="success-actions">
                        <a href="{{ route('home') }}" class="btn-continue-shopping">
                            <i class="fas fa-store"></i> @lang('app.continueShopping')
                        </a>
                    </div>
                </div>

                <div class="info-box mt-4 fade-in">
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span>@lang('app.estimatedDelivery')</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <span>@lang('app.contactSupport')</span>
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

    .success-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0, 0, 0, .5);
        position: relative;
        overflow: hidden;
    }

    .success-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(74, 222, 128, .05), transparent);
        opacity: .3;
        pointer-events: none;
    }

    .success-icon-wrapper {
        position: relative;
        z-index: 2;
        animation: successPulse 2s ease-in-out infinite;
    }

    .success-icon {
        font-size: 5rem;
        color: #4ade80;
        text-shadow: 0 0 30px rgba(74, 222, 128, .6);
        filter: drop-shadow(0 0 20px rgba(74, 222, 128, .4));
    }

    @keyframes successPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .success-title {
        color: #ffd95a;
        font-size: 2rem;
        font-weight: 700;
        position: relative;
        z-index: 2;
        text-shadow: 0 0 20px rgba(255, 215, 90, .5);
    }

    .success-text {
        color: rgba(255, 215, 90, .7);
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
        line-height: 1.6;
    }

    .success-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
        margin-top: 2rem;
    }

    .btn-continue-shopping {
        flex: 1;
        min-width: 180px;
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
        box-shadow: 0 4px 15px rgba(255, 215, 90, .4);
    }

    .btn-continue-shopping:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 90, .6);
        color: #000;
    }

    .btn-view-cart {
        flex: 1;
        min-width: 150px;
        padding: 1rem 1.5rem;
        background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        border: 1px solid rgba(255, 215, 90, .3);
        border-radius: 12px;
        color: #ffd95a;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        transition: all .3s ease;
    }

    .btn-view-cart:hover {
        background: linear-gradient(145deg, #3a3a3a, #2a2a2a);
        border-color: #ffd95a;
        color: #fff7c2;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 215, 90, .2);
    }

    .info-box {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .1);
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        gap: 2rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: .75rem;
        color: rgba(255, 215, 90, .7);
        font-size: .95rem;
    }

    .info-item i {
        font-size: 1.2rem;
        color: #4ade80;
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 30px rgba(255, 215, 90, .6);
    }

    .header-subtitle {
        color: rgba(255, 215, 90, .7);
        font-size: 1.1rem;
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
        .success-card {
            padding: 2rem 1.5rem;
        }

        .success-icon {
            font-size: 4rem;
        }

        .success-title {
            font-size: 1.5rem;
        }

        .success-actions {
            flex-direction: column;
        }

        .btn-continue-shopping,
        .btn-view-cart {
            width: 100%;
        }

        .info-box {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>
@endsection