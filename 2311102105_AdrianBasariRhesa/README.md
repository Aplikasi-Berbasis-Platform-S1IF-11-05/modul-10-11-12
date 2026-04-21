<div align="center">
    <br />
    <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM</h1>
    <br />
    <h3>MODUL 11, 12, 13 <br> LARAVEL</h3>
    <br />
    <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
    <br />
    <br />
    <br />
    <h3>Disusun Oleh :</h3>
    <p>
        <strong>Adrian Basari Rhesa</strong>
        <br>
        <strong>2311102105</strong>
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
    <h3>LABORATORIUM HIGH PERFORMANCE <br> FAKULTAS INFORMATIKA <br> UNIVERSITAS TELKOM PURWOKERTO <br> 2026</h3>
</div>

<hr>

# Dasar Teori

Laravel merupakan framework PHP yang menggunakan konsep Model-View-Controller (MVC) untuk memudahkan pengembangan aplikasi web agar lebih terstruktur, efisien, dan mudah dipelihara. Pada konsep ini, Model berfungsi mengelola data dan berinteraksi dengan database, View menangani tampilan antarmuka, sedangkan Controller mengatur alur logika aplikasi serta menghubungkan model dengan view. Dengan pola MVC, kode program menjadi lebih rapi dan mudah dikembangkan.

Laravel juga memiliki fitur routing yang digunakan untuk mengatur jalur akses URL menuju controller atau halaman tertentu. Routing berperan penting dalam menentukan halaman yang ditampilkan ketika pengguna mengakses alamat tertentu. Selain itu, Laravel menyediakan Blade Template Engine yang membantu pembuatan tampilan dinamis dengan sintaks yang sederhana.

Dalam pengelolaan database, Laravel menyediakan migration untuk membuat dan mengelola struktur tabel secara terkontrol tanpa harus menulis SQL secara manual. Untuk manipulasi data, Laravel menggunakan Eloquent ORM, sehingga tabel pada database dapat direpresentasikan sebagai objek dan proses CRUD menjadi lebih mudah dipahami.

Pada praktikum Modul 11, 12, dan 13, Laravel digunakan untuk membangun aplikasi web festival makanan yang menampilkan produk restoran Mas Jakobi. Sistem ini dibuat menggunakan Laravel sebagai framework utama dan MySQL sebagai media penyimpanan data. Implementasinya meliputi pembuatan migration, model, controller, route, view, serta fitur CRUD untuk mengelola data produk.

# Tujuan Praktikum

1.Memahami dasar penggunaan framework Laravel.
2.Memahami penerapan konsep MVC pada Laravel.
3.Mampu menghubungkan Laravel dengan database MySQL.
4.Mampu membuat tabel database menggunakan migration.
5.Mampu membuat fitur CRUD pada Laravel.
6.Mampu menampilkan data produk pada halaman web.
7.Mampu membangun aplikasi web sederhana sesuai studi kasus.

# Deskripsi Tugas

Pada tugas gabungan Modul 11, 12, dan 13, dibuat sebuah sistem digitalisasi untuk restoran milik Mas Jakobi yang berlokasi di Ngawi Timur. Restoran tersebut didanai oleh Jendral Ladesh dari Ngawi Barat sebagai bagian dari program digitalisasi untuk mendukung terciptanya 19.000 lapangan pekerjaan.

Bentuk digitalisasi tersebut diwujudkan dalam sebuah website festival makanan yang menampilkan produk-produk restoran Mas Jakobi. Pada halaman utama, setiap produk ditampilkan beserta informasi penting seperti:

-Nama produk
-Harga produk
-Deskripsi produk
-Kategori produk
-Stok produk
-Status ketersediaan produk
-Gambar produk

Aplikasi ini dibangun menggunakan:

-Framework Laravel
-Database MySQL

# Analisis Kebutuhan Sistem

## Kebutuhan Fungsional

Sistem yang dibangun harus mampu:

1. Menampilkan daftar produk pada halaman utama.
2. Menampilkan detail produk makanan.
3. Menambahkan data produk baru.
4. Mengubah data produk.
5. Menghapus data produk.
6. Menyimpan seluruh data produk ke database MySQL.
7. Mengunggah gambar produk.

## Kebutuhan Non-Fungsional

Sistem yang dibangun harus:

1. Menggunakan framework Laravel.
2. Menggunakan database MySQL.
3. Memiliki tampilan antarmuka yang sederhana dan mudah digunakan.
4. Memiliki struktur kode yang rapi dan terorganisir.
5. Dapat dijalankan pada localhost menggunakan XAMPP dan VS Code.

# Tools dan Teknologi

- **Framework**: Laravel
- **Bahasa Pemrograman**: PHP
- **Database**: MySQL
- **Text Editor**: Visual Studio Code
- **Server Lokal**: XAMPP
- **Template Engine**: Blade
- **Versioning Database**: Migration
- **ORM**: Eloquent

# Struktur Database

Database yang digunakan bernama:

```sql
products
```
# Screenshot Output

#### Halaman Publik
1. **Beranda.png** - Tampilan beranda.
<img width="1913" height="964" alt="Screenshot 2026-04-21 220206" src="https://github.com/user-attachments/assets/25197882-17f7-4a39-ad2a-b2130118523b" />

2. **Kelola Produk.png** - Tampilan kelola produk.
<img width="1919" height="971" alt="Screenshot 2026-04-21 220228" src="https://github.com/user-attachments/assets/f28131b2-88b2-4ab5-9012-06eaa2d7a2d8" />

3. **Tambah Produk.png** - Tampilan halaman tambah produk.
<img width="1915" height="970" alt="Screenshot 2026-04-21 220217" src="https://github.com/user-attachments/assets/0295f584-50bd-4dde-8b86-2e77fd79fcb1" />

4. **Edit Porduk.png** - Tampilan halaman edit produk.
<img width="1914" height="960" alt="Screenshot 2026-04-21 220447" src="https://github.com/user-attachments/assets/06937378-51bd-4c8c-a03d-708cebceee6f" />

5. **Hapus Produk.png** - Tampilan halaman hasil hapus produk es cebong.
<img width="1919" height="962" alt="Screenshot 2026-04-21 220510" src="https://github.com/user-attachments/assets/ea1f0e10-d160-45e9-94a7-98e96c46bcc7" />
