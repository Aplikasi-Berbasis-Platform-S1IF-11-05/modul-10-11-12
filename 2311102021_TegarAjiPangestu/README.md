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
    <strong>Tegar Aji Pangestu</strong>
    <br>
    <strong>2311102021</strong>
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
LLaravel adalah sebuah framework PHP yang digunakan untuk membangun aplikasi web secara lebih terstruktur, cepat, dan efisien. Laravel menerapkan konsep MVC (Model-View-Controller) yang memisahkan logika program, tampilan, dan pengelolaan data sehingga kode menjadi lebih rapi dan mudah dikembangkan. Framework ini juga menyediakan berbagai fitur bawaan seperti routing, middleware, autentikasi, dan templating engine Blade yang memudahkan developer dalam membuat tampilan dinamis. Selain itu, Laravel memiliki sintaks yang sederhana dan elegan sehingga cocok digunakan oleh pemula maupun pengembang profesional.
</p>

<p align="justify">
Salah satu keunggulan utama Laravel adalah penggunaan Eloquent ORM, yaitu sistem yang memudahkan interaksi dengan database tanpa harus menulis query SQL secara langsung. Dengan Eloquent, developer dapat melakukan operasi seperti mengambil, menambah, mengubah, dan menghapus data dengan cara yang lebih sederhana. Laravel juga mendukung migration untuk mengatur struktur database, sehingga perubahan database dapat dikelola dengan mudah dan terorganisir. Dengan berbagai fitur tersebut, Laravel menjadi salah satu framework PHP yang populer dan banyak digunakan dalam pengembangan aplikasi web modern.
</p>

# Tugas 10,11,12 - Laravel dan Database
## 1. ProductCntroller.php
```
<!-- 2311102021
Tegar Aji Pangestu
S1IF-11-05 -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('home', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $nama);
            $data['image'] = $nama;
        }

        Product::create($data);

        return redirect('/');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/');
    }
}
```

## 2. Source Code create.blade.php
```
<!-- 2311102021
Tegar Aji Pangestu
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
        }

        /* Card Form */
        .card {
            background: #1e293b;
            border-radius: 18px;
            border: none;
        }

        h2 {
            color: #f1f5f9;
        }

        /* Input */
        .form-control {
            background: #020617;
            border: 1px solid #334155;
            color: #e2e8f0;
        }

        .form-control:focus {
            background: #020617;
            color: white;
            border-color: #3b82f6;
            box-shadow: none;
        }

        label {
            color: #cbd5f5;
        }

        /* Button */
        .btn-save {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            border: none;
            color: white;
        }

        .btn-back {
            background: #334155;
            color: white;
            border: none;
        }

        .btn-save:hover,
        .btn-back:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow col-md-6 mx-auto">

        <h2 class="text-center mb-4">Tambah Produk</h2>

        <form action="/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="/" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>

        </form>

    </div>
</div>

</body>
</html>
```

## 3. Source Code home.blade.php
```
<!-- 2311102021
Tegar Aji Pangestu
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Makanan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #0f172a, #1e293b);
            border-bottom: 1px solid #334155;
        }

        .navbar-brand {
            color: #f1f5f9;
            font-weight: 600;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1e293b, #312e81, #7c3aed);
            padding: 80px 20px;
            text-align: center;
        }

        /* Judul Gradient */
        .title {
            font-size: 42px;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #cbd5f5;
            margin-top: 10px;
        }

        /* Card */
        .card {
            background: #1e293b;
            border-radius: 18px;
            border: none;
            overflow: hidden;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        /* Gambar */
        .product-img {
            height: 140px;
            object-fit: cover;
            border-bottom: 1px solid #334155;
        }

        /* Nama produk (PUTIH FIX) */
        .card h6 {
            color: #f8fafc;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Harga */
        .price {
            padding: 5px 12px;
            border-radius: 10px;
            font-size: 13px;
            color: white;
            background: linear-gradient(45deg, #3b82f6, #ec4899);
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        /* Tombol */
        .btn-add {
            background: linear-gradient(45deg, #22c55e, #06b6d4);
            border: none;
            color: white;
        }

        .btn-delete {
            background: linear-gradient(45deg, #ef4444, #f97316);
            border: none;
            color: white;
        }

        .btn-add:hover,
        .btn-delete:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Festival Makanan</a>
        <a href="/create" class="btn btn-add btn-sm">Tambah Produk</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <h1 class="title">Festival Kuliner Nusantara</h1>
    <p class="subtitle">Menyajikan berbagai pilihan menu terbaik</p>
</div>

<!-- CONTENT -->
<div class="container mt-5">
    <div class="row">

        @forelse($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow">

                @if($p->image)
                    <img src="/images/{{ $p->image }}" class="product-img">
                @else
                    <img src="https://via.placeholder.com/300" class="product-img">
                @endif

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">{{ $p->name }}</h6>
                        <span class="price">Rp {{ number_format($p->price) }}</span>
                    </div>

                    <p class="text-muted mt-2">{{ $p->description }}</p>

                    <div class="d-flex justify-content-end mt-3">
                        <a href="/delete/{{ $p->id }}"
                           onclick="return confirm('Hapus produk?')"
                           class="btn btn-delete btn-sm">
                           Hapus
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <div class="text-center mt-5">
            <h5>Belum ada produk</h5>
        </div>
        @endforelse

    </div>
</div>

</body>
</html>
```

## 5. Source Code Model product.php
```
<!-- 2311102021
Tegar Aji pangestu
S1IF-11-05 -->
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','description','image'];
}

```

# Output
![alt text](<1.png>)
![alt text](<2.png>)

# Penjelasan
<p align="justify">
Program ini merupakan aplikasi web sederhana berbasis Laravel dengan database MySQL yang dibuat untuk mendukung digitalisasi restoran Mas Jakobi melalui website festival makanan. Sistem ini menampilkan daftar produk makanan pada halaman utama dalam bentuk kartu yang berisi nama, harga, deskripsi, dan gambar yang diambil dari database products. Pengelolaan data dilakukan melalui ProductController yang memiliki fungsi untuk menampilkan data (index), menambahkan produk (create dan store), serta menghapus produk (destroy). Data yang diinput melalui form tambah produk akan disimpan ke database menggunakan model Product (Eloquent ORM). Dari sisi tampilan, website menggunakan desain modern berbasis Bootstrap dengan tema dark mode agar terlihat lebih menarik dan responsif. Secara keseluruhan, aplikasi ini telah mengimplementasikan konsep dasar CRUD (Create, Read, Delete) dan berfungsi sebagai media digital untuk menampilkan serta mengelola produk makanan secara online.
</p>