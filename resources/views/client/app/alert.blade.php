@if(session('success') || isset($success))
@php $message = session('success') ?? $success; @endphp
<div class="toast-alert toast-success show position-fixed top-0 end-0 m-4 pt-5">
    <div class="toast-inner d-flex align-items-center">
        <i class="bi bi-check-circle-fill icon-success"></i>
        <div class="toast-message">{!! $message !!}</div>
        <button class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

@if(session('error') || isset($error) || $errors->any())
@php
$messages = session('error') ?? $error ?? $errors->all();
@endphp
<div class="toast-alert toast-error show position-fixed top-0 end-0 m-4 pt-5">
    <div class="toast-inner d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
        <i class="bi bi-x-circle-fill icon-error"></i>
        <div class="toast-message">
            @if(is_array($messages))
            @foreach($messages as $msg)
            <div>{!! $msg !!}</div>
            @endforeach
            @else
            {!! $messages !!}
            @endif
        </div>
        <button class="btn-close ms-auto mt-2 mt-sm-0" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<style>
    .toast-alert {
        z-index: 2000;
        animation: toastSlideIn .45s ease-out;
    }

    .toast-inner {
        backdrop-filter: blur(12px);
        background: rgba(17, 25, 40, 0.55);
        border-radius: 16px;
        padding: 14px 18px;
        min-width: 320px;
        max-width: 380px;
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.55);
        border: 1px solid rgba(255, 255, 255, 0.08);
        display: flex;
        gap: 12px;
        transition: transform .35s ease, box-shadow .35s ease;
    }

    .toast-inner:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.65);
    }

    .toast-success .toast-inner {
        border-left: 4px solid #19e37d;
        box-shadow: 0 0 18px rgba(25, 227, 125, 0.45);
    }

    .toast-error .toast-inner {
        border-left: 4px solid #ff4d4d;
        box-shadow: 0 0 18px rgba(255, 77, 77, 0.45);
    }

    .icon-success {
        font-size: 1.6rem;
        color: #19e37d;
        text-shadow: 0 0 10px rgba(25, 227, 125, .7);
    }

    .icon-error {
        font-size: 1.6rem;
        color: #ff4d4d;
        text-shadow: 0 0 10px rgba(255, 77, 77, .7);
    }

    .toast-message {
        color: #f1f5f9;
        font-size: 0.95rem;
        font-weight: 500;
        line-height: 1.5;
    }

    @keyframes toastSlideIn {
        from {
            transform: translateX(120%) scale(.9);
            opacity: 0;
        }

        to {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }

    .btn-close {
        filter: invert(1);
        opacity: .85;
    }

    .btn-close:hover {
        opacity: 1;
    }
</style>