<nav class="navbar navbar-expand-lg admin-navbar shadow-sm">
    <div class="container-xxl">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">MyCafe</a>

        <!-- Toggler (Mobil) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Orders</a>
                </li>
                <!-- Logout Form -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Navbar umumy stili */
    .admin-navbar {
        background-color: #1a1a1a;
        border-bottom: 1px solid #333;
        font-family: 'Poppins', sans-serif;
        padding: 0.5rem 1rem;
    }

    /* Brand */
    .admin-navbar .navbar-brand {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.45rem;
        transition: color 0.3s ease;
    }

    .admin-navbar .navbar-brand:hover {
        color: #fff7c2;
        text-shadow: 0 0 6px rgba(255, 215, 90, 0.6);
    }

    /* Nav Links */
    .admin-navbar .nav-link {
        color: #ffd95a;
        font-weight: 500;
        margin-left: 1rem;
        transition: color 0.3s ease;
    }

    .admin-navbar .nav-link:hover {
        color: #fff7c2;
        text-shadow: 0 0 4px rgba(255, 215, 90, 0.5);
    }

    /* Logout düwmesi */
    .admin-navbar .logout-btn {
        color: #ff4c4c !important;
        font-weight: 600;
        padding: 0;
        border: none;
        background: none;
        transition: color 0.3s ease;
    }

    .admin-navbar .logout-btn:hover {
        color: #ff1a1a !important;
        text-shadow: 0 0 4px rgba(255, 0, 0, 0.6);
    }

    /* Navbar toggler (mobil üçin) */
    .navbar-toggler {
        border-color: #ffd95a;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 217, 90, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>