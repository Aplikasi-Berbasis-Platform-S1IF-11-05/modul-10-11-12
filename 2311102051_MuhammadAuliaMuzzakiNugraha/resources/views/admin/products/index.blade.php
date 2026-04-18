@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
    <section class="surface-panel overflow-hidden rounded-xl">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-700/60 px-5 py-4">
            <div>
                <h1 class="brand-title text-xl font-bold text-slate-100">Data Produk</h1>
                <p class="text-sm text-muted">Kelola katalog produk untuk halaman festival.</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn-crimson text-sm">Tambah Produk</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table-shell min-w-full">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <img
                                        src="{{ asset('storage/' . $product->image_path) }}"
                                        alt="{{ $product->name }}"
                                        class="h-12 w-12 rounded-lg object-cover"
                                    >
                                    <div>
                                        <p class="font-semibold text-slate-100">{{ $product->name }}</p>
                                        <p class="text-xs text-slate-400">{{ $product->slug }}</p>
                                    </div>
                                </div>
                            </td>
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
                            <td>
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn-outline text-xs">Edit</a>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.products.destroy', $product) }}"
                                        data-confirm="Yakin ingin menghapus produk {{ $product->name }}?"
                                        data-confirm-title="Hapus Produk"
                                        data-confirm-accept="Ya, Hapus"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-xl border border-rose-600/70 px-3 py-2 text-xs font-semibold text-rose-300 hover:bg-rose-900/30">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-muted">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    @if ($products->hasPages())
        <div class="mt-5 flex flex-wrap items-center justify-center gap-3">
            @if ($products->onFirstPage())
                <span class="btn-outline cursor-not-allowed opacity-50">Sebelumnya</span>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="btn-outline">Sebelumnya</a>
            @endif

            <span class="rounded-lg border border-slate-700 bg-slate-900/40 px-3 py-2 text-sm text-slate-300">
                Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
            </span>

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="btn-outline">Berikutnya</a>
            @else
                <span class="btn-outline cursor-not-allowed opacity-50">Berikutnya</span>
            @endif
        </div>
    @endif
@endsection
