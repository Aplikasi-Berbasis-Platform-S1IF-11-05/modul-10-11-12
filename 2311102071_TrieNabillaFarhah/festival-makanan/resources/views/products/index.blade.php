@extends('layouts.app')

@section('content')

<style>
    .hero {
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 80px;

        background: radial-gradient(circle at top left, #f8e8d8, #e4c4a3 60%, #d8b38c);
    }

    .hero-text {
        max-width: 500px;
    }

    .hero-text h1 {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .hero-text p {
        font-size: 16px;
        color: #5c4a3d;
        margin-bottom: 25px;
    }

    .btn-dark {
        padding: 12px 22px;
        border-radius: 25px;
        background: #2d1e17;
        color: white;
        display: inline-block;
    }

    .hero img {
        width: 400px;
        border-radius: 20px;
    }

    .section {
        padding: 60px 80px;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
    }

    .card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        transition: 0.2s;
    }

    .card:hover {
        transform: translateY(-6px);
    }

    .price {
        font-weight: bold;
        margin: 10px 0;
    }

    .actions a {
        margin-right: 10px;
        font-size: 14px;
    }

    .delete-btn {
        border: none;
        background: #e84118;
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
    }
</style>

<!-- HERO FULL -->
<div class="hero">
    <div class="hero-text">
        <h1>Festival Makanan Mas Jakobi</h1>
        <p>Menghadirkan deretan hidangan pilihan yang memadukan bahan baku premium dengan teknik memasak autentik. Temukan pengalaman kuliner terbaik yang dirancang khusus untuk memuaskan selera Anda.</p>

        <div class="buttons">
    <a href="/products/create" class="btn-dark">Tambah Produk</a>
    <a href="/menu" class="btn-outline">Lihat Menu</a>
</div>
    </div>

    <img src="{{ asset('image/ayam.png') }}">
</div>


@endsection