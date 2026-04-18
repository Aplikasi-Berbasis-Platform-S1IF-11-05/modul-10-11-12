@extends('layouts.public')

@section('title', 'Festival Kuliner Ngawi Timur')

@section('content')
    <section class="surface-panel overflow-hidden rounded-2xl p-6 sm:p-8 lg:p-10">
        <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr] lg:items-center">
            <div>
                <p class="inline-flex rounded-full border border-slate-600/70 bg-slate-900/40 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300">
                    Festival Makanan 2026
                </p>

                <h1 class="brand-title mt-4 text-3xl font-extrabold leading-tight text-slate-100 sm:text-5xl">
                    Festival Kuliner Ngawi Timur
                </h1>

                <p class="mt-4 max-w-2xl text-muted">
                    Program digitalisasi restoran Mas Jakobi yang didanai Jendral Ladesh dari Ngawi Barat.
                    Platform ini disiapkan untuk mempercepat promosi UMKM kuliner sekaligus mendukung target
                    19.000 lapangan pekerjaan.
                </p>

                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <a href="{{ route('products.index') }}" class="btn-crimson">Lihat Semua Produk</a>
                    <a href="{{ route('about') }}" class="btn-outline">Tentang Program</a>
                    <a href="{{ route('login') }}" class="btn-outline">Masuk Admin</a>
                </div>
            </div>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-1">
                <div class="surface-soft rounded-xl p-4">
                    <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Target Program</p>
                    <p class="mt-2 text-2xl font-bold text-rose-500">19.000</p>
                    <p class="mt-1 text-sm text-muted">Lapangan pekerjaan baru</p>
                </div>
                <div class="surface-soft rounded-xl p-4">
                    <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Total Produk Aktif</p>
                    <p class="mt-2 text-2xl font-bold text-slate-100">{{ $totalActiveProducts }}</p>
                    <p class="mt-1 text-sm text-muted">Siap tampil untuk pengunjung</p>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="mt-8 grid gap-4 md:grid-cols-3">
        <article class="surface-soft rounded-xl p-5">
            <h2 class="text-lg font-semibold text-slate-100">Cepat</h2>
            <p class="mt-2 text-sm text-muted">Pengunjung dapat melihat katalog makanan tanpa login, langsung dari halaman depan.</p>
        </article>
        <article class="surface-soft rounded-xl p-5">
            <h2 class="text-lg font-semibold text-slate-100">Terkelola</h2>
            <p class="mt-2 text-sm text-muted">Admin dapat menambah, ubah, dan hapus kategori serta produk dalam satu panel.</p>
        </article>
        <article class="surface-soft rounded-xl p-5">
            <h2 class="text-lg font-semibold text-slate-100">Siap Rilis</h2>
            <p class="mt-2 text-sm text-muted">MVP ini dibuat untuk siap dipresentasikan pada pertemuan minggu depan.</p>
        </article>
    </section>

    <section id="produk" class="mt-10">
        <div class="mb-5 flex flex-wrap items-end justify-between gap-3">
            <div>
                <p class="text-sm uppercase tracking-[0.18em] text-slate-400">Produk Unggulan</p>
                <h2 class="brand-title mt-1 text-2xl font-bold text-slate-100">Highlight Katalog Restoran Mas Jakobi</h2>
            </div>

            <a href="{{ route('products.index') }}" class="btn-outline">Buka Halaman Produk</a>
        </div>

        @if ($featuredProducts->isEmpty())
            <div class="surface-soft rounded-xl p-6 text-center text-muted">
                Belum ada produk aktif yang dapat ditampilkan.
            </div>
        @else
            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($featuredProducts as $product)
                    <article class="surface-panel overflow-hidden rounded-xl">
                        <img
                            src="{{ asset('storage/' . $product->image_path) }}"
                            alt="{{ $product->name }}"
                            class="h-48 w-full object-cover"
                        >

                        <div class="space-y-3 p-4">
                            <div class="flex items-center justify-between gap-3">
                                <span class="badge-soft">{{ $product->category->name }}</span>
                                <span class="text-xs text-slate-400">{{ $product->created_at->format('d M Y') }}</span>
                            </div>

                            <h3 class="text-lg font-semibold text-slate-100">{{ $product->name }}</h3>
                            <p class="text-sm text-muted text-clamp-3">{{ $product->description }}</p>

                            <div class="flex items-center justify-between gap-3 pt-2">
                                <p class="price-tag">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn-outline text-xs">Detail</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($featuredProducts->hasPages())
                {{ $featuredProducts->onEachSide(1)->links('vendor.pagination.navy') }}
            @endif
        @endif
    </section>
@endsection
