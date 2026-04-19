<!-- 2311102019
Fattah Rizqy Adhipratama
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Festival - Mas Jakobi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fcfcfc; }</style>
</head>
<body class="text-slate-800">

    <nav class="bg-white border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-orange-600">Mas Jakobi <span class="text-slate-300 font-light">| Festival</span></h1>
            <a href="{{ route('products.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-full text-sm font-semibold transition-all">+ Tambah Menu</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-xl transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-orange-50 text-orange-700 text-[10px] font-bold px-3 py-1 rounded-full uppercase italic">{{ $product->kategori }}</span>
                    <span class="text-slate-400 text-xs">Stok: {{ $product->stok }}</span>
                </div>

                <h3 class="text-xl font-bold mb-2 group-hover:text-orange-600 transition-colors">{{ $product->nama_produk }}</h3>
                <p class="text-slate-500 text-sm mb-4 line-clamp-2 italic">"{{ $product->deskripsi }}"</p>
                <div class="text-lg font-bold text-slate-900 mb-6">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>

                <div class="flex items-center gap-2 pt-4 border-t border-slate-50">
                    <a href="{{ route('products.show', $product->id) }}" class="flex-1 text-center py-2 text-xs font-bold text-slate-600 hover:bg-slate-50 rounded-lg transition">Detail</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="flex-1 text-center py-2 text-xs font-bold text-blue-600 hover:bg-blue-50 rounded-lg transition">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus menu ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full text-center py-2 text-xs font-bold text-red-500 hover:bg-red-50 rounded-lg transition">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>