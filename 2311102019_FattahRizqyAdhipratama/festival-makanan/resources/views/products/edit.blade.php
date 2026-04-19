<!-- 2311102019
Fattah Rizqy Adhipratama
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - {{ $product->nama_produk }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 py-12 px-6">

    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900 mb-1">Perbarui Menu</h1>
                    <p class="text-slate-500 text-sm">Mengubah informasi untuk <strong>{{ $product->nama_produk }}</strong></p>
                </div>
                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-md uppercase">Mode Edit</span>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ $product->harga }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Stok Tersedia</label>
                        <input type="number" name="stok" value="{{ $product->stok }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Kategori</label>
                    <input type="text" name="kategori" value="{{ $product->kategori }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $product->deskripsi }}</textarea>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="flex-1 bg-slate-900 text-white font-bold py-4 rounded-2xl hover:bg-blue-600 transition-all shadow-lg shadow-slate-200">Simpan Perubahan</button>
                    <a href="{{ route('home') }}" class="flex-1 text-center bg-slate-50 text-slate-500 font-bold py-4 rounded-2xl hover:bg-slate-100 transition-all">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>