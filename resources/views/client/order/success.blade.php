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
                <div class="success-card fade-in">
                    <div class="success-icon mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4 class="mb-3">@lang('app.thankYou')</h4>
                    <p class="mb-4">@lang('app.yourOrderIsBeingProcessed')</p>
                    <a href="{{ route('client.cart.index') }}" class="btn-secondary-premium">
                        <i class="fas fa-arrow-left"></i>
                        @lang('app.backToCart')
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .success-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 1px solid rgba(255, 215, 90, .2);
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .4);
    }

    .success-icon {
        font-size: 5rem;
        color: #4ade80;
        text-shadow: 0 0 20px rgba(74, 222, 128, .5);
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 30px rgba(255, 215, 90, .6);
    }

    .header-subtitle {
        color: rgba(255, 215, 90, .7);
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

    .fade-in {
        opacity: 0;
        animation: fadeIn .8s ease forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .success-card {
            padding: 2rem 1.5rem;
        }
    }
</style>
@endsection