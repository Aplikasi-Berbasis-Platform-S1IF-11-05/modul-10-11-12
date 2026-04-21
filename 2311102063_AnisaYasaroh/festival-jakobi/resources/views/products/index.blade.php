@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(to right, #74ebd5, #6a9ff8);
    }

    .header-box {
        background: rgba(255,255,255,0.9);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .product-card {
        background: white;
        border-radius: 20px;
        padding: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: 0.3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 15px;
    }

    .btn-main {
        background: linear-gradient(to right, #36d1dc, #5b86e5);
        color: white;
        border-radius: 20px;
        border: none;
    }

    .btn-edit {
        border-radius: 15px;
    }

    .btn-delete {
        border-radius: 15px;
        color: red;
        border: 1px solid red;
    }
</style>

<div class="container">

    <!-- HEADER -->
    <div class="header-box mb-4">
        <h2 class="fw-bold">Kelola Produk</h2>
        <p class="text-muted">Daftar menu makanan</p>
    </div>

    <!-- BUTTON -->
    <div class="d-flex justify-content-end mb-3">
        <a href="/products/create" class="btn btn-main">
            + Tambah Produk
        </a>
    </div>

    <!-- LIST -->
    <div class="row">
    @forelse($products as $p)
    <div class="col-md-4 mb-4">

        <div class="product-card text-center">

            @if($p->image)
                <img src="{{ asset('storage/'.$p->image) }}" class="product-img mb-2">
            @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" class="product-img mb-2">
            @endif

            <h5 class="mt-2">{{ $p->name }}</h5>
            <p class="text-muted small">{{ $p->description }}</p>
            <h6 class="fw-bold">Rp {{ number_format($p->price) }}</h6>

            <div class="mt-2">
                <a href="/products/{{ $p->id }}/edit" class="btn btn-edit btn-sm">Edit</a>

                <form action="/products/{{ $p->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete btn-sm"
                        onclick="return confirm('Yakin hapus produk?')">
                        Hapus
                    </button>
                </form>
            </div>

        </div>

    </div>
    @empty
        <p class="text-center text-white">Belum ada produk</p>
    @endforelse
    </div>

</div>

@endsection 