<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #121212;
            color: white;
        }
        .card {
            background: #1e1e1e;
            border: none;
            border-radius: 15px;
        }
        .btn-custom {
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">🍔 Festival Kuliner Modern</h1>

    <div class="text-end mb-4">
        <a href="/produk/create" class="btn btn-success btn-custom">+ Tambah Menu</a>
    </div>

    @foreach($produk as $p)
    <div class="card mb-3 shadow">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <img src="https://via.placeholder.com/150" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4>{{ $p->nama }}</h4>
                    <h5 class="text-warning">Rp {{ number_format($p->harga) }}</h5>
                    <p>{{ $p->deskripsi }}</p>

                    <a href="/produk/{{ $p->id }}/edit" class="btn btn-outline-warning btn-sm btn-custom">Edit</a>

                    <form action="/produk/{{ $p->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm btn-custom">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

</body>
</html>