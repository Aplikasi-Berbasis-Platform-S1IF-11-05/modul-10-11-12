<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Festival Makanan Ngawi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --bg-light: #fdfaf6;
            --primary: #c0392b;
            --secondary: #e67e22;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: #2c3e50;
        }

        /* --- STYLING NAVBAR PREMIUM --- */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(0,0,0,0.04);
            box-shadow: 0 4px 30px rgba(0,0,0,0.02);
            padding: 12px 0;
            z-index: 1030;
        }
        
        .brand-icon {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(192, 57, 43, 0.25);
        }

        .navbar-brand {
            font-weight: 800;
            color: #2c3e50 !important;
            font-size: 1.25rem;
            letter-spacing: -0.3px;
        }

        .nav-link-custom {
            color: #6c757d;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 4px;
        }

        .nav-link-custom:hover {
            color: var(--primary);
            background-color: rgba(192, 57, 43, 0.05);
        }

        .nav-link-custom.active {
            color: var(--primary);
            background-color: rgba(192, 57, 43, 0.08);
        }

        /* --- STYLING PROFILE & NOTIFIKASI --- */
        .user-profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            object-fit: cover;
        }

        .notification-wrapper {
            position: relative;
            color: #6c757d;
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .notification-wrapper:hover { color: var(--primary); }

        .notification-dot {
            position: absolute;
            top: 2px;
            right: 0px;
            width: 10px;
            height: 10px;
            background-color: #e74c3c;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        /* --- STYLING ALERT (FLASH MESSAGE) --- */
        .custom-alert {
            background-color: #f0f9f4;
            border: 1px solid #d1e7dd;
            border-radius: 16px;
            color: #0f5132;
            box-shadow: 0 4px 15px rgba(15, 81, 50, 0.05);
        }
    </style>
</head>
<body>

{{-- NAVBAR SECTION --}}
<nav class="navbar navbar-expand-lg sticky-top navbar-custom mb-5">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <div class="brand-icon me-3">
                <i class="bi bi-shop fs-5"></i>
            </div>
            <span>Mas Jakobi</span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list fs-1 text-dark"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->is('/') ? 'active' : '' }}" href="/"><i class="bi bi-house-door me-2"></i>Halaman Publik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->is('produk*') ? 'active' : '' }}" href="/produk"><i class="bi bi-box-seam me-2"></i>Kelola Produk</a>
                </li>
            </ul>
            
            <div class="d-flex align-items-center mt-3 mt-lg-0 border-start ps-lg-4 border-light">
                <div class="notification-wrapper me-4">
                    <i class="bi bi-bell"></i>
                    <span class="notification-dot"></span>
                </div>
                
                <div class="d-flex align-items-center dropdown" style="cursor: pointer;" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=Admin+Jakobi&background=fdfaf6&color=c0392b&bold=true" alt="Admin" class="user-profile-img me-2">
                    <div class="d-none d-lg-block me-2">
                        <p class="mb-0 fw-bold lh-1" style="font-size: 0.9rem; color: #2c3e50;">Admin Jakobi</p>
                        <span class="text-muted" style="font-size: 0.75rem;">Manajer Restoran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- MAIN CONTENT SECTION --}}
<div class="container">
    {{-- Flash Message Premium --}}
    @if(session('success'))
        <div class="alert custom-alert alert-dismissible fade show d-flex align-items-center p-3 mb-4" role="alert">
            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                <i class="bi bi-check-lg"></i>
            </div>
            <div class="fw-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Konten Dinamis --}}
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>