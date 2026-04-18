@extends('layouts.public')

@section('title', $product->name . ' - Festival Kuliner Ngawi Timur')

@section('content')
    <div class="mb-5">
        <a href="{{ route('products.index') }}" class="btn-outline text-sm">Kembali ke Halaman Produk</a>
    </div>

    <section class="surface-panel rounded-2xl p-5 sm:p-7">
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="overflow-hidden rounded-xl border border-slate-700/80">
                <img
                    src="{{ asset('storage/' . $product->image_path) }}"
                    alt="{{ $product->name }}"
                    class="h-full min-h-80 w-full object-cover"
                >
            </div>

            <div class="space-y-4">
                <span class="badge-soft">{{ $product->category->name }}</span>
                <h1 class="brand-title text-3xl font-bold text-slate-100">{{ $product->name }}</h1>
                <p class="price-tag text-3xl">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>

                <div class="rounded-xl border border-slate-700/70 bg-slate-900/30 p-4">
                    <h2 class="text-sm uppercase tracking-[0.14em] text-slate-400">Deskripsi Produk</h2>
                    <p class="mt-3 whitespace-pre-line leading-relaxed text-slate-200">{{ $product->description }}</p>
                </div>

                <p class="text-sm text-muted">Diperbarui: {{ $product->updated_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </section>

    @if ($relatedProducts->isNotEmpty())
        <section class="mt-9">
            <h2 class="brand-title mb-4 text-2xl font-bold text-slate-100">Produk Terkait</h2>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($relatedProducts as $item)
                    <article class="surface-soft overflow-hidden rounded-xl">
                        <img
                            src="{{ asset('storage/' . $item->image_path) }}"
                            alt="{{ $item->name }}"
                            class="h-44 w-full object-cover"
                        >
                        <div class="space-y-3 p-4">
                            <h3 class="text-lg font-semibold text-slate-100">{{ $item->name }}</h3>
                            <p class="text-sm text-muted text-clamp-3">{{ $item->description }}</p>
                            <div class="flex items-center justify-between gap-3">
                                <p class="price-tag">Rp {{ number_format((float) $item->price, 0, ',', '.') }}</p>
                                <a href="{{ route('product.show', $item->slug) }}" class="btn-outline text-xs">Lihat</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
