<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #121212;
            color: white;
        }
        .card {
            background: #1e1e1e;
            border-radius: 15px;
        }
        input, textarea {
            background: #2a2a2a !important;
            color: white !important;
            border: 1px solid #555 !important;
        }
        ::placeholder {
            color: #aaa !important;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="mb-3">Tambah Menu Baru</h3>

        <form action="/produk" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi produk"></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>