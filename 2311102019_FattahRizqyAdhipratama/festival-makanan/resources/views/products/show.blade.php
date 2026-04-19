<!-- 2311102019
Fattah Rizqy Adhipratama
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail - {{ $product->nama_produk }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-6 text-slate-800">

    <div class="max-w-2xl w-full bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 md:p-12">
            <a href="{{ route('home') }}" class="text-slate-400 hover:text-orange-600 text-sm font-medium inline-flex items-center gap-2 mb-8 transition group">
                <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali ke Menu
            </a>

            <div class="inline-block px-3 py-1 bg-orange-50 text-orange-600 rounded-lg text-xs font-bold uppercase tracking-wider mb-4">
                {{ $product->kategori }}
            </div>
            
            <h1 class="text-4xl font-extrabold text-slate-900 mb-2">{{ $product->nama_produk }}</h1>
            <div class="text-2xl font-bold text-orange-500 mb-8">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </div>

            <div class="space-y-6">
                <div>
                    <h4 class="text-[10px] uppercase font-bold text-slate-400 tracking-widest mb-2">Deskripsi</h4>
                    <p class="text-slate-600 leading-relaxed italic">"{{ $product->deskripsi }}"</p>
                </div>

                <div class="flex gap-12">
                    <div>
                        <h4 class="text-[10px] uppercase font-bold text-slate-400 tracking-widest mb-1">Ketersediaan</h4>
                        <p class="text-slate-900 font-semibold text-lg">{{ $product->stok }} <span class="text-slate-400 font-normal text-sm italic">Porsi Tersedia</span></p>
                    </div>
                </div>
            </div>

            <div class="mt-12 space-y-3">
                <button class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold hover:bg-orange-600 transition-all shadow-lg shadow-slate-100 mb-4">
                    Pesan Sekarang
                </button>

                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-slate-50">
                    <a href="{{ route('products.edit', $product->id) }}" 
                       class="flex-1 text-center bg-blue-50 text-blue-600 py-3 rounded-xl font-bold hover:bg-blue-600 hover:text-white transition-all text-sm uppercase tracking-tight">
                        Edit Informasi
                    </a>

                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('{{ $product->id }}')" 
                                class="w-full bg-red-50 text-red-500 py-3 rounded-xl font-bold hover:bg-red-500 hover:text-white transition-all text-sm uppercase tracking-tight">
                            Hapus Menu
                        </button>
                    </form>

                    <script>
                    function confirmDelete(productId) {
                        Swal.fire({
                            title: 'Hapus Menu?',
                            text: "Data yang dihapus tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ef4444', // Warna merah tailwind
                            cancelButtonColor: '#64748b',  // Warna slate tailwind
                            confirmButtonText: 'Ya, Hapus!',
                            cancelButtonText: 'Batal',
                            border: 'none',
                            customClass: {
                                popup: 'rounded-3xl', // Agar senada dengan desain rounded-3xl Anda
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + productId).submit();
                            }
                        })
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>