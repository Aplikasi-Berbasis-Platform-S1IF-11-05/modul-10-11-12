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
    <strong>Rakha Yudhistira</strong>
    <br>
    <strong>2311102010</strong>
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
Laravel merupakan framework pengembangan web berbasis bahasa pemrograman PHP yang dibangun dengan arsitektur Model-View-Controller (MVC) untuk mempercepat proses pengembangan aplikasi. Framework ini sangat populer karena menyediakan berbagai fitur bawaan seperti sistem routing yang elegan, Object-Relational Mapping (ORM) bernama Eloquent untuk manipulasi data tanpa SQL rumit, serta sistem keamanan yang kuat untuk menangani autentikasi dan otorisasi. Dengan menggunakan Laravel 12, pengembang dapat membangun aplikasi yang skalabel dan mudah dipelihara karena kodenya yang bersih dan mengikuti standar industri modern.

MySQL adalah sistem manajemen basis data relasional (Relational Database Management System - RDBMS) yang bersifat open-source dan menggunakan bahasa Structured Query Language (SQL) untuk mengelola datanya. Dalam ekosistem pengembangan web, MySQL dikenal karena kecepatannya, keandalannya, dan kemampuannya dalam menangani volume data yang besar secara efisien. Dalam project ini, MySQL berfungsi sebagai media penyimpanan permanen untuk seluruh informasi produk festival makanan Mas Jakobi, mulai dari detail harga, deskripsi, hingga referensi file gambar yang diunggah.
</p>


# Source Code AdminController.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function store(Request $request) {
        $data = $request->all();

        // Cek jika ada upload file gambar
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            
            // Simpan ke folder public/images
            $file->move(public_path('images'), $nama_file);
            
            // Simpan nama filenya ke kolom image_url
            $data['image_url'] = $nama_file;
        }

        Product::create($data);
        return back()->with('success', 'Produk berhasil ditambah!');
    }

    public function update(Request $request, Product $admin) {
        $data = $request->all();

        if ($request->hasFile('image_url')) {
            // Hapus file lama jika ada agar tidak memenuhi storage Ngawi
            if ($admin->image_url && File::exists(public_path('images/' . $admin->image_url))) {
                File::delete(public_path('images/' . $admin->image_url));
            }

            $file = $request->file('image_url');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images'), $nama_file);
            
            $data['image_url'] = $nama_file;
        }

        $admin->update($data);
        return back()->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $admin) {
        // Hapus file gambar dari folder
        if ($admin->image_url && File::exists(public_path('images/' . $admin->image_url))) {
            File::delete(public_path('images/' . $admin->image_url));
        }

        $admin->delete();
        return back()->with('success', 'Produk berhasil dihapus!');
    }
}
```

# Source Code FestivalController.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FestivalController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}

```
# Source Code Models/Product.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image_url'];
}

```

# Source Code views/layouts/app.blade.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Ngawi - Jakobi Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { background: #1a1a1a !important; border-bottom: 4px solid #d4af37; }
        .navbar-brand { font-weight: 700; color: #d4af37 !important; letter-spacing: 2px; }
        .nav-link { font-weight: 500; color: #fff !important; transition: 0.3s; }
        .nav-link:hover { color: #d4af37 !important; }
        .card { border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s; }
        .card:hover { transform: translateY(-10px); }
        .btn-primary { background-color: #d4af37; border: none; color: #1a1a1a; font-weight: 600; }
        .btn-primary:hover { background-color: #b8962e; }
        .price-tag { color: #27ae60; font-weight: 700; font-size: 1.2rem; }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="/">JAKOBI RESTO</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-link"><a class="nav-link" href="/">Festival Home</a></li>
                    <li class="nav-link"><a class="nav-link" href="/admin">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

```

