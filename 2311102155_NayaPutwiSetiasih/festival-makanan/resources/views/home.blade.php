<!DOCTYPE html>

<html>
<head>
    <title>Festival Makanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f2ff;
            margin: 0;
            padding: 0;
        }

    header {
        background-color: #3399ff;
        color: white;
        padding: 15px;
        text-align: center;
    }

    .container {
        padding: 20px;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn {
        background-color: #3399ff;
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        text-decoration: none;
    }

    .btn:hover {
        background-color: #267acc;
    }

    .card {
        background: white;
        border-radius: 10px;
        padding: 15px;
        margin-top: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .harga {
        color: #3399ff;
        font-weight: bold;
    }

    .aksi {
        margin-top: 10px;
    }

    .edit {
        color: #3399ff;
        text-decoration: none;
        margin-right: 10px;
    }

    .delete {
        color: red;
        text-decoration: none;
    }

    .empty {
        text-align: center;
        margin-top: 50px;
        color: gray;
    }
</style>

</head>
<body>

<header>
    <h1>Festival Makanan Mas Jakobi 🍜</h1>
</header>

<div class="container">

<div class="top-bar">
    <h2>Daftar Produk</h2>
    <a href="/create" class="btn">+ Tambah Produk</a>
</div>

@if($products->count() > 0)
    @foreach($products as $p)
        <div class="card">
            <h3>{{ $p->nama }}</h3>
            <p class="harga">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
            <p>{{ $p->deskripsi }}</p>

        <div class="aksi">
            <a href="/edit/{{ $p->id }}">Edit</a> |
            <a href="/delete/{{ $p->id }}" onclick="return confirm('Yakin mau hapus?')">Delete</a>
        </div>
        </div>
    @endforeach
@else
    <div class="empty">
        <p>Belum ada produk 😢</p>
    </div>
@endif

</div>

</body>
</html>
