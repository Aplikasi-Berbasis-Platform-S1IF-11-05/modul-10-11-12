@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(to right, #74ebd5, #6a9ff8);
    }

    .hero-box {
        background: rgba(255,255,255,0.9);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .food-card {
        background: white;
        border-radius: 20px;
        padding: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: 0.3s;
    }

    .food-card:hover {
        transform: translateY(-5px);
    }

    .food-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 15px;
    }
</style>

<div class="container">

    <!-- HERO -->
    <div class="hero-box mb-5">
        <h2 class="fw-bold">Festival Makanan Jakobi</h2>
        <p class="text-muted">
            Temukan berbagai menu lezat dari UMKM terbaik.
        </p>
    </div>

    <!-- PRODUK -->
    <div class="row">

    @forelse($products as $p)
        <div class="col-md-4 mb-4">

            <div class="food-card">

                @if($p->image)
                    <img src="{{ asset('storage/'.$p->image) }}" class="food-img">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="food-img">
                @endif

                <h5 class="mt-2">{{ $p->name }}</h5>
                <p class="text-muted small">{{ $p->description }}</p>
                <b>Rp {{ number_format($p->price) }}</b>

            </div>

        </div>
    @empty
        <p class="text-center text-white">Belum ada produk</p>
    @endforelse

    </div>

</div>

@endsection