<!-- 2311102019
Fattah Rizqy Adhipratama
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Mas Jakobi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-white text-slate-900">

    <header class="relative bg-orange-50 py-20 px-6 overflow-hidden">
        <div class="max-w-6xl mx-auto relative z-10">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm">Citarasa Autentik</span>
            <h1 class="text-5xl md:text-7xl font-extrabold mt-4 mb-6 leading-tight">Festival Makanan<br><span class="text-orange-500">Mas Jakobi</span></h1>
            <p class="text-slate-600 text-lg max-w-xl mb-8">Nikmati kelezatan hidangan pilihan yang diracik khusus untuk memanjakan lidah Anda di festival tahun ini.</p>
            <a href="{{ route('products.create') }}" class="inline-block bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold hover:bg-orange-600 transition-all shadow-lg shadow-orange-200">
                + Tambah Menu Baru
            </a>
        </div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-orange-100 opacity-50 skew-x-12 translate-x-20"></div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($products as $product)
            <div class="group border-b border-slate-100 pb-8 hover:border-orange-300 transition-all">
                <div class="flex justify-between items-end mb-4">
                    <div>
                        <p class="text-orange-600 text-xs font-bold uppercase tracking-tighter mb-1">{{ $product->kategori }}</p>
                        <h3 class="text-2xl font-bold group-hover:text-orange-500 transition-colors">{{ $product->nama_produk }}</h3>
                    </div>
                    <div class="text-right">
                        <span class="block text-sm text-slate-400">Harga</span>
                        <span class="font-bold text-lg italic">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                    </div>
                </div>
                <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2 italic">"{{ $product->deskripsi }}"</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-slate-400">Tersedia {{ $product->stok }} Porsi</span>
                    <a href="{{ route('products.show', $product->id) }}" class="text-sm font-bold border-b-2 border-slate-900 pb-1 hover:text-orange-600 hover:border-orange-600 transition-all">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>

</body>
</html>