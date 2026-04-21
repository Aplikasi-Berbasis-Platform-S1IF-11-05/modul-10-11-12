<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f8f9fa;">

<div class="container mt-5">
    <h1 class="text-center mb-4">🍜 Festival Makanan Mas Jakobi</h1>

    <div class="text-end mb-3">
        <a href="/produk/create" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    <div class="row">
        @foreach($produk as $p)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama }}</h5>
                    <h6 class="text-success">Rp {{ number_format($p->harga) }}</h6>
                    <p class="card-text">{{ $p->deskripsi }}</p>

                    <a href="/produk/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                    <form action="/produk/{{ $p->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>