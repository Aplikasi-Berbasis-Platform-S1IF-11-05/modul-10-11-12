<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 10, 11, 12 <br> Laravel dan Database </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Fattah Rizqy Adhipratama</strong>
    <br>
    <strong>2311102019</strong>
    <br>
    <strong>S1 IF-11-REG05</strong>
  </p>
  <br />
  <h3>Dosen Pengampu :</h3>
  <p>
    <strong>Dedi Agung Prabowo, S.Kom., M.Kom</strong>
  </p>
  <br />
  <br />
  <h4>Asisten Praktikum :</h4>
  <strong>Apri Pandu Wicaksono </strong>
  <br>
  <strong>Hamka Zaenul Ardi</strong>
  <br />
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026 </h3>
</div>

<hr>


# Dasar Teori

<p align="justify">
Laravel merupakan framework berbasis PHP yang dirancang untuk mempermudah proses pengembangan aplikasi web secara terstruktur dan efisien. Framework ini dikembangkan oleh Taylor Otwell dan mengadopsi pola arsitektur Model-View-Controller (MVC), yang memisahkan antara logika bisnis, tampilan, dan pengelolaan data. Dengan pendekatan ini, pengembang dapat membuat aplikasi yang lebih terorganisir, mudah dipelihara, dan scalable. Laravel juga menyediakan berbagai fitur bawaan seperti routing, middleware, sistem autentikasi, serta Eloquent ORM yang memungkinkan interaksi dengan database secara lebih sederhana menggunakan konsep pemrograman berorientasi objek.
</p>

<p align="justify">
Sementara itu, MySQL adalah sistem manajemen basis data relasional yang широко digunakan dalam pengembangan aplikasi web untuk menyimpan dan mengelola data. MySQL menggunakan bahasa SQL (Structured Query Language) untuk melakukan berbagai operasi seperti pengambilan, penambahan, pembaruan, dan penghapusan data. Data dalam MySQL disusun dalam bentuk tabel yang terdiri dari baris dan kolom, serta mendukung penggunaan kunci utama (primary key) dan kunci tamu (foreign key) untuk menjaga integritas dan relasi antar data. Keunggulan MySQL terletak pada performanya yang tinggi, sifatnya yang open-source, serta kemampuannya dalam menangani banyak pengguna secara bersamaan.
</p>

# Tugas 10,11,12 - Laravel dan Database
## 1. Source Code welcome.blade.php
```
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
```

## 2. Source Code create.blade.php
```
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
```

## 3. Source Code edit.blade.php
```
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
```

## 4. Source Code index.blade.php
```
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
```

## 5. Source Code show.blade.php
```
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
```

# Output
![alt text](<Screenshot (1199).png>)
![alt text](<Screenshot (1200).png>)
![alt text](<Screenshot (1201).png>)
![alt text](<Screenshot (1202).png>)
![alt text](<Screenshot (1203).png>)
![alt text](<Screenshot (1204).png>)

# Penjelasan
<p align="justify">
Program "festival-makanan" merupakan aplikasi web berbasis framework Laravel yang mengelola menu makanan untuk festival kuliner "Mas Jakobi". Dibangun dengan arsitektur MVC lengkap, aplikasi ini menyediakan fitur CRUD (Create, Read, Update, Delete) untuk produk makanan melalui ProductController yang menangani operasi seperti index (landing page menampilkan semua produk), create/store, show, edit/update, dan destroy. Model Product mendukung field esensial seperti nama_produk, harga, deskripsi, kategori, stok, dan gambar, yang disimpan via migrasi database khusus. Routes didefinisikan di web.php dengan root '/' sebagai home dan resource 'products' untuk endpoint RESTful. Antarmuka pengguna menggunakan Blade templates dengan Tailwind CSS yang responsif dan modern, menampilkan daftar produk dalam grid card yang menarik dengan info kategori, stok, harga terformat, serta tombol aksi detail/edit/hapus, halaman tambahan seperti create.blade.php dan edit.blade.php memungkinkan input data baru atau modifikasi, semuanya terintegrasi seamless untuk pengalaman manajemen festival makanan yang intuitif dan profesional.
</p>