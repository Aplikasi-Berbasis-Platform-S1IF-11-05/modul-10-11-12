<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-4 fw-bold">Festival Makanan Ngawi</h1>
    <p class="text-muted">Digitalisasi UMKM oleh Jakobi Resto & Jendral Ladesh</p>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card shadow-lg">
            <img src="{{ asset('images/'.$product->image_url) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
                <h5 class="fw-bold">{{ $product->name }}</h5>
                <p class="text-muted small">{{ $product->description }}</p>
                <div class="price-tag mb-3">Rp {{ number_format($product->price) }}</div>
                <button class="btn btn-dark w-100 rounded-pill">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection