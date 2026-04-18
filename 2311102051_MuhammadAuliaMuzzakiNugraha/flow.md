# PROMPT INSTRUKSI DEVELOPMENT: Web Festival Makanan Ngawi Timur

## 1. Konteks & Tujuan Proyek
Bertindaklah sebagai Senior Full-Stack Developer ahli Laravel. Anda ditugaskan untuk membangun sebuah web katalog dan manajemen produk untuk "Festival Makanan Ngawi Timur". Web ini adalah inisiatif Mas Jakobi, didanai oleh Jendral Ladesh dari Ngawi Barat, dengan tujuan digitalisasi dan mendukung program 19.000 lapangan kerja. 

Aplikasi harus berjalan sempurna, bebas dari halusinasi kode, dan siap digunakan minggu depan. Tulis kode yang bersih, efisien, dan mengikuti standar arsitektur MVC Laravel.

## 2. Tech Stack Utama
* **Backend:** Laravel (versi terbaru yang stabil).
* **Database:** MySQL.
* **Frontend (UI):** Blade Templating dengan Tailwind CSS (Wajib mendukung struktur Dark Mode yang elegan).

## 3. Struktur Database (Migration & Models)
Buatkan file migration dan model untuk 3 tabel berikut, lengkap dengan relasinya:

1.  **`users`**: Tabel bawaan Laravel untuk akses admin (Mas Jakobi). Tambahkan seeder untuk 1 akun admin default.
2.  **`categories`**:
    * `id` (Primary Key)
    * `name` (string)
    * `slug` (string, unique)
    * timestamps
3.  **`products`**:
    * `id` (Primary Key)
    * `category_id` (Foreign Key -> categories.id)
    * `name` (string)
    * `slug` (string, unique)
    * `description` (text)
    * `price` (integer atau decimal)
    * `image_path` (string) -> untuk menyimpan path gambar di storage
    * `is_active` (boolean, default: true)
    * timestamps

## 4. Alur Fitur (Controller & Routing)
Buatkan routing dan controller dengan spesifikasi berikut:

* **Public Facing (Pengunjung):**
    * `GET /` : Halaman Landing Page. Menampilkan semua `products` yang `is_active = true`, urut dari yang terbaru.
    * `GET /product/{slug}` : Halaman detail produk lengkap.
* **Admin Panel (Middleware Auth):**
    * `GET /login` : Halaman login admin.
    * `GET /admin/dashboard` : Halaman ringkasan jumlah kategori dan produk.
    * `Resource Route /admin/categories` : CRUD Kategori.
    * `Resource Route /admin/products` : CRUD Produk. Pastikan ada penanganan upload gambar menggunakan sistem `Storage` Laravel (simpan di `public/storage`).

## 5. Panduan UI/UX (Dark Mode Sleek)
Implementasikan desain antarmuka dengan panduan berikut menggunakan Tailwind CSS:

* **Tema Keseluruhan:** Gunakan nuansa Dark Mode yang premium. Referensi warna background menggunakan `#0F172A` (Slate-900) atau `#121212`. Warna teks utama putih/abu-abu terang (`#F8FAFC`).
* **Aksen Warna:** Gunakan warna kontras yang dinamis seperti Merah Crimson (`#E11D48`) untuk tombol aksi utama atau highlight harga.
* **Landing Page:**
    * Buat Hero Section dengan background gelap, teks "Festival Kuliner Ngawi Timur", dan subtitle yang menyebutkan Mas Jakobi & Jendral Ladesh.
    * Gunakan struktur Grid (3-4 kolom) untuk menampilkan kartu produk (Product Cards).
    * Kartu produk harus memiliki *rounded corners*, menampilkan gambar secara penuh di bagian atas, nama, teks deskripsi yang di-*truncate* (dipotong otomatis), dan harga.
* **Admin Panel:** Desain tabel CRUD yang bersih, form input yang rapi dengan border halus, dan notifikasi sukses/gagal (Flash Message).

## 6. Aturan Ketat untuk AI
* BERIKAN KODE YANG LENGKAP DAN SIAP JALAN. Jangan memotong kode penting dengan komentar seperti `// insert code here`.
* Berikan instruksi singkat langkah-langkah instalasi di awal (contoh: composer install, php artisan migrate, dll).
* Fokus pada fungsionalitas CRUD dan tampilan UI sesuai deskripsi di atas. Jangan menambahkan fitur di luar permintaan ini (seperti payment gateway atau cart) karena ini adalah MVP.

Silakan mulai dengan memberikan struktur Migration dan Model terlebih dahulu, dilanjutkan dengan Controller, dan terakhir bagian View (Blade).