@extends('layouts.app')

@section('content')
    <h2>Detail Produk</h2>

    <div class="card">
        <div class="card-body">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="200" class="mb-3">
            @endif

            <h4>{{ $product->name }}</h4>
            <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
            <p><strong>Stok:</strong> {{ $product->stock }}</p>
            <p><strong>Kategori:</strong> {{ $product->category }}</p>
            <p><strong>Status:</strong> {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
