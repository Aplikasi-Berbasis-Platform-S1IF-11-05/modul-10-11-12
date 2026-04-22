<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restoran Digital - Menu Kami</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .hero { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://plus.unsplash.com/premium_photo-1673108852141-e8c3c22a4a22?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; height: 60vh; }
        .card-img-top { height: 200px; object-fit: cover; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Restoran Digital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
            </ul>
        </div> -->
    </div>
</nav>

<!-- Hero -->
<section class="hero d-flex align-items-center text-white">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Selamat Datang di Restoran Kami</h1>
        <p class="lead">Nikmati menu terbaik dengan harga terjangkau</p>
        <a href="#menu" class="btn btn-warning btn-lg">Lihat Menu</a>
    </div>
</section>

<!-- Produk / Menu -->
<section id="menu" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Menu Restoran</h2>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if($product->gambar)
                            <img src="{{ $product->gambar }}" class="card-img-top" alt="{{ $product->nama_produk }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title">{{ $product->nama_produk }}</h5>
                                @if($product->kategori)
                                    <span class="badge bg-success">{{ $product->kategori }}</span>
                                @endif
                            </div>
                            <p class="card-text text-muted flex-grow-1">{{ $product->deskripsi }}</p>
                            <div class="d-flex justify-content-between align-items-end mt-auto">
                                <h4 class="text-success fw-bold mb-0">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </h4>
                                <button class="btn btn-outline-primary btn-sm">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada produk.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4 text-center">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Restoran Digital - Digitalisasi Menu</p>
    </div>
</footer>

</body>
</html>