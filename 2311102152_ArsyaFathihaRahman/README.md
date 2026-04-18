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
    <strong>Arsya Fathiha Rahman</strong>
    <br>
    <strong>2311102152</strong>
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


# 📚 Dasar Teori

## 1. Laravel

Laravel merupakan framework PHP yang digunakan untuk membangun aplikasi web dengan struktur yang rapi dan terorganisir. Laravel menggunakan konsep MVC (Model, View, Controller) yang memisahkan antara logika program, tampilan, dan pengolahan data.

Dengan Laravel, proses pengembangan menjadi lebih cepat karena sudah tersedia berbagai fitur seperti routing, ORM (Eloquent), dan template engine Blade. Laravel juga mendukung keamanan yang baik serta mudah dalam pengelolaan database.

---

## 2. MVC (Model View Controller)

MVC adalah konsep arsitektur dalam pengembangan aplikasi yang membagi program menjadi tiga bagian utama.

Model berfungsi untuk mengelola data dan berinteraksi dengan database  
View digunakan untuk menampilkan data ke pengguna  
Controller bertugas mengatur alur logika dan menghubungkan model dengan view  

Dengan adanya MVC, kode menjadi lebih terstruktur dan mudah dikembangkan.

---

## 3. MySQL

MySQL merupakan sistem manajemen database yang digunakan untuk menyimpan data secara terstruktur. Dalam aplikasi ini, MySQL digunakan untuk menyimpan data produk makanan seperti nama, harga, dan deskripsi.

Data yang tersimpan di database dapat diakses dan ditampilkan kembali melalui Laravel menggunakan model.

---

## 4. Eloquent ORM

Eloquent ORM adalah fitur dari Laravel yang digunakan untuk mengakses database menggunakan model. Dengan Eloquent, pengambilan data tidak perlu menggunakan query SQL secara langsung, melainkan cukup menggunakan kode PHP.

Contohnya adalah Product::all() yang digunakan untuk mengambil seluruh data produk dari database.

---
# 💻 Studi Kasus

Mas Jakobi memiliki restoran di Ngawi Timur yang didanai oleh Jendral Ladesh dari Ngawi Barat. Dalam rangka mendukung program digitalisasi yang bertujuan membuka 19 ribu lapangan pekerjaan, Mas Jakobi diminta untuk membuat sebuah website festival makanan.

Website ini berfungsi untuk menampilkan produk makanan dari restoran Mas Jakobi secara online. Setiap produk memiliki informasi berupa nama makanan, harga, dan deskripsi. Sistem ini dibangun menggunakan framework Laravel dan database MySQL.

Dengan adanya website ini, diharapkan proses promosi dan penyebaran informasi produk menjadi lebih luas dan efisien.

---

# 💻 Tugas 11, 12, 13 — Laravel dan Database

## Source Code yang utama 

