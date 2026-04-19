<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Mas Jakobi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7f6;
            color: #2d3436;
        }

        /* Hero Section */
        .hero-header {
            background: linear-gradient(135deg, #1e9600, #fff200, #ff0000); /* Tema Merah Putih/Hijau Segar */
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: white;
            padding: 60px 0;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Card Styling */
        .card-product {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .card-product:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        .img-container {
            position: relative;
            overflow: hidden;
        }

        .card-product img {
            transition: transform 0.5s ease;
            height: 200px;
            object-fit: cover;
        }

        .card-product:hover img {
            transform: scale(1.1);
        }

        .badge-kategori {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #2d3436;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* Buttons Custom */
        .btn-custom {
            border-radius: 12px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-add {
            background: #ffffff;
            color: #1e9600;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-add:hover {
            transform: scale(1.05);
            background: #f8f9fa;
        }

        .price-text {
            color: #2ecc71;
            font-size: 1.25rem;
            font-weight: 800;
        }

        .action-btns {
            opacity: 0.9;
            transition: opacity 0.3s;
        }

        .card-product:hover .action-btns {
            opacity: 1;
        }
    </style>
</head>
<body>

    <header class="hero-header text-center animate__animated animate__fadeInDown">
        <div class="container">
            <h1 class="display-5 fw-bold mb-2">Festival Makanan Restoran Mas Jakobi</h1>
            <p class="opacity-75 mb-4">Mendukung Digitalisasi & 19 Ribu Lapangan Kerja di Ngawi Timur</p>
            <a href="{{ route('products.create') }}" class="btn btn-add">
                <i class="bi bi-plus-circle-fill me-2"></i> Tambah Produk
            </a>
        </div>
    </header>

    <div class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__headShake" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 animate__animated animate__zoomIn">
                <div class="card h-100 card-product">
                    <div class="img-container">
                        <img src="{{ $product->gambar ?? 'https://via.placeholder.com/400x300?text=Menu+Mas+Jakobi' }}" 
                             alt="{{ $product->nama_produk }}" class="card-img-top">
                        <span class="badge-kategori shadow-sm">{{ $product->kategori }}</span>
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-1">{{ $product->nama_produk }}</h5>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="price-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            <small class="text-muted"><i class="bi bi-box-seam"></i> Stok: {{ $product->stok }}</small>
                        </div>
                        <p class="card-text text-muted small mb-4">
                            {{ Str::limit($product->deskripsi, 80) }}
                        </p>

                        <div class="mt-auto action-btns">
                            <div class="btn-group w-100 shadow-sm">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm" 
                                        onclick="if(confirm('Yakin ingin menghapus ini?')) document.getElementById('delete-form-{{ $product->id }}').submit();">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="text-center py-4 text-muted border-top bg-white">
        <small>&copy; 2026 Restoran Mas Jakobi. Didanai oleh Jendral Ladesh - Ngawi Barat Digital Initiative.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>