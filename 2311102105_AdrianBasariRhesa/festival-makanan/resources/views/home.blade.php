@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 font-sans">
    
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-[2.5rem] p-10 md:p-16 text-center shadow-2xl mb-16 overflow-hidden border border-slate-700/50">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 opacity-20 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-rose-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6">
            Pameran Menu <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Mas Jakobi</span>
        </h1>
        <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto mb-10 leading-relaxed">
            Sistem manajemen etalase digital untuk festival kuliner Ngawi Barat. Kelola hidangan andalan Anda dengan antarmuka yang lebih profesional.
        </p>
        
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('products.create') }}" class="bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-white font-bold px-8 py-4 rounded-full shadow-lg shadow-orange-500/30 transition transform hover:-translate-y-1">
                + Tambah Produk Baru
            </a>
            <a href="{{ route('products.index') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white font-semibold px-8 py-4 rounded-full transition">
                Segarkan Data
            </a>
        </div>
    </section>

    <section>
        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-10 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Katalog Menu Tersimpan</h2>
                <p class="text-slate-500 mt-2">Daftar produk yang akan ditampilkan ke pengunjung festival.</p>
            </div>
            <div class="bg-slate-100 text-slate-700 px-5 py-2.5 rounded-2xl font-semibold border border-slate-200 shadow-sm flex items-center gap-2">
                <span>Total Data:</span> 
                <span class="text-orange-600 text-xl font-black">{{ $products->count() }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl hover:shadow-orange-900/10 border border-slate-100 overflow-hidden transition-all duration-300 flex flex-col transform hover:-translate-y-1">
                    
                    <div class="relative h-64 overflow-hidden bg-slate-50">
                        @if($product->gambar)
                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 group-hover:scale-105 transition-transform duration-700">
                                <span class="text-6xl mb-3 drop-shadow-md">🍲</span>
                                <span class="text-slate-400 font-medium text-sm">Gambar Belum Diunggah</span>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <div class="absolute top-4 left-4">
                            <span class="bg-white/95 backdrop-blur-sm text-slate-800 text-xs font-black uppercase tracking-wider px-4 py-2 rounded-full shadow-sm">
                                {{ $product->kategori }}
                            </span>
                        </div>

                        <div class="absolute top-4 right-4">
                            @if($product->status == 'tersedia')
                                <span class="bg-emerald-500/95 backdrop-blur text-white text-xs font-bold px-3 py-2 rounded-full shadow-md flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span> Tersedia
                                </span>
                            @else
                                <span class="bg-rose-500/95 backdrop-blur text-white text-xs font-bold px-3 py-2 rounded-full shadow-md flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-white/50"></span> Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-2xl font-extrabold text-slate-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $product->nama }}</h3>
                        
                        <div class="text-3xl font-black text-orange-500 mb-4">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </div>
                        
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 flex-1 line-clamp-3">
                            {{ $product->deskripsi }}
                        </p>

                        <div class="flex items-center justify-between text-sm text-slate-600 font-medium bg-slate-50 rounded-2xl p-4 mb-6 border border-slate-100">
                            <span>Ketersediaan Stok:</span>
                            <span class="text-xl font-black {{ $product->stok > 10 ? 'text-emerald-600' : 'text-rose-600' }}">
                                {{ $product->stok }} Porsi
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-auto">
                            <a href="{{ route('products.edit', $product->id) }}" class="flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3.5 rounded-xl transition">
                                <span>✏️</span> Edit Data
                            </a>
                            
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-600 font-bold py-3.5 rounded-xl transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini dari katalog Jendral Ladesh?')">
                                    <span>🗑️</span> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 bg-white border border-slate-200 rounded-[2.5rem] shadow-sm text-center">
                    <div class="text-7xl mb-6 opacity-80">🏜️</div>
                    <h3 class="text-3xl font-bold text-slate-800 mb-3">Etalase Masih Kosong</h3>
                    <p class="text-slate-500 mb-8 max-w-lg mx-auto text-lg">Belum ada menu yang siap dipamerkan. Segera tambahkan hidangan terbaik restoran Mas Jakobi!</p>
                    <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold px-10 py-5 rounded-full transition shadow-xl hover:-translate-y-1">
                        + Daftarkan Menu Pertama
                    </a>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection