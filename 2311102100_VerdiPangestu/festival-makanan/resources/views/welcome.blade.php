<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Ngawi – Restoran Mas Jakobi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #c0392b;
            --secondary: #e67e22;
            --bg-light: #fdfaf6;
            --text-dark: #2c3e50;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: var(--text-dark);
        }

        /* Navbar Styling */
        .navbar {
            background: rgba(253, 250, 246, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 15px 0;
        }
        .navbar-brand {
            font-weight: 800;
            color: var(--primary) !important;
            letter-spacing: -0.5px;
            font-size: 1.25rem;
        }
        .btn-nav {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.9rem;
        }
        .btn-nav:hover {
            background-color: #a93226;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(192, 57, 43, 0.2);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #c0392b 0%, #d35400 100%);
            color: white;
            padding: 90px 20px;
            text-align: center;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            box-shadow: 0 10px 30px rgba(192, 57, 43, 0.2);
            margin-bottom: 50px;
        }
        .hero h1 { 
            font-size: 3rem; 
            font-weight: 800; 
            letter-spacing: -1px;
            margin-bottom: 15px;
        }
        .hero p { 
            font-size: 1.15rem; 
            font-weight: 400;
            opacity: 0.95; 
            margin-bottom: 0;
        }

        /* Section Title */
        .section-title {
            font-weight: 800;
            color: var(--text-dark);
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        /* Cards */
        .card {
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            background: white;
            overflow: hidden;
            cursor: pointer;
        }
        .card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
            background: #f4ede1;
        }
        .placeholder-img {
            height: 220px;
            background: linear-gradient(135deg, #f4ede1, #e8dfd1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }
        
        /* Card Content */
        .card-body {
            padding: 24px;
        }
        .badge-kategori {
            background-color: rgba(230, 126, 34, 0.1);
            color: var(--secondary);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .card-title {
            font-weight: 700;
            font-size: 1.25rem;
            margin-top: 15px;
            margin-bottom: 10px;
            color: var(--text-dark);
        }
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }
        .harga { 
            color: var(--primary); 
            font-size: 1.35rem; 
            font-weight: 800; 
            margin-top: 15px;
            margin-bottom: 0;
        }

        /* Footer */
        footer {
            background: #1a1a1a;
            color: #a0a0a0;
            padding: 50px 20px;
            text-align: center;
            margin-top: 60px;
        }
        footer strong { color: white; }
    </style>
</head>
<body>

{{-- NAVBAR SECTION --}}
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-shop me-2"></i> Mas Jakobi
        </a>
        
        {{-- Tombol Kelola Produk di Navbar --}}
        <div>
            <a href="{{ url('/produk') }}" class="btn btn-nav text-decoration-none d-flex align-items-center">
                <i class="bi bi-gear-fill me-2"></i> Kelola Produk
            </a>
        </div>
    </div>
</nav>

{{-- HERO SECTION --}}
<section class="hero">
    <div class="container">
        <h1>Festival Makanan Ngawi</h1>
        <p class="mb-2">Menyambut 19.000 Lapangan Pekerjaan Baru – Program Digitalisasi Ngawi Barat</p>
        <p><em>Dipersembahkan oleh <strong>Restoran Mas Jakobi</strong></em></p>
    </div>
</section>

{{-- PRODUK SECTION --}}
<section class="container mb-5">
    <div class="text-center mb-5">
        <h2 class="section-title">Menu Pilihan Kami</h2>
        <p class="text-muted">Semua produk segar, dibuat dengan cinta dari dapur Mas Jakobi</p>
    </div>

    <div class="row g-4">
        @forelse($produks as $produk)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 d-flex flex-column" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $produk->id }}">
                
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                         class="card-img-top" alt="{{ $produk->nama_produk }}">
                @else
                    <div class="placeholder-img">🍽️</div>
                @endif

                <div class="card-body flex-grow-1">
                    <div>
                        <span class="badge-kategori">{{ $produk->kategori }}</span>
                    </div>
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                    <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($produk->deskripsi, 60) }}</p>
                    <p class="harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                </div>

                <div class="card-footer bg-white border-0 px-4 pb-4 pt-0 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <span class="text-success small fw-bold">Tersedia</span>
                    </div>
                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium">Detail</button>
                </div>
            </div>
        </div>

        {{-- MODAL DETAIL PRODUK --}}
        <div class="modal fade" id="modalDetail{{ $produk->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $produk->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 24px; border: none; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                    
                    @if($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid" style="height: 280px; object-fit: cover; width: 100%;" alt="{{ $produk->nama_produk }}">
                    @else
                        <div class="placeholder-img" style="height: 280px; font-size: 5rem;">🍽️</div>
                    @endif
                    
                    <div class="modal-body p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge-kategori">{{ $produk->kategori }}</span>
                            <span class="text-success small fw-bold"><i class="bi bi-check-circle-fill me-1"></i> Tersedia</span>
                        </div>
                        
                        <h4 class="fw-bold mb-1" style="color: #2c3e50;">{{ $produk->nama_produk }}</h4>
                        <p class="harga fs-4 mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        
                        <hr class="border-light mb-4">
                        
                        <h6 class="fw-bold mb-2" style="color: #2c3e50;">Deskripsi Makanan</h6>
                        <p class="text-muted" style="line-height: 1.6; font-size: 0.95rem;">{{ $produk->deskripsi }}</p>
                    </div>
                    
                    <div class="modal-footer border-0 px-4 pb-4 px-md-5 pb-md-5 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill w-100 py-2 fw-semibold" data-bs-dismiss="modal">Tutup Detail</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center text-muted py-5" style="background: white; border-radius: 20px; border: 1px dashed #ccc;">
                <i class="bi bi-inbox fs-1 mb-3 text-secondary"></i>
                <h5>Belum ada produk</h5>
                <p>Silakan tambahkan produk baru melalui halaman kelola.</p>
            </div>
        </div>
        @endforelse
    </div>
</section>

{{-- FOOTER SECTION --}}
<footer>
    <div class="container">
        <h5 class="mb-3 text-white fw-bold">Restoran Mas Jakobi</h5>
        <p class="mb-1">Pusat Kuliner Ngawi Timur</p>
        <p class="small mb-0 opacity-75">Didukung oleh Program Digitalisasi Jendral Ladesh – Ngawi Barat</p>
        <hr class="border-secondary my-4">
        <p class="small mb-0">&copy; 2026 Festival Makanan Ngawi. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>