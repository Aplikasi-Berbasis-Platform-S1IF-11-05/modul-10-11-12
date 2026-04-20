@extends('layouts.app')

@section('title', 'Festival Kuliner Ngawi Timur')

@section('content')
    <section class="card" style="margin-bottom: 20px; overflow: hidden;">
        <div class="grid cols-2" style="align-items: center; gap: 18px;">
            <div>
                <p style="margin: 0; font-weight: 700; color: #9a3f17;">Program Digitalisasi UMKM Kuliner</p>
                <h1 style="margin: 8px 0 8px; font-size: clamp(1.8rem, 4.5vw, 3rem); line-height: 1.05;">
                    Festival Makanan Restoran Mas Jakobi
                </h1>
                <p class="help" style="font-size: 1rem; line-height: 1.6; margin-bottom: 18px;">
                    Selamat datang di etalase resmi produk kuliner dari Ngawi Timur. Halaman ini menampilkan daftar menu,
                    harga, deskripsi, dan informasi ketersediaan produk untuk mendukung transformasi digital usaha.
                </p>
                <div class="nav">
                    <a class="btn primary" href="{{ route('products.index') }}">Kelola Data Produk</a>
                </div>
            </div>
            <div class="card" style="background: linear-gradient(135deg, #fff1ce, #ffd29d); border-style: dashed;">
                <h3 style="margin-top: 0;">Ringkasan Festival</h3>
                <p style="margin: 0 0 8px;"><strong>Total Produk Tersedia:</strong> {{ $products->count() }}</p>
                <p class="help" style="margin: 0;">
                    Produk baru yang ditambahkan dari panel kelola akan langsung muncul di halaman depan jika statusnya aktif.
                </p>
            </div>
        </div>
    </section>

    <section>
        <h2 style="margin: 0 0 12px;">Daftar Produk Unggulan</h2>

        <div class="grid cols-3">
            @forelse($products as $product)
                <article class="card" style="display: grid; gap: 10px;">
                    @if($product->image_url)
                        <img
                            src="{{ $product->image_url }}"
                            alt="{{ $product->name }}"
                            style="width: 100%; height: 170px; object-fit: cover; border-radius: 12px; border: 1px solid #f1dcc4;"
                        >
                    @endif

                    <div>
                        <p style="margin: 0; color: #9a3f17; font-size: 0.85rem; font-weight: 700;">{{ $product->category }}</p>
                        <h3 style="margin: 4px 0 8px;">{{ $product->name }}</h3>
                        <p class="help" style="margin: 0;">{{ $product->description }}</p>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <strong style="font-size: 1.1rem;">Rp{{ number_format($product->price, 0, ',', '.') }}</strong>
                        <span class="btn" style="pointer-events: none; padding: 6px 10px; font-size: 0.8rem;">
                            {{ $product->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </div>
                </article>
            @empty
                <div class="card" style="grid-column: 1 / -1;">
                    <p style="margin: 0;">Belum ada produk untuk ditampilkan. Silakan tambahkan lewat menu Kelola Produk.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
