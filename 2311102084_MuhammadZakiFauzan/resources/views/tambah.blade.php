<!DOCTYPE html>
<html>
<head>
    <title>Entry Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        input, select, textarea {
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 12px !important;
            width: 100%;
        }
        input:focus { border-color: #4f46e5 !important; outline: none; }
        label { font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; margin-left: 4px; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-lg bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-800 uppercase tracking-tight">Input Menu</h2>
            <p class="text-slate-400 text-sm mt-1 uppercase text-[10px] font-bold tracking-widest">Restoran Mas Jakobi</p>
        </div>

        <form action="/simpan" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="space-y-1">
                <label>Nama Produk</label>
                <input name="nama_produk" required placeholder="Contoh: Bakso Sapi">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label>Kategori</label>
                    <select name="kategori">
                        <option>Makanan</option>
                        <option>Minuman</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label>Harga (Rp)</label>
                    <input name="harga" type="number" required>
                </div>
            </div>

            <div class="space-y-1">
                <label>Foto Produk</label>
                <input type="file" name="gambar" class="text-xs">
            </div>

            <div class="space-y-1">
                <label>Stok Tersedia</label>
                <input name="stok" type="number" required>
            </div>

            <div class="space-y-1">
                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="3"></textarea>
            </div>

            <div class="pt-4 flex flex-col gap-3">
                <button class="bg-indigo-600 text-white py-4 rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">SIMPAN DATA</button>
                <a href="/" class="text-center text-xs font-bold text-slate-400 hover:text-slate-800 transition">BATAL</a>
            </div>
        </form>
    </div>
</body>
</html>
