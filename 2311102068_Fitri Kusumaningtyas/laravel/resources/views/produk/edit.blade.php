<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4" style="max-width:600px">
    <h2 class="mb-4">Edit Produk</h2>

    <form action="/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" 
                   value="{{ $produk->nama_produk }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" 
                   value="{{ $produk->harga }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar (kosongkan jika tidak diganti)</label>
            @if($produk->gambar)
                <div class="mb-2">
                    <img src="{{ route('produk.gambar', $produk->id) }}" 
                         style="height:100px; object-fit:cover;" class="rounded">
                </div>
            @endif
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="/" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>