<nav class="navbar navbar-expand-lg navbar-dark shadow-lg">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold text-warning fs-3" href="{{ route('admin.dashboard') }}">
            Admin Panel
        </a>

        <button class="navbar-toggler border-warning" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        <a class="nav-link text-warning px-3 py-2 rounded transition-all" href="{{ route('admin.categories.index') }}">
                            Categories
                        </a>
                        <a class="nav-link text-warning px-3 py-2 rounded transition-all" href="{{ route('admin.products.index') }}">
                            Products
                        </a>
                    </ul>
                </li>
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Customers
                    </a>
                    <ul class="dropdown-menu">
                        <a class="nav-link text-warning px-3 py-2 rounded transition-all" href="{{ route('admin.customers.index') }}">
                            Customers
                        </a>
                        <a class="nav-link text-warning px-3 py-2 rounded transition-all" href="{{ route('admin.orders.index') }}">
                            Orders
                        </a>
                    </ul>
                </li>
                <li class="nav-item ms-lg-2">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger px-3 py-2 fw-semibold logout-btn">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-dark {
        background: #000000 !important;
        border-bottom: 1px solid #ffc107;
    }

    .navbar-brand:hover {
        color: #ffd95a !important;
    }

    .nav-link:hover {
        color: #ffd95a !important;
    }

    .logout-btn:hover {
        background-color: #dc3545 !important;
        color: #ffffff !important;
    }

    @media (max-width: 991px) {
        .nav-link {
            margin: 0.25rem 0;
            padding: 0.75rem 1rem !important;
        }

        .logout-btn {
            width: 100%;
            margin-top: 0.5rem;
        }
    }

    .navbar-dark {
        background: #000000 !important;
        border-bottom: 2px solid #ffc107;
    }

    .navbar-brand {
        transition: all 0.3s ease;
        text-shadow: 2px 2px 4px rgba(255, 193, 7, 0.3);
    }

    .navbar-brand:hover {
        color: #ffd95a !important;
        transform: translateY(-2px);
    }

    .nav-link {
        position: relative;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .nav-link:hover {
        background-color: rgba(255, 193, 7, 0.15);
        color: #ffd95a !important;
        transform: translateX(5px);
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: #ffc107;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after {
        width: 80%;
    }

    .logout-btn {
        transition: all 0.3s ease;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
    }

    .logout-btn:hover {
        background-color: #dc3545 !important;
        color: #ffffff !important;
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.4);
    }

    .navbar-toggler {
        border: 2px solid #ffc107;
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        background-color: rgba(255, 193, 7, 0.1);
        transform: rotate(90deg);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,193,7,1)' stroke-width='2.5' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }


    @media (max-width: 991px) {
        .nav-link {
            margin: 0.25rem 0;
            padding: 0.75rem 1rem !important;
        }

        .logout-btn {
            width: 100%;
            margin-top: 0.5rem;
        }
    }

    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.6) !important;
    }

    .transition-all {
        transition: all 0.3s ease;
    }
</style>