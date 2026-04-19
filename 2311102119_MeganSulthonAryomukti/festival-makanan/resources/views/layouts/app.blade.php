<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Mas Jakobi</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; }
        body { margin: 0; background: #f7f7f7; color: #222; }
        .navbar {
            background: #8b0000;
            color: white;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 16px;
            font-weight: bold;
        }
        .container { width: 90%; max-width: 1100px; margin: 24px auto; }
        .hero {
            background: linear-gradient(135deg, #ffcc70, #ff8c42);
            padding: 32px;
            border-radius: 12px;
            margin-bottom: 24px;
        }
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }
        .card-body { padding: 16px; }
        .price { color: #8b0000; font-weight: bold; }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #8b0000;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
        .btn-secondary { background: #444; }
        .btn-warning { background: #d97706; }
        .btn-danger { background: #dc2626; }
        .form-card, .table-wrapper, .empty, .product-detail {
            background: white;
            padding: 24px;
            border-radius: 12px;
        }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        table { width: 100%; border-collapse: collapse; }
        table th, table td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div><strong>Festival Makanan Mas Jakobi</strong></div>
        <div>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('products.index') }}">Kelola Produk</a>
            <a href="{{ route('products.create') }}">Tambah Produk</a>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>