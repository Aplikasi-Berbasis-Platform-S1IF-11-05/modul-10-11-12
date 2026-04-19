<!-- 2311102019
Fattah Rizqy Adhipratama
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Mas Jakobi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 py-12 px-6">

    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Tambah Menu Baru</h1>
            <p class="text-slate-500 text-sm mb-8">Isi detail makanan untuk ditampilkan di festival.</p>

            <form action="{{ route('products.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" placeholder="Contoh: Nasi Goreng Spesial" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-orange-500 focus:outline-none transition">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" placeholder="25000" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Stok</label>
                        <input type="number" name="stok" placeholder="50" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Kategori</label>
                    <input type="text" name="kategori" placeholder="Makanan Utama / Minuman" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="3" placeholder="Ceritakan kelezatan menu ini..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-orange-500 focus:outline-none"></textarea>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="flex-1 bg-orange-600 text-white font-bold py-4 rounded-2xl hover:bg-orange-700 transition-all shadow-lg shadow-orange-100">Simpan Menu</button>
                    <a href="{{ route('home') }}" class="flex-1 text-center bg-slate-100 text-slate-600 font-bold py-4 rounded-2xl hover:bg-slate-200 transition-all">Batal</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>