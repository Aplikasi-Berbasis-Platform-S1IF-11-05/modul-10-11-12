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
    <strong>Amanda Windhu Gustyas</strong>
    <br>
    <strong>2311102121</strong>
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

Laravel merupakan salah satu framework berbasis PHP yang banyak digunakan dalam pengembangan aplikasi web modern. Framework ini mengadopsi konsep Model-View-Controller (MVC) yang bertujuan untuk memisahkan antara logika aplikasi, pengolahan data, dan tampilan antarmuka pengguna. Dengan adanya pemisahan tersebut, pengembangan aplikasi menjadi lebih terstruktur, mudah dipelihara, serta mendukung pengembangan sistem yang berskala besar. Laravel juga menyediakan berbagai fitur pendukung seperti routing, migration, dan templating engine Blade yang mempermudah proses pengembangan aplikasi.

Konsep Model-View-Controller (MVC) merupakan pola arsitektur perangkat lunak yang membagi aplikasi menjadi tiga komponen utama, yaitu Model, View, dan Controller. Model bertanggung jawab dalam mengelola data serta berinteraksi langsung dengan database. View berfungsi untuk menampilkan data kepada pengguna dalam bentuk antarmuka yang interaktif. Sedangkan Controller berperan sebagai penghubung antara Model dan View, yang mengatur alur logika aplikasi. Penerapan MVC pada Laravel memungkinkan pengembang untuk membangun aplikasi yang lebih modular dan terorganisir.

Dalam pengolahan data, terdapat empat operasi dasar yang dikenal dengan istilah CRUD (Create, Read, Update, Delete). Operasi Create digunakan untuk menambahkan data baru ke dalam database, Read untuk menampilkan data yang telah tersimpan, Update untuk memperbarui data, dan Delete untuk menghapus data. Pada sistem yang dibangun, konsep CRUD diterapkan untuk mengelola data produk makanan, sehingga pengguna dapat menambah, melihat, mengubah, dan menghapus data secara dinamis melalui antarmuka web.

Database merupakan komponen penting dalam sebuah sistem informasi yang berfungsi untuk menyimpan dan mengelola data secara terstruktur. Dalam penelitian ini digunakan MySQL sebagai sistem manajemen basis data. MySQL dipilih karena bersifat open source, mudah digunakan, serta memiliki performa yang baik dalam pengolahan data. Data produk makanan disimpan dalam tabel `products` yang berisi atribut seperti nama produk, harga, deskripsi, serta waktu pembuatan dan pembaruan data.

Untuk menampilkan data ke dalam halaman web, Laravel menggunakan Blade sebagai templating engine. Blade memungkinkan pengembang untuk menulis kode tampilan dengan lebih ringkas dan dinamis melalui penggunaan sintaks khusus seperti perulangan dan kondisi. Dengan Blade, data dari database dapat ditampilkan secara langsung ke dalam halaman web tanpa harus menulis kode PHP secara kompleks.

Selain itu, dalam pengembangan antarmuka pengguna digunakan Tailwind CSS sebagai framework CSS. Tailwind CSS memungkinkan pembuatan desain yang modern dan responsif dengan pendekatan utility-first, sehingga mempermudah dalam mengatur tampilan tanpa harus menulis banyak kode CSS secara manual. Penggunaan Tailwind CSS pada sistem ini bertujuan untuk menghasilkan tampilan yang menarik, sederhana, dan konsisten.

Dalam proses pengembangan dan pengujian aplikasi, digunakan XAMPP sebagai server lokal yang menyediakan Apache dan MySQL. XAMPP memudahkan pengembang dalam menjalankan aplikasi berbasis web secara lokal sebelum di-deploy ke server. Dengan demikian, seluruh proses pengembangan dapat dilakukan secara efisien dan terkontrol.

# Kode web.php
```php
//231110121
//Amanda Windhu Gustyas

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/update/{id}', [ProductController::class, 'update']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
```

# Kode Controller.php
```php
//231110121
//Amanda Windhu Gustyas

<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
```
# Kode create.blade.php
```php
//231110121
//Amanda Windhu Gustyas

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-center">➕ Tambah Produk</h2>

    <form action="/store" method="POST" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block mb-1 font-medium">Nama Produk</label>
            <input type="text" name="nama_produk"
                class="w-full border p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Masukkan nama produk" required>
        </div>

        <!-- Harga -->
        <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="harga"
                class="w-full border p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Masukkan harga" required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi"
                class="w-full border p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Masukkan deskripsi" required></textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between">
            <a href="/" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                ← Kembali
            </a>

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Simpan
            </button>
        </div>

    </form>

</div>

</body>
</html>
```

