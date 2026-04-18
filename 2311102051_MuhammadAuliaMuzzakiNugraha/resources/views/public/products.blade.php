@extends('layouts.public')

@section('title', 'Produk - Festival Kuliner Ngawi Timur')

@section('content')
    <section class="surface-panel rounded-2xl p-6 sm:p-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-sm uppercase tracking-[0.18em] text-slate-400">Katalog Produk</p>
                <h1 class="brand-title mt-1 text-3xl font-bold text-slate-100 sm:text-4xl">Produk Restoran Mas Jakobi</h1>
                <p class="mt-3 max-w-2xl text-muted">
                    Jelajahi semua menu yang sedang aktif. Gunakan filter kategori di bawah ini untuk menyesuaikan tampilan produk sesuai kebutuhan Anda. Klik "Detail" untuk informasi lengkap setiap produk.
                </p>
            </div>

            <a href="{{ route('about') }}" class="btn-outline">Tentang Program</a>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="mt-6 grid gap-3 rounded-xl border border-slate-700/70 bg-slate-900/30 p-4 md:grid-cols-[1fr_auto_auto] md:items-end">
            <div>
                <label for="category" class="mb-2 block text-sm font-semibold text-slate-200">Filter Kategori</label>
                <select id="category" name="category" class="select-field">
                    <option value="">Semua kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @selected($selectedCategory === $category->slug)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-crimson">Terapkan Filter</button>
            <a href="{{ route('products.index') }}" class="btn-outline">Reset</a>
        </form>

        @if ($selectedCategoryName)
            <div class="mt-4 rounded-xl border border-rose-500/30 bg-rose-900/15 px-4 py-3 text-sm text-rose-200">
                Menampilkan produk kategori: <span class="font-semibold">{{ $selectedCategoryName }}</span>
            </div>
        @endif
    </section>

    <section class="mt-8">
        @if ($products->isEmpty())
            <div class="surface-soft rounded-xl p-6 text-center text-muted">
                @if ($selectedCategory)
                    Belum ada produk aktif untuk kategori yang dipilih.
                @else
                    Belum ada produk aktif yang dapat ditampilkan.
                @endif
            </div>
        @else
            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($products as $product)
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

                            <h2 class="text-lg font-semibold text-slate-100">{{ $product->name }}</h2>
                            <p class="text-sm text-muted text-clamp-3">{{ $product->description }}</p>

                            <div class="flex items-center justify-between gap-3 pt-2">
                                <p class="price-tag">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn-outline text-xs">Detail</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($products->hasPages())
                {{ $products->onEachSide(1)->links('vendor.pagination.navy') }}
            @endif
        @endif
    </section>
@endsection
