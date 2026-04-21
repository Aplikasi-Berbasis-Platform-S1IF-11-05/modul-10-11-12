<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
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
        <h3 class="mb-3">Edit Menu</h3>

        <form action="/produk/{{ $produk->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>