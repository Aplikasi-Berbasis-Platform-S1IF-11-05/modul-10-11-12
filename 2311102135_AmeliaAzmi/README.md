<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 11, 12, 13 <br> LARAVEL & DATABASE </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Amelia Azmi</strong>
    <br>
    <strong>2311102135</strong>
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
  <strong>Apri Pandu Wicaksono</strong>
  <br>
  <strong>Hamka Zaenul Ardi</strong>
  <br />
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026 </h3>
</div>

<hr>

---

## DASAR TEORI
# Intisari Teknologi: Laravel Framework

## 1. Mengenal Laravel: The Artisan Framework
Laravel adalah kerangka kerja (framework) PHP progresif yang dirancang untuk menyederhanakan siklus pengembangan web tanpa mengorbankan fungsionalitas aplikasi. Keunggulan utamanya terletak pada **Sintaks Ekspresif**, di mana kode yang ditulis dibuat sedemikian rupa agar mudah dibaca seperti bahasa manusia. Laravel menyediakan ekosistem lengkap yang mencakup pengelolaan dependensi, migrasi database, hingga sistem keamanan terintegrasi untuk mencegah serangan seperti *SQL Injection* dan *Cross-Site Request Forgery* (CSRF).

---

## 2. Implementasi Arsitektur MVC
Proyek ini mengimplementasikan pola **Model-View-Controller (MVC)** untuk memastikan kode tetap modular dan terorganisir:

* **Logic Isolation (Controller):** Menangani instruksi utama aplikasi. Controller menerima input dari pengguna melalui *Route*, memproses data tersebut, dan mengirimkannya ke View.
* **Data Representation (Model):** Bertugas mendefinisikan struktur data. Setiap tabel dalam database memiliki Model yang mewakilinya, memungkinkan manipulasi data yang bersih.
* **Template Engine (View):** Menggunakan **Blade**, yaitu mesin template canggih yang memungkinkan penggunaan kode PHP murni di dalam HTML secara elegan dengan fitur seperti *template inheritance* dan *data binding*.

---

## 3. Manajemen Basis Data & Migrasi
Berbeda dengan pengelolaan database manual, Laravel menggunakan sistem **Migration**. Fitur ini bertindak sebagai *Version Control* untuk database. Dengan Migration, pengembang dapat membuat, mengubah, dan menghapus tabel melalui kode PHP, sehingga struktur database dapat dibagikan dan direplikasi dengan mudah oleh anggota tim lain tanpa perlu melakukan ekspor-impor file SQL secara manual.

---

## 4. Routing & Request Lifecycle
Routing adalah gerbang utama dalam aplikasi Laravel. Setiap permintaan (*request*) yang masuk dari browser akan diarahkan oleh sistem routing ke tujuan yang spesifik. Laravel mengelola alur ini melalui file `routes/web.php`, di mana pengembang menentukan URL dan metode HTTP (GET, POST, dll.) yang diizinkan. Mekanisme ini memastikan bahwa setiap interaksi pengguna dipetakan secara akurat ke logika program yang sesuai tanpa adanya konflik alamat URL.

---

## 5. Middleware: Sistem Filtrasi Keamanan
Middleware bertindak sebagai lapisan pelindung atau "satpam" di antara permintaan pengguna dan Controller. Sebelum sebuah *request* mencapai logika utama, Middleware akan memeriksa kriteria tertentu. 
* **Fungsi Utama:** Melakukan verifikasi apakah pengguna sudah login, mengecek hak akses (autorisasi), hingga menangani perlindungan CSRF (*Cross-Site Request Forgery*). Jika permintaan tidak memenuhi syarat, Middleware akan menolak akses tersebut sebelum sempat diproses oleh server, sehingga meningkatkan keamanan sistem secara signifikan.

---

## 6. Blade Templating Engine
Blade adalah mesin pencetak tampilan (template engine) bawaan Laravel yang sangat efisien. Berbeda dengan PHP native yang sering kali berantakan saat dicampur dengan HTML, Blade memungkinkan penulisan tampilan yang bersih dengan sintaks khusus seperti `@if`, `@foreach`, dan `@extends`. 
* **Keunggulan Utama:** Blade menggunakan konsep *Template Inheritance*, di mana kita bisa membuat satu struktur *layout* utama dan menggunakannya berulang kali di halaman lain. Hal ini meminimalisir pengulangan kode (*Don't Repeat Yourself*) dan mempercepat pemuatan halaman karena file Blade dikompilasi menjadi kode PHP murni sebelum dijalankan.

Pendekatan ini tidak hanya mempercepat penulisan kode, tetapi juga membuat aplikasi lebih fleksibel jika suatu saat terjadi perubahan *database engine* (misalnya dari MySQL ke PostgreSQL).


# Tugas 11, 12, 13 — Laravel dan MYSQL

## File codingan
### a. File View (`ProductController.php`)
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // READ (home)
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    // CREATE PAGE (ADMIN DASHBOARD)
    public function create()
    {
        $products = Product::all(); // ✅ WAJIB ADA
        return view('create', compact('products'));
    }

    // STORE DATA
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/create'); // biar balik ke dashboard
    }

    // DELETE
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect('/create'); // biar update tabel
    }

    // EDIT PAGE
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return redirect('/create');
    }
}

``` 

### b. File View (`home.blade.php`)
```php
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Festival Kuliner Ngawi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: transparent;
    position: absolute;
    width: 100%;
    z-index: 10;
}