# Source Code views/admin/index.blade.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Manajemen Menu Festival</h2>
    <button class="btn btn-primary shadow-sm px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> + Menu Baru
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive bg-white p-4 shadow-sm rounded-4">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 15%">Gambar</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th style="width: 25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>
                    @if($p->image_url)
                        <img src="{{ asset('images/'.$p->image_url) }}" width="80" height="60" style="object-fit: cover;" class="rounded shadow-sm" alt="{{ $p->name }}">
                    @else
                        <span class="badge bg-secondary">No Image</span>
                    @endif
                </td>
                <td>
                    <div class="fw-bold">{{ $p->name }}</div>
                    <small class="text-muted">{{ Str::limit($p->description, 50) }}</small>
                </td>
                <td class="text-success fw-bold">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-warning px-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id }}">
                            Edit
                        </button>

                        <form action="{{ route('admin.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger px-3">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg border-0" style="overflow: hidden; border-radius: 15px;">
                    
                    <form action="{{ route('admin.update', $p->id) }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 0;">
                        @csrf 
                        @method('PUT')
                        
                        <div class="modal-header bg-warning border-0 p-3 d-flex justify-content-between align-items-center" style="position: static; width: 100%;">
                            <h5 class="modal-title fw-bold text-dark m-0">Edit Produk Festival</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body p-4 bg-white" style="position: static; width: 100%;">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Nama Makanan</label>
                                <input type="text" name="name" value="{{ $p->name }}" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ $p->price }}" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Deskripsi Singkat</label>
                                <textarea name="description" class="form-control" rows="3">{{ $p->description }}</textarea>
                            </div>
                            
                            <div class="mb-1">
                                <label class="form-label fw-bold small text-uppercase">Ganti Foto</label>
                                <input type="file" name="image_url" class="form-control">
                            </div>
                            <small class="text-muted d-block mt-1" style="font-size: 0.7rem;">File lama: {{ $p->image_url }}</small>
                        </div>
                        
                        <div class="modal-footer bg-light border-0 p-3" style="position: static; width: 100%;">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning px-4 fw-bold text-dark shadow-sm">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="modal-content shadow-lg">
            @csrf
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title fw-bold">Tambah Produk Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Nama Makanan</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Sate Ngawi" required>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" placeholder="25000" required>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Deskripsi Singkat</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Jelaskan kelezatan masakan Mas Jakobi..."></textarea>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Foto Produk</label>
                    <input type="file" name="image_url" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-5 shadow-sm fw-bold">Simpan ke Database</button>
            </div>
        </form>
    </div>
</div>
@endsection
```

# Source Code views/welcome.blade.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-4 fw-bold">Festival Makanan Ngawi</h1>
    <p class="text-muted">Digitalisasi UMKM oleh Jakobi Resto & Jendral Ladesh</p>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card shadow-lg">
            <img src="{{ asset('images/'.$product->image_url) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
                <h5 class="fw-bold">{{ $product->name }}</h5>
                <p class="text-muted small">{{ $product->description }}</p>
                <div class="price-tag mb-3">Rp {{ number_format($product->price) }}</div>
                <button class="btn btn-dark w-100 rounded-pill">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
```

# Source Code routes/web.php
```
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\AdminController;

Route::get('/', [FestivalController::class, 'index']);
Route::resource('admin', AdminController::class);      
```


# Screenshoot Program

![alt text](<assets/Screenshot (748).png>)
![alt text](<assets/Screenshot (747).png>)
![alt text](<assets/Screenshot (740).png>)
![alt text](<assets/Screenshot (749).png>)
![alt text](<assets/Screenshot (750).png>)
![alt text](<assets/Screenshot (751).png>)
![alt text](<assets/Screenshot (752).png>)
![alt text](<assets/Screenshot (753).png>)





# Penjelasan
<p align="justify">

Aplikasi ini dikembangkan menggunakan framework Laravel 12 dengan menerapkan pola arsitektur MVC (Model-View-Controller) untuk memisahkan antara logika bisnis dan tampilan. Pada sisi Model, kita mendefinisikan entitas Product yang merepresentasikan tabel di database MySQL, lengkap dengan atribut fillable agar data seperti nama, harga, deskripsi, dan image_url dapat diproses secara massal (mass assignment). Controller bertindak sebagai otak aplikasi, di mana AdminController mengelola logika CRUD (Create, Read, Update, Delete). Di dalam controller ini, terdapat logika khusus untuk menangani file unggahan; program akan memeriksa apakah ada file gambar yang dikirim melalui request, memberikan nama unik berbasis timestamp untuk menghindari duplikasi, dan memindahkannya ke direktori publik agar dapat diakses oleh sistem.

Fitur manajemen data dioperasikan melalui Modal Bootstrap, yang memungkinkan Mas Jakobi melakukan perubahan data tanpa harus berpindah halaman (Single Page Experience). Form pada modal telah dilengkapi dengan atribut enctype="multipart/form-data", yang sangat krusial agar server dapat menerima data biner berupa gambar. Setiap perubahan data yang dilakukan akan langsung tersinkronisasi dengan database MySQL, dan sistem juga memiliki fungsi pembersihan otomatis yang akan menghapus file gambar lama dari penyimpanan server ketika data produk dihapus, menjaga efisiensi ruang penyimpanan di database
</p>