@extends('client.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="bg-dark text-light py-5">
    <div class="container py-4">

        <!-- Header -->
        <div class="text-center mb-5 fade-in">
            <h1 class="fw-bold display-5">
                <span class="header-gold">Our</span> <span class="header-white">Menu</span>
            </h1>
            <p class="header-subtitle fs-5">
                Choose your favorite category and explore our café specialties.
            </p>
        </div>

        <!-- Categories Grid -->
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 fade-up">
                <a href="{{ route('client.categories.products', $category->id) }}" class="text-decoration-none">
                    <div class="card premium-category-card shadow-lg border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="category-title h5 text-gold-fade">{{ $category->name }}</h5>
                            <p class="category-count text-gold-fade fw-semibold mt-2 h6">
                                {{ $category->products->count() }} Products
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>
<style>
    /* Premium Navbar Style */
    .premium-navbar {
        background: linear-gradient(180deg, #111, #1a1a1a, #222);
        border-bottom: 1px solid rgba(255, 215, 90, 0.25);
        box-shadow: 0 6px 28px rgba(0, 0, 0, 0.55);
        font-family: 'Poppins', sans-serif;
    }

    .premium-navbar .navbar-brand {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.55rem;
        text-shadow: 0 0 10px rgba(255, 215, 90, 0.8);
    }

    .premium-navbar .nav-link {
        color: #ffd95a;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .premium-navbar .nav-link:hover {
        color: #fff7c2;
        text-shadow: 0 0 12px rgba(255, 215, 90, 0.9);
    }

    /* Category Cards */
    .premium-category-card {
        background: linear-gradient(180deg, #1a1a1a, #222, #2a2a2a);
        border-radius: 14px;
        border: 1px solid rgba(255, 215, 90, 0.12);
        padding: 12px;
        transition: all 0.35s ease;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
        color: #f1f1f1;
    }

    .premium-category-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45), 0 0 25px rgba(255, 215, 90, 0.6);
        border-color: rgba(255, 215, 90, 0.5);
    }

    .category-title {
        color: #ffd95a;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .premium-category-card:hover .category-title {
        color: #fff7c2;
        text-shadow: 0 0 8px rgba(255, 215, 90, 0.85);
    }

    .category-count {
        color: rgba(255, 215, 90, 0.75);
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .premium-category-card:hover .category-count {
        color: #fff7c2;
        text-shadow: 0 0 6px rgba(255, 215, 90, 0.8);
    }

    /* Header Text */
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

    /* Footer */
    .footer-premium {
        background: linear-gradient(180deg, #111, #1a1a1a, #222);
        color: #ececec;
        padding: 50px 0 30px;
        border-top: 1px solid rgba(255, 193, 7, 0.18);
    }

    .footer-title {
        color: #ffd95a;
        text-shadow: 0 0 10px rgba(255, 193, 7, .6);
        font-size: 1.3rem;
        font-weight: 700;
    }

    .footer-text,
    .footer-copy {
        color: #d5d7dd;
    }

    .footer-link {
        color: #e5e5e5;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .footer-link:hover {
        color: #ffd95a;
        text-shadow: 0 0 10px rgba(255, 193, 7, .8);
        padding-left: 4px;
    }

    .footer-social {
        color: #dcdcdc;
        font-size: 1.35rem;
        margin-left: 12px;
        transition: .3s ease;
    }

    .footer-social:hover {
        color: #ffd95a;
        transform: translateY(-5px) scale(1.15);
        text-shadow: 0 0 18px rgba(255, 193, 7, .9);
    }

    /* Fade animations */
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