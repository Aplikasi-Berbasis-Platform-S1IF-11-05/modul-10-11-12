@extends('layouts.public')

@section('title', 'Tentang Program - Festival Kuliner Ngawi Timur')

@section('content')
    <section class="surface-panel rounded-2xl p-6 sm:p-8 lg:p-10">
        <p class="inline-flex rounded-full border border-slate-600/70 bg-slate-900/40 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300">
            Tentang Program
        </p>

        <h1 class="brand-title mt-4 text-3xl font-extrabold leading-tight text-slate-100 sm:text-5xl">
            Digitalisasi Festival Kuliner Ngawi Timur
        </h1>

        <p class="mt-4 max-w-3xl text-muted">
            Inisiatif ini dibangun untuk membantu restoran Mas Jakobi mempromosikan produk kuliner secara digital,
            mempercepat akses informasi untuk pengunjung, dan mendukung target penciptaan lapangan pekerjaan
            berbasis UMKM kuliner di wilayah Ngawi Timur.
        </p>

        <div class="mt-7 flex flex-wrap gap-3">
            <a href="{{ route('products.index') }}" class="btn-crimson">Lihat Katalog Produk</a>
            <a href="{{ route('home') }}" class="btn-outline">Kembali ke Beranda</a>
        </div>
    </section>

    <section class="mt-8 grid gap-4 md:grid-cols-3">
        <article class="surface-soft rounded-xl p-5">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Produk Aktif</p>
            <p class="mt-2 text-3xl font-bold text-slate-100">{{ $stats['totalProducts'] }}</p>
            <p class="mt-2 text-sm text-muted">Produk yang siap ditampilkan ke pengunjung.</p>
        </article>

        <article class="surface-soft rounded-xl p-5">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Kategori Tersedia</p>
            <p class="mt-2 text-3xl font-bold text-slate-100">{{ $stats['totalCategories'] }}</p>
            <p class="mt-2 text-sm text-muted">Kategori disusun untuk mempermudah eksplorasi menu.</p>
        </article>

        <article class="surface-soft rounded-xl p-5">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Rata-Rata Harga</p>
            <p class="mt-2 text-3xl font-bold text-rose-500">Rp {{ number_format((float) $stats['averagePrice'], 0, ',', '.') }}</p>
            <p class="mt-2 text-sm text-muted">Kisaran harga produk aktif saat ini.</p>
        </article>
    </section>

    <section class="mt-8 grid gap-4 lg:grid-cols-2">
        <article class="surface-panel rounded-xl p-5 sm:p-6">
            <h2 class="text-xl font-semibold text-slate-100">Tujuan MVP</h2>
            <ul class="mt-3 space-y-2 text-sm text-slate-200">
                <li>Menampilkan katalog produk tanpa perlu login bagi pengunjung.</li>
                <li>Menyediakan panel admin untuk CRUD kategori dan produk.</li>
                <li>Mempercepat kesiapan demo dengan struktur aplikasi yang stabil.</li>
            </ul>
        </article>

        <article class="surface-panel rounded-xl p-5 sm:p-6">
            <h2 class="text-xl font-semibold text-slate-100">Cakupan Implementasi</h2>
            <ul class="mt-3 space-y-2 text-sm text-slate-200">
                <li>Autentikasi admin untuk pengelolaan data.</li>
                <li>Pengelolaan kategori dan produk lengkap dengan upload gambar.</li>
                <li>Halaman publik beranda, produk, detail produk, dan tentang.</li>
            </ul>
        </article>
    </section>
@endsection
