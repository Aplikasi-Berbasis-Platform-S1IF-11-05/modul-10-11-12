<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f7fa;">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-3 text-warning">Edit Produk</h3>

        <form action="/produk/{{ $produk->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>