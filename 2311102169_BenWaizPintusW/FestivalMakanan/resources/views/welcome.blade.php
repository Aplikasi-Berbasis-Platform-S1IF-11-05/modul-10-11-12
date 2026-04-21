<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Ngawi | Restoran Mas Jakobi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfdfd;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
        }

        /* Card Customization */
        .card-food {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fff;
        }

        .card-food:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .price-tag {
            font-size: 1.25rem;
            font-weight: 700;
            color: #d9534f;
        }

        .badge-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .btn-order {
            background-color: #ff4d4d;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-order:hover {
            background-color: #e60000;
            color: white;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            width: 80px;
            height: 3px;
            background: #ff4d4d;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger" href="#">MAS JAKOBI <span class="text-dark">RESTORAN</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-uppercase small fw-bold">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Menu Festival</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang Ngawi Barat</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <span class="badge bg-danger mb-3 px-3 py-2">PROGRAM KERJA NGAWI BARAT</span>
            <h1>Festival Makanan Digital 2026</h1>
            <p class="lead mb-4">Mendukung 19.000 Lapangan Pekerjaan melalui Digitalisasi UMKM</p>
            <a href="#menu" class="btn btn-light btn-lg px-5 fw-bold shadow">Lihat Menu</a>
        </div>
    </header>

    <main id="menu" class="container my-5 py-5">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Menu Spesial Mas Jakobi</h2>
            <p class="text-muted">Produk unggulan yang didanai langsung oleh Jendral Ladesh untuk rakyat Ngawi.</p>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 card-food shadow-sm">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="{{ $product->name }}">
                        <span class="badge-category shadow-sm"><i class="bi bi-star-fill text-warning"></i> Terpopuler</span>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="card-title mb-0 fw-bold">{{ $product->name }}</h4>
                        </div>
                        <p class="card-text text-muted small mb-4">
                            {{ Str::limit($product->description, 100) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            <button class="btn btn-order btn-primary text-white">
                                <i class="bi bi-cart-plus me-2"></i>Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk yang ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <h5 class="fw-bold text-danger">Digitalisasi Ngawi Barat</h5>
                    <p class="small text-secondary">Proyek strategis untuk menciptakan 19.000 lapangan pekerjaan baru melalui integrasi teknologi restoran.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small mb-0">&copy; 2026 Restoran Mas Jakobi. Didanai oleh Jendral Ladesh.</p>
                    <p class="x-small text-secondary mt-1" style="font-size: 0.7rem;">Built with Laravel & Bootstrap for Mas Paris.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>