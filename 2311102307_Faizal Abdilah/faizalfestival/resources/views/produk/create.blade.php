<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f7fa;">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-3 text-primary">Tambah Produk</h3>

        <form action="/produk" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>