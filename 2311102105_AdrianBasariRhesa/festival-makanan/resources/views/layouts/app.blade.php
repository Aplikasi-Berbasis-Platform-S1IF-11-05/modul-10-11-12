<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(135deg, #d35400, #f39c12);
            color: white;
            padding: 70px 0;
        }
        .card-produk {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: 0.3s;
            height: 100%;
        }
        .card-produk:hover {
            transform: translateY(-5px);
        }
        .card-produk img {
            height: 220px;
            object-fit: cover;
        }
        .badge-status {
            font-size: 0.85rem;
        }
        .navbar-brand {
            font-weight: 700;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Festival Makanan</a>

            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">Beranda</a>
                <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">Kelola Produk</a>
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">Tambah Produk</a>
            </div>
        </div>
    </nav>

    @yield('content')

</body>
</html>