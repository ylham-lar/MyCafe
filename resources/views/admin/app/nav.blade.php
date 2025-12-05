<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold text-warning fs-4" href="{{ route('admin.dashboard') }}">Admin Panel</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-warning fs-5" href="{{ route('admin.categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fs-5" href="">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fs-5" href="{{ route('admin.customers.index') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fs-5" href="">Orders</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link fs-5 p-0 text-danger logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-brand:hover {
        color: #fff7c2 !important;
        text-decoration: none;
    }

    .logout-btn:hover {
        color: #ff4c4c !important;
        text-decoration: none;
    }

    .navbar-toggler {
        border-color: #ffd95a;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,217,90,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>