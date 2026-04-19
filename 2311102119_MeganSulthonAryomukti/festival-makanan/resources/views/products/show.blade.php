@extends('layouts.app')

@section('content')
    <h1>Detail Produk</h1>

    <div class="product-detail">
        <h2>{{ $product->nama_produk }}</h2>
        <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
        <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
        <p><strong>Stok:</strong> {{ $product->stok }}</p>
        <p><strong>Status:</strong> {{ $product->status }}</p>
        <p><strong>Deskripsi:</strong> {{ $product->deskripsi }}</p>

        @if($product->gambar)
            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" width="300">
        @endif
    </div>
@endsection