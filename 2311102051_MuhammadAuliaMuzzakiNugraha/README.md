<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 11 12 13 <br> Laravel dan Database </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Muhammad Aulia Muzzaki Nugraha</strong>
    <br>
    <strong>2311102051</strong>
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

## Laravel
Laravel adalah framework PHP berbasis arsitektur MVC (Model-View-Controller) yang mempermudah pengembangan aplikasi web secara terstruktur.
Pada program ini, Laravel digunakan untuk:

- Mengatur alur URL melalui routing.
- Memisahkan logika bisnis pada controller.
- Mengelola data melalui model Eloquent ORM.
- Menampilkan antarmuka dengan Blade template.
- Menyediakan autentikasi (login, register, lupa password) secara cepat.

Dengan konsep tersebut, kode menjadi lebih rapi, mudah dipelihara, dan cocok untuk pengembangan aplikasi katalog produk.

## Database
Database adalah sistem penyimpanan data terstruktur yang memungkinkan data disimpan, dicari, dan dikelola secara konsisten.
Program ini menggunakan database relasional (MySQL) dengan tabel utama seperti:

- `users` untuk data akun admin/pengguna.
- `categories` untuk data kategori produk.
- `products` untuk data produk makanan.
- `password_reset_tokens` untuk proses reset password.

Relasi utama pada aplikasi adalah satu kategori memiliki banyak produk (one-to-many), sehingga data lebih terorganisir dan tidak redundan.

## Kaitan Dasar Teori dengan Program
Penerapan Laravel dan database pada program Festival Kuliner Ngawi Timur memungkinkan fitur publik dan admin berjalan terintegrasi, seperti menampilkan katalog produk, filter kategori, CRUD data admin, serta autentikasi dan pengiriman email reset password.


### Screenshot Output

#### Halaman Publik
1. **halaman1.jpeg** - Tampilan beranda/landing page aplikasi Festival Kuliner Ngawi Timur.
<img src="assets/halaman1.jpeg" alt="halaman1" style="width:100%; max-width:900px;">

2. **halaman2.jpeg** - Tampilan halaman produk dengan daftar katalog yang dapat dijelajahi pengguna.
<img src="assets/halaman2.jpeg" alt="halaman2" style="width:100%; max-width:900px;">

3. **halaman3.jpeg** - Tampilan halaman informasi lanjutan publik (tentang/detail konten festival).
<img src="assets/halaman3.jpeg" alt="halaman3" style="width:100%; max-width:900px;">

4. **detailproduk.jpeg** - Halaman detail produk yang menampilkan informasi lengkap satu produk.
<img src="assets/detailproduk.jpeg" alt="detailproduk" style="width:100%; max-width:900px;">

#### Halaman Autentikasi
5. **login.jpeg** - Halaman login admin untuk masuk ke panel pengelolaan sistem.
<img src="assets/login.jpeg" alt="login" style="width:100%; max-width:900px;">

6. **daftar.jpeg** - Halaman pendaftaran akun baru (register).
<img src="assets/daftar.jpeg" alt="daftar" style="width:100%; max-width:900px;">

7. **lupapw.jpeg** - Halaman lupa password untuk meminta tautan reset password.
<img src="assets/lupapw.jpeg" alt="lupapw" style="width:100%; max-width:900px;">

8. **reset-email.jpeg** - Tampilan email reset password yang diterima pengguna.
<img src="assets/reset-email.jpeg" alt="reset-email" style="width:100%; max-width:900px;">

#### Halaman Admin
9. **dashboard.jpeg** - Dashboard admin yang menampilkan ringkasan data sistem.
<img src="assets/dashboard.jpeg" alt="dashboard" style="width:100%; max-width:900px;">

10. **kategori1.jpeg** - Halaman daftar kategori produk pada panel admin.
<img src="assets/kategori1.jpeg" alt="kategori1" style="width:100%; max-width:900px;">

11. **tambahkategori.jpeg** - Form tambah kategori baru pada panel admin.
<img src="assets/tambahkategori.jpeg" alt="tambahkategori" style="width:100%; max-width:900px;">

12. **editKategori.jpeg** - Form edit data kategori pada panel admin.
<img src="assets/editKategori.jpeg" alt="editKategori" style="width:100%; max-width:900px;">

13. **produk1.jpeg** - Halaman daftar produk pada panel admin.
<img src="assets/produk1.jpeg" alt="produk1" style="width:100%; max-width:900px;">

14. **tambahProduk.jpeg** - Form tambah produk baru pada panel admin.
<img src="assets/tambahProduk.jpeg" alt="tambahProduk" style="width:100%; max-width:900px;">

15. **editProduk.jpeg** - Form edit produk pada panel admin.
<img src="assets/editProduk.jpeg" alt="editProduk" style="width:100%; max-width:900px;">

### Penjelasan Program
Aplikasi ini merupakan website katalog Festival Kuliner Ngawi Timur dengan dua sisi utama, yaitu halaman publik dan panel admin.
Halaman publik menampilkan informasi festival, daftar produk, detail produk, serta pagination untuk memudahkan navigasi data.
Panel admin digunakan untuk mengelola kategori dan produk (tambah, ubah, hapus), termasuk upload gambar produk.
Sistem autentikasi juga sudah mendukung pendaftaran akun baru dan reset password melalui email.
