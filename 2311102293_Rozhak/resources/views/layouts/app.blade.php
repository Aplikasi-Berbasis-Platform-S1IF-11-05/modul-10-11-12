<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawonNgawiFest - @yield('title', 'Festival Makanan Ngawi')</title>
    <!-- Tipografi Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --v-bg: #fafafa;
            --v-surface: #ffffff;
            --v-border: #eaeaea;
            --v-text-main: #000000;
            --v-text-muted: #666666;
            --v-radius: 12px;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background-color: var(--v-bg);
            color: var(--v-text-main);
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar Glassmorphism */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: saturate(180%) blur(8px);
            border-bottom: 1px solid var(--v-border);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.05em;
            font-size: 1.25rem;
        }

        /* Styling Kartu */
        .v-card {
            background-color: var(--v-surface);
            border: 1px solid var(--v-border);
            border-radius: var(--v-radius);
            overflow: hidden;
            transition: all 0.2s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .v-card:hover {
            border-color: #ccc;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .v-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid var(--v-border);
        }
        .v-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Tipografi Konten Produk */
        .product-title {
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: -0.01em;
            margin-bottom: 0.5rem;
        }
        .product-desc {
            color: var(--v-text-muted);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        .product-price {
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: -0.03em;
        }

        /* Badge Kategori Minimalis */
        .v-badge {
            display: inline-block;
            font-size: 0.75rem;
            padding: 0.35em 0.8em;
            border-radius: 999px;
            background-color: var(--v-bg);
            border: 1px solid var(--v-border);
            color: var(--v-text-muted);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        /* Layout Bagian Footer */
        .footer-custom {
            border-top: 1px solid var(--v-border);
            padding: 2rem 0;
            margin-top: 5rem;
            color: var(--v-text-muted);
            font-size: 0.85rem;
        }

        /* Notifikasi Style */
        .v-alert {
            background: #fff;
            border: 1px solid var(--v-border);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            animation: slideIn 0.3s ease-out;
        }
        .v-alert-success {
            border-left: 4px solid #000;
        }
        .v-alert-error {
            border-left: 4px solid #ff0000;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand text-dark" href="{{ url('/') }}">PawonNgawiFest.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-medium" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link Panel Admin -->
                        <a class="nav-link text-muted" href="{{ route('products.index') }}">Admin Panel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Bagian Footer Aplikasi -->
    <footer class="footer-custom text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} PawonNgawiFest. Didukung oleh Jendral Ladesh.</p>
        </div>
    </footer>

    <!-- Library Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>