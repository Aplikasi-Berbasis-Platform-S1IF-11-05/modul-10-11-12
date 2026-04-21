<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 11, 12, & 13<br> LARAVEL & DATABASE MYSQL </h3>
  <br />
  <img width="512" height="512" alt="Telkom University" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Rifqi Hemas Pratama</strong>
    <br>
    <strong>2311102302</strong>
    <br>
    <strong>S1 Informatika</strong>
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
# Intisari Teknologi: Laravel Framework & Tailwind CSS

## 1. Mengenal Laravel: The Artisan Framework
Laravel adalah framework PHP yang digunakan untuk menyederhanakan siklus pengembangan web. Dengan sintaks yang ekspresif, Laravel mempermudah pengelolaan database, routing, dan keamanan aplikasi. Dalam proyek ini, Laravel menjadi pondasi utama untuk merealisasikan program kerja digitalisasi Ngawi Barat.

---

## 2. Implementasi Arsitektur MVC
Proyek ini mengimplementasikan pola **Model-View-Controller (MVC)**:
* **Model:** Mengelola struktur data produk di database MySQL.
* **View:** Menampilkan antarmuka pengguna menggunakan mesin template **Blade**.
* **Controller:** Menangani logika bisnis, seperti proses penambahan, pengubahan, dan penghapusan menu.

---

## 3. Tailwind CSS: Modern Styling
Berbeda dengan framework CSS tradisional, proyek ini menggunakan **Tailwind CSS** via CDN. Tailwind memungkinkan pembuatan desain yang *clean*, modern, dan responsif dengan konsep *utility-first*, memberikan fleksibilitas tinggi dalam merancang tema gelap (dark mode) untuk website Ngawi Food Fest.

---

## 4. Database Migration & Eloquent
Laravel menggunakan **Migration** untuk mengelola skema database secara terstruktur. Dengan **Eloquent ORM**, manipulasi data produk dilakukan secara elegan tanpa harus menulis query SQL manual, yang sangat membantu dalam mempercepat penyelesaian tugas praktikum ABP ini.

---

# Proyek: Ngawi Food Fest — Mas Jakobi

## Implementasi Kode Utama

### a. Controller (`ProductController.php`)
Mengatur alur data mulai dari menampilkan katalog hingga fungsi CRUD.
```php
public function index() {
    $products = Product::all();
    return view('products.index', compact('products'));
}

public function store(Request $request) {
    Product::create($request->all());
    return redirect()->route('products.index')->with('success', 'Menu Berhasil Ditambah!');
}
