<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Makanan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #0f172a, #1e293b);
            border-bottom: 1px solid #334155;
        }

        .navbar-brand {
            color: #f1f5f9;
            font-weight: 600;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1e293b, #312e81, #7c3aed);
            padding: 80px 20px;
            text-align: center;
        }

        /* Judul Gradient */
        .title {
            font-size: 42px;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #cbd5f5;
            margin-top: 10px;
        }

        /* Card */
        .card {
            background: #1e293b;
            border-radius: 18px;
            border: none;
            overflow: hidden;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        /* Gambar */
        .product-img {
            height: 140px;
            object-fit: cover;
            border-bottom: 1px solid #334155;
        }

        /* Nama produk (PUTIH FIX) */
        .card h6 {
            color: #f8fafc;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Harga */
        .price {
            padding: 5px 12px;
            border-radius: 10px;
            font-size: 13px;
            color: white;
            background: linear-gradient(45deg, #3b82f6, #ec4899);
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        /* Tombol */
        .btn-add {
            background: linear-gradient(45deg, #22c55e, #06b6d4);
            border: none;
            color: white;
        }

        .btn-delete {
            background: linear-gradient(45deg, #ef4444, #f97316);
            border: none;
            color: white;
        }

        .btn-add:hover,
        .btn-delete:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Festival Makanan</a>
        <a href="/create" class="btn btn-add btn-sm">Tambah Produk</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <h1 class="title">Festival Kuliner Nusantara</h1>
    <p class="subtitle">Menyajikan berbagai pilihan menu terbaik</p>
</div>

<!-- CONTENT -->
<div class="container mt-5">
    <div class="row">

        @forelse($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow">

                @if($p->image)
                    <img src="/images/{{ $p->image }}" class="product-img">
                @else
                    <img src="https://via.placeholder.com/300" class="product-img">
                @endif

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">{{ $p->name }}</h6>
                        <span class="price">Rp {{ number_format($p->price) }}</span>
                    </div>

                    <p class="text-muted mt-2">{{ $p->description }}</p>

                    <div class="d-flex justify-content-end mt-3">
                        <a href="/delete/{{ $p->id }}"
                           onclick="return confirm('Hapus produk?')"
                           class="btn btn-delete btn-sm">
                           Hapus
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <div class="text-center mt-5">
            <h5>Belum ada produk</h5>
        </div>
        @endforelse

    </div>
</div>

</body>
</html>