# Kode edit.blade.php
```php
//231110121
//Amanda Windhu Gustyas

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-center">✏️ Edit Produk</h2>

    <form action="/update/{{ $product->id }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block mb-1 font-medium">Nama Produk</label>
            <input type="text" name="nama_produk"
                value="{{ $product->nama_produk }}"
                class="w-full border p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>
        </div>

        <!-- Harga -->
        <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="harga"
                value="{{ $product->harga }}"
                class="w-full border p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi"
                class="w-full border p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>{{ $product->deskripsi }}</textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between">
            <a href="/" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                ← Kembali
            </a>

            <button type="submit"
                class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">
                Update
            </button>
        </div>

    </form>

</div>

</body>
</html>
```
# Kode home.blade.php
```php
//231110121
//Amanda Windhu Gustyas

<!DOCTYPE html>
<html>
<head>
    <title>Festival Makanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50">

<div class="max-w-6xl mx-auto py-10">

    <!-- JUDUL -->
    <h1 class="text-3xl font-bold mb-4 text-center text-pink-500">
        🍜 Festival Makanan
    </h1>

    <!-- TOMBOL TAMBAH -->
    <div class="text-center mb-6">
        <a href="/create" 
           class="bg-pink-400 text-white px-5 py-2 rounded-xl hover:bg-pink-500 transition duration-300 shadow">
           + Tambah Produk
        </a>
    </div>

    <!-- GRID PRODUK -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($products as $p)
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-pink-100">

            <!-- NAMA -->
            <h2 class="text-xl font-semibold text-gray-800">
                {{ $p->nama_produk }}
            </h2>

            <!-- DESKRIPSI -->
            <p class="text-gray-500 mt-2">
                {{ $p->deskripsi }}
            </p>

            <!-- HARGA -->
            <p class="text-pink-500 font-bold mt-3">
                Rp {{ number_format($p->harga) }}
            </p>

            <!-- BUTTON -->
            <div class="mt-4 flex gap-2">

                <!-- EDIT -->
                <a href="/edit/{{ $p->id }}" 
                   class="bg-pink-300 px-3 py-1 rounded-lg text-white hover:bg-pink-400 transition">
                   ✏️ Edit
                </a>

                <!-- DELETE -->
                <a href="/delete/{{ $p->id }}" 
                   onclick="return confirm('Yakin mau hapus?')" 
                   class="bg-rose-400 px-3 py-1 rounded-lg text-white hover:bg-rose-500 transition">
                   🗑️ Hapus
                </a>

            </div>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>
```

Output:
## 1️ Halaman Utama

<img src="images/1.png" width="1000%"><br/>

## Penjelasan
Menampilkan seluruh data produk makanan yang tersimpan di database.  
Setiap produk memiliki nama, deskripsi, harga, serta tombol aksi (Edit & Hapus).<br/>

## 2 Form Tambah Produk

  <img src="images/2.png" width="1000"><br/>
  <img src="images/3.png" width="1000"><br/>

## Penjelasan
Halaman ini digunakan untuk menambahkan data produk baru.  
User mengisi nama produk, harga, dan deskripsi, lalu klik tombol simpan.<br/>

## 3 Form TEdit Produk

  <img src="images/4.png" width="1000"><br/>
  <img src="images/5.png" width="1000"><br/>

## Penjelasan
Halaman ini digunakan untuk mengubah data produk.  
Field akan otomatis terisi dengan data sebelumnya sehingga bisa diedit.<br/>

## 4 Konfirmasi Hapus Produk

  <img src="images/6.png" width="1000"><br/>
  <img src="images/7.png" width="1000"><br/>

## Penjelasan
Saat tombol hapus ditekan, sistem akan menampilkan alert konfirmasi.  
Tujuannya untuk mencegah pengguna menghapus data secara tidak sengaja.<br/>

## 5 Database (phpMyAdmin)

  <img src="images/8.png" width="1000"><br/>

## Penjelasan
Data produk disimpan dalam tabel `products` pada database MySQL.  
Field yang digunakan:<br/>
- id<br/>
- nama_produk<br/>
- harga<br/>
- deskripsi<br/>
- created_at<br/>
- updated_at<br/>