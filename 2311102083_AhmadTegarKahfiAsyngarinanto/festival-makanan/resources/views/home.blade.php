@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1>Festival Makanan Mas Jakobi</h1>
        <p>Selamat datang di festival makanan restoran Mas Jakobi</p>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="height:220px;object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p class="text-muted">Kategori: {{ $product->category ?? '-' }}</p>
                        <p>{{ $product->description }}</p>
                        <p><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <p>Stok: {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada produk yang ditampilkan.</p>
        @endforelse
    </div>
@endsection
