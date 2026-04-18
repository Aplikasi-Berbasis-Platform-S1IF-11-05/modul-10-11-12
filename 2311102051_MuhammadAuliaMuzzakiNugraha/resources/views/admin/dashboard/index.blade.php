@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="grid gap-4 md:grid-cols-3">
        <article class="surface-panel rounded-xl p-5">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Total Kategori</p>
            <p class="mt-2 text-3xl font-bold text-slate-100">{{ $categoryCount }}</p>
        </article>

        <article class="surface-panel rounded-xl p-5">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Total Produk</p>
            <p class="mt-2 text-3xl font-bold text-slate-100">{{ $productCount }}</p>
        </article>

        <article class="surface-panel rounded-xl p-5">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Produk Aktif</p>
            <p class="mt-2 text-3xl font-bold text-rose-500">{{ $activeProductCount }}</p>
        </article>
    </div>

    <section class="surface-panel mt-7 overflow-hidden rounded-xl">
        <div class="flex items-center justify-between border-b border-slate-700/60 px-5 py-4">
            <h2 class="brand-title text-lg font-semibold text-slate-100">Produk Terbaru</h2>
            <a href="{{ route('admin.products.index') }}" class="btn-outline text-sm">Kelola Produk</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table-shell min-w-full">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestProducts as $product)
                        <tr>
                            <td class="font-semibold text-slate-100">{{ $product->name }}</td>
                            <td class="text-slate-300">{{ $product->category->name }}</td>
                            <td class="text-slate-200">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($product->is_active)
                                    <span class="rounded-full border border-emerald-500/40 bg-emerald-900/25 px-2.5 py-1 text-xs text-emerald-300">Aktif</span>
                                @else
                                    <span class="rounded-full border border-slate-600/70 bg-slate-900/45 px-2.5 py-1 text-xs text-slate-300">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-slate-400">{{ $product->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-muted">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
