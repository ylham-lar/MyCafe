<nav class="navbar navbar-expand-lg navbar-dark premium-navbar shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">MyCafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.categories.products', $category->id) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .premium-navbar {
        background: linear-gradient(180deg, rgba(17, 17, 17, 0.95), rgba(26, 26, 26, 0.95), rgba(34, 34, 34, 0.95));
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

    .premium-navbar .navbar-toggler {
        border: 1px solid rgba(255, 193, 7, 0.6);
    }
</style>