@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                colors: { brand: { 50: '#fffbeb', 100: '#fef3c7', 500: '#f59e0b', 600: '#d97706', 900: '#78350f' } }
            }
        }
    }
</script>

<div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 font-sans selection:bg-brand-500 selection:text-white">
    
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-brand-600 font-semibold mb-6 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Katalog
        </a>

        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative">
            
            <div class="h-32 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
            </div>

            <div class="px-8 pb-10 sm:px-12 -mt-16 relative z-10">
                <div class="w-24 h-24 bg-white rounded-2xl shadow-lg border border-slate-100 flex items-center justify-center text-4xl mb-6">
                    👨‍🍳
                </div>

                <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Tambah Menu Baru</h2>
                <p class="text-slate-500 mb-10">Lengkapi detail informasi hidangan di bawah ini untuk menampilkannya di etalase restoran.</p>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm">1</span> 
                            Informasi Dasar
                        </h3>
                        
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk <span class="text-rose-500">*</span></label>
                                <input type="text" name="nama" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-shadow" placeholder="Contoh: Es Cebong SiTampan (Jeli Cokelat)" required>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori <span class="text-rose-500">*</span></label>
                                    <input type="text" name="kategori" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-shadow" placeholder="Contoh: Minuman" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rp) <span class="text-rose-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-slate-400 font-semibold">Rp</span>
                                        </div>
                                        <input type="number" name="harga" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-shadow" placeholder="15000" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm">2</span> 
                            Ketersediaan & Detail
                        </h3>
                        
                        <div class="space-y-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Sisa Stok (Porsi) <span class="text-rose-500">*</span></label>
                                    <input type="number" name="stok" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-shadow" placeholder="50" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Status Produk <span class="text-rose-500">*</span></label>
                                    <select name="status" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-shadow appearance-none cursor-pointer" required>
                                        <option value="tersedia">✅ Tersedia untuk dipesan</option>
                                        <option value="habis">❌ Stok Habis</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Lengkap <span class="text-rose-500">*</span></label>
                                <textarea name="deskripsi" rows="4" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-shadow resize-none" placeholder="Ceritakan bahan-bahan dan kelezatan hidangan ini..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm">3</span> 
                            Foto Produk
                        </h3>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Unggah Gambar</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-brand-400 hover:bg-brand-50 transition-colors relative group cursor-pointer">
                                <div class="space-y-2 text-center">
                                    <span class="text-4xl">📸</span>
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-bold text-brand-600 hover:text-brand-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-500 px-1">
                                            <span>Pilih gambar dari perangkat</span>
                                            <input id="file-upload" name="gambar" type="file" class="sr-only" accept="image/*">
                                        </label>
                                    </div>
                                    <p class="text-xs text-slate-500">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 flex flex-col-reverse md:flex-row items-center justify-end gap-4 border-t border-slate-100">
                        <a href="{{ route('products.index') }}" class="w-full md:w-auto text-center px-8 py-4 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50 hover:text-slate-800 transition">
                            Batal
                        </a>
                        <button type="submit" class="w-full md:w-auto px-10 py-4 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-white font-bold rounded-xl shadow-lg shadow-orange-500/30 transform transition hover:-translate-y-1">
                            Simpan ke Katalog
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection