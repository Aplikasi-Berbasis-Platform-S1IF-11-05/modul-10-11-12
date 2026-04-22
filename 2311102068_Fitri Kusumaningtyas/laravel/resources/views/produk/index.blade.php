<!DOCTYPE html>
<html>
<head>
    <title>Festival Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand">Festival Makanan Ngawi</span>
    </div>
</nav>

<div class="container mt-4">
    <h1 class="text-center mb-4">Festival Makanan Mas Jakobi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="/tambah" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <div class="row">
        @foreach($produk as $p)
        <div class="col-md-4">
            <div class="card mb-4 shadow">

                @if($p->gambar)
                    <img src="{{ route('produk.gambar', $p->id) }}"
                         alt="{{ $p->nama_produk }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @else
                    <img src="https://placehold.co/400x200?text=No+Image"
                         alt="No Image"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                    <p class="card-text">{{ $p->deskripsi }}</p>
                    <h6 class="text-success">Rp {{ number_format($p->harga, 0, ',', '.') }}</h6>

                    <div class="d-flex gap-2 mt-2">
                        <a href="/produk/{{ $p->id }}/edit" class="btn btn-warning btn-sm">✏️ Edit</a>

                        <form action="/produk/{{ $p->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus produk ini?')">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>