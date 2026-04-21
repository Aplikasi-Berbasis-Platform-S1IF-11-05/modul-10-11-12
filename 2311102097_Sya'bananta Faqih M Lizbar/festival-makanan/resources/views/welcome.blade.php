<!DOCTYPE html>
<html>
<head>
    <title>Festival Makanan</title>
</head>
<body>
    <h1>🍜 Festival Makanan Mas Jakobi</h1>

    <a href="/tambah">+ Tambah Produk</a>

    <hr>

    @foreach($products as $p)
    <h3>{{ $p->nama }}</h3>
    <p>Harga: Rp {{ $p->harga }}</p>
    <p>{{ $p->deskripsi }}</p>

    <a href="/edit/{{ $p->id }}">Edit</a> |
    <a href="/delete/{{ $p->id }}" onclick="return confirm('Yakin mau hapus?')">Delete</a>

    <hr>
    @endforeach
</body>
</html>