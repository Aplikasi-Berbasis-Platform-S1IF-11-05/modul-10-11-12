@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
    <section class="surface-panel overflow-hidden rounded-xl">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-700/60 px-5 py-4">
            <div>
                <h1 class="brand-title text-xl font-bold text-slate-100">Data Kategori</h1>
                <p class="text-sm text-muted">Kelola kategori untuk pengelompokan produk festival.</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn-crimson text-sm">Tambah Kategori</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table-shell min-w-full">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Jumlah Produk</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="font-semibold text-slate-100">{{ $category->name }}</td>
                            <td class="text-slate-300">{{ $category->slug }}</td>
                            <td class="text-slate-300">{{ $category->products_count }}</td>
                            <td class="text-slate-400">{{ $category->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn-outline text-xs">Edit</a>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.categories.destroy', $category) }}"
                                        data-confirm="Yakin ingin menghapus kategori {{ $category->name }}?"
                                        data-confirm-title="Hapus Kategori"
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
                            <td colspan="5" class="py-8 text-center text-muted">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    @if ($categories->hasPages())
        <div class="mt-5 flex flex-wrap items-center justify-center gap-3">
            @if ($categories->onFirstPage())
                <span class="btn-outline cursor-not-allowed opacity-50">Sebelumnya</span>
            @else
                <a href="{{ $categories->previousPageUrl() }}" class="btn-outline">Sebelumnya</a>
            @endif

            <span class="rounded-lg border border-slate-700 bg-slate-900/40 px-3 py-2 text-sm text-slate-300">
                Halaman {{ $categories->currentPage() }} dari {{ $categories->lastPage() }}
            </span>

            @if ($categories->hasMorePages())
                <a href="{{ $categories->nextPageUrl() }}" class="btn-outline">Berikutnya</a>
            @else
                <span class="btn-outline cursor-not-allowed opacity-50">Berikutnya</span>
            @endif
        </div>
    @endif
@endsection
