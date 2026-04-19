@extends('layouts.app')

@section('content')
    <div class="hero">
        <h1>Festival Makanan Restoran Mas Jakobi</h1>
        <p>Selamat datang di website festival makanan. Di sini ditampilkan produk-produk unggulan restoran Mas Jakobi.</p>
        <a href="{{ route('products.index') }}" class="btn">Kelola Produk</a>
    </div>

    @if($products->count() > 0)
        <div class="card-grid">
            @foreach($products as $product)
                <div class="card">
                    @if($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=No+Image" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h3>{{ $product->nama_produk }}</h3>
                        <p class="price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <p>{{ $product->deskripsi }}</p>
                        <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
                        <p><strong>Stok:</strong> {{ $product->stok }}</p>
                        <p><strong>Status:</strong> {{ $product->status }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty">
            <h3>Belum ada produk.</h3>
            <p>Silakan tambahkan produk terlebih dahulu.</p>
        </div>
    @endif
@endsection