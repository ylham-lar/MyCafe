@extends('client.layouts.app')

@section('title')
{{ $categories->name }}
@endsection

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-5">
                <span class="header-gold">{{ $categories->name }}</span> Items
            </h1>
            <p class="header-subtitle fs-5">
                Explore the best items from this category.
            </p>
        </div>

        <div class="row g-4">
            @foreach($categories->products as $product)
            <div class="col-12 col-sm-6 col-md-3 fade-up">
                <a href="{{ route('client.products.show', $product->id) }}" class="text-decoration-none">
                    <div class="card premium-card shadow-lg border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <p class="price-tag mb-1">${{ number_format($product->price, 2) }}</p>
                            <small class="text-gold-fade">{{ $product->description }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>

<style>
    .premium-card {
        background: linear-gradient(180deg, #1a1a1a, #222, #2a2a2a);
        color: #f8f9fa;
        border-radius: 14px;
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
    }

    .premium-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 12px 28px rgba(255, 215, 90, 0.45);
        border-color: rgba(255, 215, 90, 0.5);
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