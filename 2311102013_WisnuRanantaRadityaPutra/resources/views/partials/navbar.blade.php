<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="bi bi-egg-fried text-primary me-2"></i>Ngawi<span>Fest.</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link px-3 btn btn-light rounded-pill {{ $halaman == 'depan' ? 'bg-primary text-white active' : '' }}" href="{{ url('/') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="nav-link px-3 btn btn-light rounded-pill {{ $halaman == 'manajemen' ? 'bg-primary text-white active' : '' }}" href="{{ route('products.index') }}">
                        Admin Panel
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>