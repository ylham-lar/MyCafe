<nav class="navbar navbar-expand-lg navbar-dark premium-navbar shadow-lg py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="fas fa-coffee"></i>
            <span>MyCafe</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('client.categories.products', $category->id) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link px-2" href="#contact">
                        <i class="fas fa-phone-alt me-1"></i>Contacts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 basket-link" href="{{ route('client.cart.index') }}">
                        <i class="fas fa-shopping-basket me-1"></i>Basket
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .premium-navbar {
        background: linear-gradient(180deg, rgba(17, 17, 17, 0.98), rgba(26, 26, 26, 0.98), rgba(34, 34, 34, 0.98));
        border-bottom: 2px solid rgba(255, 215, 90, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.6);
        font-family: 'Poppins', sans-serif;
        backdrop-filter: blur(10px);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .premium-navbar .navbar-brand {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.6rem;
        text-shadow: 0 0 15px rgba(255, 215, 90, 0.8);
        transition: all 0.3s ease;
    }

    .premium-navbar .navbar-brand:hover {
        color: #fff7c2;
        text-shadow: 0 0 25px rgba(255, 215, 90, 1);
        transform: scale(1.05);
    }

    .premium-navbar .navbar-brand i {
        font-size: 1.4rem;
        animation: rotate 3s ease-in-out infinite;
    }

    @keyframes rotate {

        0%,
        100% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(-10deg);
        }
    }

    .premium-navbar .nav-link {
        color: #ffd95a;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }

    .premium-navbar .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #ffd95a, transparent);
        transition: all 0.4s ease;
        transform: translateX(-50%);
    }

    .premium-navbar .nav-link:hover {
        color: #fff7c2;
        text-shadow: 0 0 12px rgba(255, 215, 90, 0.9);
        background: rgba(255, 215, 90, 0.1);
        transform: translateY(-2px);
    }

    .premium-navbar .nav-link:hover::before {
        width: 80%;
    }

    .premium-navbar .basket-link {
        background: linear-gradient(135deg, rgba(255, 215, 90, 0.15), rgba(255, 215, 90, 0.08));
        border: 1px solid rgba(255, 215, 90, 0.3);
    }

    .premium-navbar .basket-link:hover {
        background: linear-gradient(135deg, rgba(255, 215, 90, 0.25), rgba(255, 215, 90, 0.15));
        border-color: rgba(255, 215, 90, 0.6);
        box-shadow: 0 4px 15px rgba(255, 215, 90, 0.3);
    }

    .premium-navbar .navbar-toggler {
        border: 1px solid rgba(255, 215, 90, 0.4);
        padding: 0.5rem 0.75rem;
        transition: all 0.3s ease;
    }

    .premium-navbar .navbar-toggler:hover {
        background: rgba(255, 215, 90, 0.1);
        border-color: rgba(255, 215, 90, 0.7);
        box-shadow: 0 0 15px rgba(255, 215, 90, 0.4);
    }

    .premium-navbar .navbar-toggler:focus {
        box-shadow: 0 0 20px rgba(255, 215, 90, 0.5);
    }

    @media (max-width: 991px) {
        .premium-navbar .nav-link {
            padding: 0.75rem 1rem;
            margin: 0.25rem 0;
        }
    }
</style>