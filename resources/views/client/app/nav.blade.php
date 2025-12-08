@php
$locale = app()->getLocale();
$nameField = ($locale === 'en') ? 'name' : 'name_' . $locale;
$langEmoji = ['tm' => '🇹🇲', 'ru' => '🇷🇺', 'en' => '🇬🇧'];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark premium-navbar shadow-lg py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="fas fa-coffee"></i>
            <span>{{ __('app.appName') }}</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link px-2" href="#contact"><i class="fas fa-phone-alt me-1"></i>{{ __('app.contact') }}</a></li>
                <li class="nav-item pe-2"><a class="nav-link px-2 basket-link" href="{{ route('client.favorites.index') }}"><i class="fas fa-heart me-1"></i>{{ __('app.favorites') }}</a></li>
                <li class="nav-item"><a class="nav-link px-2 basket-link" href="{{ route('client.cart.index') }}"><i class="fas fa-shopping-basket me-1"></i>{{ __('app.basket') }}</a></li>
                <li class="nav-item d-flex align-items-center ms-lg-2 mt-2 mt-lg-0">
                    <div class="dropdown language-switcher">
                        <button class="btn btn-outline-light dropdown-toggle text-uppercase fw-bold shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper($locale) }} {{ $langEmoji[$locale] ?? '' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary shadow-lg">
                            <li><a class="dropdown-item text-light" href="{{ route('locale', 'tm') }}">TM {{ $langEmoji['tm'] }} </a></li>
                            <li><a class="dropdown-item text-light" href="{{ route('locale', 'ru') }}">RU {{ $langEmoji['ru'] }} </a></li>
                            <li><a class="dropdown-item text-light" href="{{ route('locale', 'en') }}">EN {{ $langEmoji['en'] }} </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .premium-navbar {
        background: linear-gradient(180deg, rgba(17, 17, 17, .98), rgba(26, 26, 26, .98), rgba(34, 34, 34, .98));
        border-bottom: 2px solid rgba(255, 215, 90, .3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, .6);
        font-family: 'Poppins', sans-serif;
        backdrop-filter: blur(10px);
        position: sticky;
        top: 0;
        z-index: 1000
    }

    .premium-navbar .navbar-brand {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.6rem;
        text-shadow: 0 0 15px rgba(255, 215, 90, .8);
        transition: all .3s ease
    }

    .premium-navbar .navbar-brand:hover {
        color: #fff7c2;
        text-shadow: 0 0 25px rgba(255, 215, 90, 1);
        transform: scale(1.05)
    }

    .premium-navbar .navbar-brand i {
        font-size: 1.4rem;
        animation: rotate 3s ease-in-out infinite
    }

    @keyframes rotate {

        0%,
        100% {
            transform: rotate(0deg)
        }

        50% {
            transform: rotate(-10deg)
        }
    }

    .premium-navbar .nav-link {
        color: #ffd95a;
        font-weight: 600;
        font-size: .95rem;
        transition: all .3s ease;
        position: relative;
        overflow: hidden;
        border-radius: 8px
    }

    .premium-navbar .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #ffd95a, transparent);
        transition: all .4s ease;
        transform: translateX(-50%)
    }

    .premium-navbar .nav-link:hover {
        color: #fff7c2;
        text-shadow: 0 0 12px rgba(255, 215, 90, .9);
        background: rgba(255, 215, 90, .1);
        transform: translateY(-2px)
    }

    .premium-navbar .nav-link:hover::before {
        width: 80%
    }

    .premium-navbar .basket-link {
        background: linear-gradient(135deg, rgba(255, 215, 90, .15), rgba(255, 215, 90, .08));
        border: 1px solid rgba(255, 215, 90, .3)
    }

    .premium-navbar .basket-link:hover {
        background: linear-gradient(135deg, rgba(255, 215, 90, .25), rgba(255, 215, 90, .15));
        border-color: rgba(255, 215, 90, .6);
        box-shadow: 0 4px 15px rgba(255, 215, 90, .3)
    }

    .language-switcher .btn {
        padding: .375rem .75rem;
        font-size: .875rem;
        border-radius: .5rem;
        line-height: 1.5
    }

    .language-switcher .dropdown-item:hover {
        background-color: #343a40;
        color: #ffc107 !important
    }

    @media(max-width:991px) {
        .premium-navbar .nav-link {
            padding: .75rem 1rem;
            margin: .25rem 0
        }

        .premium-navbar .language-switcher {
            width: fit-content;
            margin-top: .5rem !important
        }
    }
</style>