<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Kuliner Ngawi 2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        .card-menu {
            background: white;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .hero-section {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        }
        .img-container {
            position: relative;
            height: 14rem; /* h-56 */
            background-color: #f1f5f9;
            border-radius: 15px 15px 0 0;
            overflow: hidden;
        }
    </style>
</head>
<body class="antialiased">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                    <span class="text-white font-bold">N</span>
                </div>
                <h1 class="font-bold text-xl tracking-tight text-slate-800 uppercase">Ngawi Digital</h1>
            </div>
            <a href="/tambah" class="bg-indigo-600 text-white px-6 py-2.5 rounded-full font-bold text-sm hover:bg-indigo-700 transition shadow-md shadow-indigo-100">
                + Tambah Menu
            </a>
        </div>
    </nav>

    <header class="hero-section py-20 px-6 text-center text-white">
        <div class="max-w-3xl mx-auto">
            <span class="bg-indigo-500/20 text-indigo-300 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest border border-indigo-500/30">
                Program Jenderal Ladesh
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold mt-6 mb-4 leading-tight">
                Festival Kuliner <br> Restoran Mas Jakobi.
            </h1>
            <p class="text-slate-300 text-base md:text-lg font-light leading-relaxed">
                Mendukung 19.000 lapangan kerja melalui digitalisasi katalog kuliner Ngawi Timur yang terintegrasi dan modern.
            </p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-2xl font-bold text-slate-800">Daftar Produk</h2>
            <div class="h-1 flex-grow mx-6 bg-slate-200 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($data as $p)
            <div class="card-menu flex flex-col">

                <div class="img-container">
                    @if($p->gambar)
                        <img src="{{ url('images/' . $p->gambar) }}"
                             class="w-full h-full object-cover"
                             onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=File+Rusak+atau+Path+Salah';">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300 text-5xl">🍲</div>
                    @endif

                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-lg text-[10px] font-bold text-indigo-600 uppercase tracking-widest shadow-sm">
                        {{ $p->kategori }}
                    </div>
                </div>

                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-xl font-bold text-slate-800 mb-2 uppercase tracking-tight">{{ $p->nama_produk }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 font-light italic">
                        "{{ $p->deskripsi }}"
                    </p>

                    <div class="mt-auto pt-6 border-t border-slate-100 flex justify-between items-center">
                        <div>
                            <span class="text-[10px] text-slate-400 font-bold uppercase block tracking-wider">Harga</span>
                            <span class="text-xl font-bold text-indigo-600 italic">Rp{{ number_format($p->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] text-slate-400 font-bold uppercase block tracking-wider">Stok</span>
                            <span class="text-sm font-semibold text-slate-700">{{ $p->stok }} Porsi</span>
                        </div>
                    </div>

                    <div class="flex gap-2 mt-6">
                        <a href="/edit/{{ $p->id }}" class="flex-1 bg-slate-100 text-slate-700 py-3 rounded-xl text-xs font-bold text-center hover:bg-slate-200 transition">
                            EDIT
                        </a>
                        <form action="/hapus/{{ $p->id }}" method="POST" class="flex-shrink-0" onsubmit="return confirm('Hapus menu ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-4 py-3 border border-red-100 text-red-500 rounded-xl hover:bg-red-50 transition">
                                🗑️
                            </button>
                        </form>
                        <button class="flex-1 bg-indigo-600 text-white py-3 rounded-xl text-xs font-bold hover:bg-indigo-700 transition">
                            PESAN
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-dashed border-slate-200">
                <p class="text-slate-400 font-medium">Belum ada menu yang terdaftar dalam sistem.</p>
            </div>
            @endforelse
        </div>
    </main>

    <footer class="py-12 border-t border-slate-200 bg-white text-center">
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.4em]">Ngawi Digital Initiative — 2026</p>
    </footer>

</body>
</html>
