@extends('client.layouts.app')

@section('title')
{{ __('app.home') }}
@endsection

@section('content')

@php
$locale = app()->getLocale();
$nameField = ($locale === 'en') ? 'name' : 'name_' . $locale;
@endphp

<div class="bg-dark text-light py-5">
    <div class="container">
        <div class="banner-wrapper text-center">
            <canvas id="banner" width="1200" height="400"></canvas>
        </div>
    </div>
</div>

<style>
    .banner-wrapper {
        margin: 2rem 0;
    }

    #banner {
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        max-width: 100%;
        height: auto;
    }

    .premium-card {
        background: linear-gradient(180deg, #1a1a1a, #222, #2a2a2a);
        color: #f8f9fa;
        border-radius: 14px;
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
        border: 1px solid rgba(255, 215, 90, 0.1);
    }

    .premium-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(255, 215, 90, 0.3), 0 0 80px rgba(255, 215, 90, 0.1);
        border-color: rgba(255, 215, 90, 0.6);
    }

    .premium-card .card-title {
        color: #ffd95a;
        transition: 0.3s ease;
    }

    .premium-card:hover .card-title {
        color: #fff7c2;
        text-shadow: 0 0 12px rgba(255, 215, 90, 1);
    }

    .price-tag {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.1rem;
        transition: 0.3s ease, text-shadow 0.3s ease;
    }

    .premium-card:hover .price-tag {
        color: #fff7c2;
        text-shadow: 0 0 8px rgba(255, 215, 90, 1);
    }

    .text-gold-fade {
        color: rgba(255, 215, 90, 0.75) !important;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .premium-card:hover .text-gold-fade {
        color: #fff7c2;
        text-shadow: 0 0 6px rgba(255, 215, 90, 0.8);
    }

    .premium-card small {
        font-size: 0.85rem;
    }

    .premium-card .card-body {
        padding: 1.5rem 1rem;
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 12px rgba(255, 215, 90, 0.8);
    }

    .header-white {
        color: #f8f9fa;
    }

    .header-subtitle {
        color: #d7deea;
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
        const canvas = document.getElementById('banner');
        const ctx = canvas.getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        gradient.addColorStop(0, '#1a1a1a');
        gradient.addColorStop(0.5, '#2a2a2a');
        gradient.addColorStop(1, '#111111');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.shadowColor = 'rgba(255, 217, 90, 0.5)';
        ctx.shadowBlur = 50;
        ctx.fillStyle = '#ffd95a';
        ctx.font = 'bold 120px "Georgia", serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('MyCafe', canvas.width / 2, canvas.height / 2 - 40);

        ctx.shadowBlur = 0;
        ctx.fillStyle = '#f4a261';
        ctx.font = '32px "Georgia", serif';
        ctx.fillText('Restaurant & Coffee', canvas.width / 2, canvas.height / 2 + 40);


        ctx.strokeStyle = '#ffd95a';
        ctx.lineWidth = 4;
        ctx.globalAlpha = 0.25;
        ctx.shadowBlur = 20;
        ctx.strokeRect(30, 30, canvas.width - 60, canvas.height - 60);

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