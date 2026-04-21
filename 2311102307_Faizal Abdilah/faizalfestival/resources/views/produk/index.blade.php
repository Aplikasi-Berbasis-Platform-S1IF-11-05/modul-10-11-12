<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }
        .card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .harga {
            background: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h1">🍽️ Festival Makanan</span>
        <a href="/produk/create" class="btn btn-light">+ Tambah</a>
    </div>
</nav>

<div class="container mt-4">

    <div class="row">
        @foreach($produk as $p)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm p-3 text-center">
                <img src="https://via.placeholder.com/200" class="img-fluid mb-3 rounded">

                <h5>{{ $p->nama }}</h5>

                <div class="harga mb-2">
                    Rp {{ number_format($p->harga) }}
                </div>

                <p class="text-muted">{{ $p->deskripsi }}</p>

                <div>
                    <a href="/produk/{{ $p->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                    <form action="/produk/{{ $p->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

</body>
</html>