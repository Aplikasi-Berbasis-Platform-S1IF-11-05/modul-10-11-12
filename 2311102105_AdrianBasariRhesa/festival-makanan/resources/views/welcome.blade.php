<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Festival Makanan Ngawi | Restoran Mas Jakobi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            500: '#f59e0b',
                            600: '#d97706',
                            900: '#78350f',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-500 selection:text-white">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-200/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-3">
                    <span class="text-3xl">🍲</span>
                    <span class="font-extrabold text-2xl bg-clip-text text-transparent bg-gradient-to-r from-brand-600 to-red-600">
                        NgawiFood.
                    </span>
                </div>
                <div class="hidden md:flex space-x-8 items-center font-semibold text-slate-600">
                    <a href="#" class="hover:text-brand-600 transition">Beranda</a>
                    <a href="#menu" class="hover:text-brand-600 transition">Katalog Menu</a>
                    <a href="/tambah-menu" class="bg-brand-500 hover:bg-brand-600 text-white px-6 py-2.5 rounded-full shadow-lg shadow-brand-500/30 transition transform hover:-translate-y-0.5">
                        + Tambah Menu
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-brand-100 via-slate-50 to-slate-50"></div>
        <div class="absolute right-0 top-20 -z-10 opacity-20 transform translate-x-1/3 text-[20rem] blur-sm">🍛</div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold text-sm mb-6 border border-red-200">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
                Didanai Langsung oleh Jendral Ladesh
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 mb-6 leading-tight">
                Digitalisasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 to-red-500">Kuliner Ngawi</span><br>
                Mendunia.
            </h1>
            
            <p class="mt-4 max-w-2xl text-lg md:text-xl text-slate-600 mx-auto mb-10 leading-relaxed">
                Dipersembahkan oleh Restoran Mas Jakobi. Langkah awal mewujudkan ekosistem digital untuk 19.000 lapangan pekerjaan baru di Ngawi Barat.
            </p>
            
            <div class="flex justify-center gap-4">
                <a href="#menu" class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-8 py-4 rounded-full shadow-xl transition transform hover:-translate-y-1">
                    Jelajahi Menu
                </a>
            </div>
        </div>
    </section>

    <section class="bg-slate-900 py-12 border-t-4 border-brand-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-slate-700">
                <div>
                    <div class="text-4xl font-black text-white">19K+</div>
                    <div class="text-brand-400 font-medium mt-1">Lapangan Kerja</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white">100%</div>
                    <div class="text-brand-400 font-medium mt-1">Digitalisasi</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white">24/7</div>
                    <div class="text-brand-400 font-medium mt-1">Akses Restoran</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white">#1</div>
                    <div class="text-brand-400 font-medium mt-1">Di Ngawi Barat</div>
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Katalog Makanan Utama</h2>
            <p class="text-slate-500 max-w-xl mx-auto">Pilihan hidangan terbaik dari resep rahasia Mas Jakobi yang siap memanjakan lidah Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
            @forelse($products ?? [] as $product)
                <div class="group bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-300 transform hover:-translate-y-2">
                    
                    <div class="relative h-56 bg-slate-100 flex items-center justify-center overflow-hidden">
                        <span class="text-7xl group-hover:scale-110 transition duration-500">🤤</span>
                        
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur text-slate-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                {{ $product->kategori ?? $product->category }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-2xl font-bold text-slate-900 leading-tight">{{ $product->nama ?? $product->name }}</h3>
                        </div>
                        
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                            {{ $product->deskripsi ?? $product->description }}
                        </p>
                        
                        <div class="flex items-end justify-between mt-auto pt-4 border-t border-slate-100">
                            <div>
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Harga</p>
                                <span class="text-2xl font-black text-brand-600">Rp {{ number_format($product->harga ?? $product->price, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="text-right">
                                @if(isset($product->status) ? $product->status == 'tersedia' : ($product->stock > 0))
                                    <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-md border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia ({{ $product->stok ?? $product->stock }})
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 bg-rose-50 text-rose-700 text-xs font-bold px-2.5 py-1 rounded-md border border-rose-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Habis
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 text-center border-2 border-dashed border-slate-200 rounded-3xl bg-slate-50">
                    <span class="text-6xl block mb-4">🍽️</span>
                    <h3 class="text-2xl font-bold text-slate-700 mb-2">Belum Ada Menu Mas Jakobi</h3>
                    <p class="text-slate-500 mb-6">Database MySQL masih kosong. Yuk tambah hidangan pertama!</p>
                    <a href="/tambah-menu" class="bg-brand-500 text-white font-bold px-6 py-3 rounded-full hover:bg-brand-600 transition shadow-lg shadow-brand-500/30">
                        Tambah Data Sekarang
                    </a>
                </div>
            @endforelse

        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 mt-12 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-slate-900 font-bold text-xl flex items-center gap-2">
                <span>🍲</span> NgawiFood.
            </div>
            <p class="text-slate-500 text-sm">
                &copy; 2026 Proyek Digitalisasi Ngawi Barat. Built with Laravel & MySQL.
            </p>
        </div>
    </footer>

</body>
</html>