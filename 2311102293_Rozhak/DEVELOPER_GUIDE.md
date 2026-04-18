# PawonNgawiFest Developer Guide

## Deskripsi Proyek

Aplikasi ini merupakan implementasi program digitalisasi Restoran Mas Jakobi di Ngawi Timur yang didukung oleh Jendral Ladesh dari Ngawi Barat. Tujuannya adalah memperluas jangkauan pasar kuliner lokal serta mendukung target penciptaan 19 ribu lapangan kerja melalui pemanfaatan teknologi.

Sistem ini berfungsi sebagai katalog produk digital yang menampilkan kuliner khas Ngawi dengan tampilan modern dan profesional bagi pelanggan maupun pengelola.

> Ning Pawon Ngawi, aku ora mung nggoleki roso, nanging nggoleki sliramu sing tau nggawe ati iki betah. Senajan wis adoh, roso iki iseh podo, ora ono sing bedo. - _Ngawi Nagih Janji_

## Tech Stack

- Framework: Laravel 11/12
- Language: PHP 8.4+
- Database: MySQL (Remote Hosting)
- UI: Bootstrap 5 (Minimalist Theme)
- Icons: Lucide Icons / SVG

## Getting Started

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal (WSL/Linux):

1. Prasyarat
    Pastikan sistem Anda telah menginstal:
   
   - PHP 8.4+ & Composer
   - Node.js & NPM
   - Driver MySQL (sudo apt install php-mysql)

2. Instalasi Dependensi
   
   ```bash
   composer install
   npm install
   ```

3. Konfigurasi Environment
    Salin file .env.example menjadi .env dan sesuaikan kredensial database Anda:
   
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Setup Database
   Reset database dan isi dengan data default festival:
   
   ```bash
   php artisan migrate:fresh --seed
   ```

5. Menjalankan Aplikasi
   
   ```bash
   php artisan serve
   ```
   
    Akses di: http://127.0.0.1:8000

## Struktur Proyek Utama

- app/Models/ — Definisi entitas (User, Category, Product) dan Relasi.
- app/Http/Controllers/ — Logika bisnis (Home & Admin CRUD).
- resources/views/ — Antarmuka Blade dengan tema minimalis.
- database/seeders/ — Pengaturan data dummy awal.

## Standar Desain dan Antarmuka

- Typography: Menggunakan font Inter dengan spacing negatif untuk kesan modern.
- Colors: Dominasi Hitam (#000), Putih (#FFF), dan Neutral Gray.
- Components: Border tipis (1px), bayangan halus, dan radius 12px.

---

Didukung oleh Jendral Ladesh - Ngawi Barat.