### a. File View (`home.blade.php`)
```php
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Festival Makanan Ngawi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #fff0f5;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: #ff4d88;
}

/* HERO */
.hero {
    background: linear-gradient(90deg, #ff4d88, #ff99cc);
    color: white;
    padding: 70px;
    text-align: center;
}

.search-box {
    max-width: 500px;
    margin: auto;
}

/* CARD */
.card {
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
}

/* HEADER CARD (GANTI GAMBAR) */
.card-header-custom {
    height: 120px;
    background: linear-gradient(90deg, #ff4d88, #ff99cc);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: white;
}

/* BADGE */
.badge {
    background: #ff4d88;
}

/* FOOTER */
.footer {
    background: #ff4d88;
    color: white;
    padding: 20px;
    text-align: center;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand">🍓 Festival Makanan</span>

    <ul class="navbar-nav flex-row ms-auto gap-3">
        <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
    </ul>

    <a href="/create" class="btn btn-light ms-3">+ Tambah</a>
</nav>

<!-- HERO -->
<div class="hero">
    <h1>Festival Makanan Ngawi 🍜</h1>
    <p>Kuliner viral, enak, dan kekinian 💖</p>

    <div class="search-box mt-3">
        <input type="text" class="form-control" placeholder="Cari makanan...">
    </div>
</div>

<!-- CONTENT -->
<div class="container mt-5">

    <!-- POPULER -->
    <h3 class="mb-4">🔥 Makanan Terpopuler</h3>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow">

                <!-- GANTI GAMBAR JADI HEADER -->
                <div class="card-header-custom">
                    🍜
                </div>

                <div class="card-body">
                    <h5>{{ $p->name }}</h5>

                    <p class="text-muted">Rp {{ number_format($p->price) }}</p>

                    <p>⭐ 4.5 (120 review)</p>

                    <span class="badge">Kuliner</span>

                    <p class="text-muted mt-2">📍 Ngawi</p>

                    <p>👨‍🍳 By: UMKM Lokal</p>

                    <div class="mt-3 d-flex gap-2">
                        <button class="btn btn-outline-danger btn-sm">❤️</button>
                        <a href="#" class="btn btn-outline-dark btn-sm">Detail</a>
                        <a href="/delete/{{ $p->id }}" class="btn btn-danger btn-sm">Hapus</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <!-- TERBARU -->
    <h3 class="mb-4 mt-5">🆕 Menu Terbaru</h3>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow">

                <div class="card-header-custom">
                    🍽️
                </div>

                <div class="card-body">
                    <h5>{{ $p->name }}</h5>
                    <p class="text-muted">Rp {{ number_format($p->price) }}</p>

                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-dark btn-sm">Detail</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- FOOTER -->
<div class="footer mt-5">
    <p>© 2026 Festival Makanan Ngawi 💖 | By Arsya</p>
</div>

</body>
</html>
...

### b. File View (`create.blade.php`)
```
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #fff0f5;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: #ff4d88;
}

/* FORM CARD */
.form-card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

/* BUTTON */
.btn-pink {
    background: #ff4d88;
    color: white;
    border: none;
}

.btn-pink:hover {
    background: #e6005c;
}

/* INPUT */
.form-control {
    border-radius: 10px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand">🍓 Festival Makanan</span>
    <a href="/" class="btn btn-light">← Kembali</a>
</nav>

<!-- FORM -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="form-card">
                <h3 class="mb-4 text-center">✨ Tambah Produk Baru</h3>

                <form action="/store" method="POST">
                    @csrf

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Seblak Pedas">
                    </div>

                    <!-- HARGA -->
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="price" class="form-control" placeholder="Contoh: 15000">
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi makanan..."></textarea>
                    </div>

                    <!-- BUTTON -->
                    <div class="d-grid">
                        <button class="btn btn-pink">💾 Simpan Produk</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
```


# 🧠 Penjelasan Program

Program ini dibuat menggunakan framework Laravel dengan konsep MVC, di mana data produk disimpan di dalam database MySQL dan diakses melalui model yang sudah dibuat, yaitu Product.

Pada bagian controller, data produk diambil menggunakan fungsi Product::all() untuk menampilkan seluruh data yang ada di database. Setelah itu, data tersebut dikirim ke bagian view untuk ditampilkan ke halaman website. Tampilan produk dibuat dalam bentuk card supaya lebih rapi, menarik, dan mudah dibaca oleh pengguna.

Selain menampilkan data, sistem ini juga dilengkapi fitur untuk menambahkan dan menghapus produk. Data yang diinput melalui form akan langsung tersimpan ke dalam database, lalu otomatis ditampilkan kembali di halaman utama tanpa perlu melakukan perubahan manual.

Secara keseluruhan, aplikasi ini sudah mampu menampilkan data secara dinamis karena terhubung langsung dengan database. Dengan adanya sistem ini, proses digitalisasi pada restoran Mas Jakobi bisa berjalan dengan lebih efektif, terutama dalam hal promosi dan penyampaian informasi produk ke pengguna.

---

# 🚀 Cara Menjalankan Program


1. Jalankan XAMPP (Apache dan MySQL)
2. Masuk ke folder project Laravel
3. Jalankan perintah:
   php artisan serve
4. Buka browser:
   http://127.0.0.1:8000

---




# 📸 Output

Website menampilkan daftar makanan dengan tampilan modern menggunakan Bootstrap. Setiap produk ditampilkan dalam bentuk card yang berisi nama makanan, harga, dan deskripsi.


