<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 10, 11, 12 <br> Laravel — Festival Makanan Restoran Jakobi </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br /><br /><br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Ahmad Tegar Kahfi Asyngarinanto</strong><br>
    <strong>2311102083</strong><br>
    <strong>S1 IF-11-REG05</strong>
  </p>
  <br />
  <h3>Dosen Pengampu :</h3>
  <p><strong>Dedi Agung Prabowo, S.Kom., M.Kom</strong></p>
  <br /><br />
  <h4>Asisten Praktikum :</h4>
  <strong>Apri Pandu Wicaksono</strong><br>
  <strong>Hamka Zaenul Ardi</strong><br />
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026</h3>
</div>

<hr>

# Latar Belakang

Pada praktikum modul 10, 11, dan 12, dilakukan pembuatan aplikasi web sederhana berbasis Laravel untuk mendukung digitalisasi promosi produk pada restoran Mas Jakobi. Restoran tersebut berada di Ngawi Timur dan memperoleh dukungan pendanaan dari Jendral Ladesh di Ngawi Barat. Bentuk realisasi digitalisasi yang dibuat adalah website festival makanan yang menampilkan daftar produk restoran pada halaman utama beserta informasi penting seperti nama produk, harga, deskripsi, stok, kategori, dan gambar produk.

Aplikasi ini dibangun menggunakan framework Laravel dan database MySQL sesuai kebutuhan praktikum. Laravel dipilih karena menyediakan struktur MVC, routing, migration, Blade templating, dan Eloquent ORM yang mempermudah pengembangan aplikasi. Dengan adanya website ini, proses pengelolaan data produk menjadi lebih terstruktur karena admin dapat menambah, mengubah, melihat, dan menghapus data produk melalui halaman CRUD, sedangkan pengguna dapat melihat daftar produk yang ditampilkan pada halaman depan.

Melalui praktikum ini, mahasiswa dapat memahami implementasi Laravel mulai dari konfigurasi project di Laragon, koneksi database MySQL, pembuatan migration, model, controller, route, view Blade, hingga pengujian aplikasi yang telah dibuat.

# Dasar Teori

## 1. Laravel

Laravel adalah framework PHP berbasis MVC (*Model-View-Controller*) yang paling populer saat ini. Laravel menyediakan banyak fitur bawaan seperti routing, Eloquent ORM, Blade templating, migration, dan seeder yang mempercepat proses development.

---

## 2. MVC (Model-View-Controller)

Arsitektur MVC memisahkan logika aplikasi menjadi tiga bagian:

| Komponen | Peran | Contoh dalam Project |
|----------|-------|----------------------|
| **Model** | Interaksi dengan database | `Product.php` |
| **View** | Tampilan antarmuka pengguna | File `.blade.php` |
| **Controller** | Logika bisnis & penghubung M-V | `ProductController.php` |

---

## 3. Eloquent ORM

Eloquent adalah ORM (*Object-Relational Mapper*) bawaan Laravel yang memudahkan interaksi dengan database menggunakan sintaks PHP tanpa perlu menulis query SQL secara manual.

```php
// Ambil semua produk yang tersedia
$products = Product::where('is_active', true)->get();

// Urutkan produk terbaru
$products = Product::where('is_active', true)->latest()->get();
```

---

## 4. Blade Templating

Blade adalah template engine bawaan Laravel. Blade memungkinkan penulisan logika PHP langsung di dalam HTML dengan sintaks yang lebih bersih.

```blade
@foreach ($products as $product)
    <p>{{ $product->name }}</p>
@endforeach

@if ($products->isEmpty())
    <p>Tidak ada produk.</p>
@endif
```

---

## 5. Migration & Seeder

**Migration** adalah cara Laravel mengelola struktur tabel database menggunakan kode PHP, sehingga struktur database bisa di-version control bersama kode.

**Seeder** digunakan untuk mengisi database dengan data awal (dummy data) secara otomatis.

```bash
php artisan migrate          # Jalankan migration (buat tabel)
php artisan db:seed          # Jalankan seeder (isi data)
php artisan migrate --seed   # Migration + seeder sekaligus
```

---

## 6. Routing

Laravel menggunakan file `routes/web.php` untuk mendefinisikan URL yang tersedia di aplikasi.

```php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
```

---

# Tugas Modul 10, 11, 12 — Festival Makanan Restoran Jakobi

## Dokumentasi Project

### Struktur Folder

```
festival-makanan/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php      ← logika halaman utama
│   │   └── ProductController.php   ← logika CRUD produk
│   └── Models/
│       └── Product.php             ← model Eloquent produk
├── database/
│   ├── migrations/
│   │   └── ..._create_products_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── ProductSeeder.php       ← data awal produk
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php           ← layout utama
│   ├── home.blade.php              ← halaman depan festival makanan
│   └── products/
│       ├── index.blade.php         ← halaman daftar produk
│       ├── create.blade.php        ← halaman tambah produk
│       ├── edit.blade.php          ← halaman edit produk
│       └── show.blade.php          ← halaman detail produk
└── routes/
    └── web.php                     ← definisi route
```

### Cara Setup Project (Laragon)

**1. Buat project Laravel baru**
```bash
composer create-project laravel/laravel festival-makanan
cd festival-makanan
```

**2. Copy semua file dari laporan ini ke folder yang sesuai**

**3. Buat database di Laragon**

Buka HeidiSQL atau phpMyAdmin di Laragon, lalu buat database baru:
```sql
CREATE DATABASE festival_makanan;
```

**4. Setting file `.env`**
```env
APP_NAME="Festival Makanan"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=festival_makanan
DB_USERNAME=root
DB_PASSWORD=
```

**5. Jalankan migration dan seeder**
```bash
php artisan migrate --seed
```

**6. Jalankan storage link**
```bash
php artisan storage:link
```

**7. Jalankan server**
```bash
php artisan serve
```

**8. Buka di browser**
```
http://localhost:8000
```

---

### Fitur Aplikasi

- Halaman utama menampilkan semua produk aktif dalam bentuk card
- Halaman CRUD untuk menambah, melihat, mengubah, dan menghapus produk
- Upload gambar produk
- Data produk tersimpan di database MySQL
- Seeder untuk menambahkan data dummy agar halaman tidak kosong
- Responsive design menggunakan Bootstrap 5

### Struktur Database

Tabel `products`:

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | bigint | Primary key |
| name | varchar | Nama produk |
| price | decimal | Harga produk |
| description | text | Deskripsi produk |
| image | varchar | Gambar produk |
| stock | integer | Jumlah stok |
| category | varchar | Kategori produk |
| is_active | boolean | Status tampil produk |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diperbarui |

### Teknologi yang Digunakan

- **Framework:** Laravel
- **Database:** MySQL
- **ORM:** Eloquent
- **Template Engine:** Blade
- **Frontend:** Bootstrap 5
- **Web Server Local:** Laragon

## Output

### Bukti 1

![Bukti 1](<Assets/Bukti 1.png>)

### Bukti 2

![Bukti 2](<Assets/Bukti 2.png>)

### Bukti 3

![Bukti 3](<Assets/Bukti 3.png>)