.navbar a {
    color: white !important;
}

/* HERO */
.hero {
    height: 100vh;
    background: linear-gradient(rgba(30,20,10,0.9), rgba(30,20,10,0.9)),
    url('https://images.unsplash.com/photo-1555992336-03a23c4a3b7f');
    background-size: cover;
    display: flex;
    align-items: center;
    color: white;
}

.hero h1 {
    font-size: 60px;
    font-weight: bold;
}

.btn-gold {
    background: #c8a96a;
    color: black;
    border: none;
}
.btn-gold:hover {
    background: #a88b50;
}

/* SECTION */
.section {
    padding: 80px 0;
}

/* CARD */
.menu-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
}
.menu-card:hover {
    transform: translateY(-10px);
}

.menu-img {
    height: 180px;
    background: #6d4c41;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: white;
}

/* FOOTER */
.footer {
    background: #1e140a;
    color: white;
    padding: 30px;
    text-align: center;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-5">
    <span class="navbar-brand fw-bold">☕ Jakobi Resto</span>
    <div class="ms-auto">
        <a href="/create" class="btn btn-gold">Admin Panel</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">
                <h1>Enjoy Our Delicious Meal</h1>
                <p>
                    Festival makanan digital untuk mendukung UMKM Ngawi oleh Mas Jakobi.
                </p>
                <a href="#menu" class="btn btn-gold mt-3">Lihat Menu</a>
            </div>

            <div class="col-md-6 text-center">
                <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2"
                     class="img-fluid rounded-circle shadow"
                     style="width: 300px; height:300px; object-fit:cover;">
            </div>

        </div>
    </div>
</div>

<!-- MENU (VERSI UNIK & PREMIUM) -->
<div class="section" id="menu" style="background:#f5f1ec;">
    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Special Menu</h2>
            <p class="text-muted">Pilihan terbaik dari Jakobi Resto</p>
        </div>

        <!-- WRAPPER FLEX -->
        <div style="display:flex; gap:30px; overflow-x:auto; padding-bottom:10px;">

            @foreach($products as $p)
            <div style="min-width:300px; flex:0 0 auto;">

                <div style="
                    background:white;
                    border-radius:20px;
                    overflow:hidden;
                    box-shadow:0 10px 25px rgba(0,0,0,0.1);
                    transition:0.3s;
                " onmouseover="this.style.transform='scale(1.05)'" 
                   onmouseout="this.style.transform='scale(1)'">

                    <!-- TOP IMAGE STYLE -->
                    <div style="
                        height:180px;
                        background:linear-gradient(135deg,#6d4c41,#3e2723);
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:white;
                        font-size:50px;
                    ">
                        🍽️
                    </div>

                    <!-- CONTENT -->
                    <div style="padding:20px;">

                        <h5 class="fw-bold">{{ $p->name }}</h5>

                        <p class="text-muted" style="font-size:14px;">
                            {{ $p->description ?? 'Menu spesial terbaik kami' }}
                        </p>

                        <!-- PRICE -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span style="color:#6d4c41; font-weight:bold;">
                                Rp {{ number_format($p->price) }}
                            </span>
                        </div>

                        <!-- ACTION -->
                        <div class="mt-3 d-flex gap-2">
                            <a href="/edit/{{ $p->id }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/delete/{{ $p->id }}" class="btn btn-sm btn-danger">Hapus</a>
                        </div>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</div>
...
```

### c. File View (`create.blade.php`)
```php
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f1ec;
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    background: #2d1b16;
    position: fixed;
    color: white;
    padding: 20px;
}

.sidebar a {
    display: block;
    color: #ccc;
    margin-bottom: 10px;
    text-decoration: none;
}
.sidebar a:hover {
    color: white;
}

/* CONTENT */
.content {
    margin-left: 260px;
    padding: 30px;
}

/* CARD */
.card {
    border-radius: 10px;
}

/* BUTTON */
.btn-brown {
    background: #6d4c41;
    color: white;
}
.btn-brown:hover {
    background: #4e342e;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <hr>
    <a href="/">🏠 Home</a>
    <a href="/create">➕ Tambah Produk</a>
</div>

<!-- CONTENT -->
<div class="content">

    <h3 class="mb-4">Dashboard Produk</h3>

    <div class="row">

        <!-- FORM -->
        <div class="col-md-5">
            <div class="card p-4 shadow-sm">

                <h5 class="mb-3">Tambah Produk</h5>

                <form action="/store" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-brown w-100">Simpan</button>
                </form>

            </div>
        </div>

        <!-- TABLE -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">

                <h5 class="mb-3">Daftar Produk</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>Rp {{ number_format($p->price) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>

</body>
</html>

```




# Penjelasan Code
```

Aplikasi ini merupakan solusi digital berbasis framework Laravel dan database MySQL yang dirancang untuk mengotomatisasi pengelolaan katalog Restoran Mas Jakobi secara dinamis. Melalui arsitektur MVC, setiap data produk yang diinput oleh admin akan diproses oleh Controller, disimpan ke dalam Database, dan ditampilkan kembali secara otomatis pada halaman utama web menggunakan Blade Engine. Sistem ini memastikan penyampaian informasi harga dan deskripsi produk berjalan efektif, sekaligus mendukung target digitalisasi Ngawi Barat dalam menciptakan ekosistem kerja berbasis teknologi.
```


# Output Program



