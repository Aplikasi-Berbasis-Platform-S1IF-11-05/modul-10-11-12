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
```
### b. File View (`landing.blade.php`)
Halaman muka sebagai gerbang utama program digitalisasi Ngawi Barat yang menampilkan visi Jendral Ladesh.

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngawi Food Fest | Digitalisasi Ngawi Timur</title>
    <script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com)"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center font-sans">
    <div class="text-center px-6">
        <h2 class="text-green-500 font-bold uppercase tracking-widest mb-2">Program Digitalisasi Ngawi Barat</h2>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">
            NGAWI <span class="text-green-400">FOOD FEST</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-10">
            Mewujudkan 19 ribu lapangan kerja melalui digitalisasi kuliner. 
            Menghadirkan cita rasa autentik dari Restoran Mas Jakobi untuk dunia.
        </p>

        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('products.index') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-10 py-4 rounded-full text-lg font-bold transition-all shadow-lg">
                Lihat Katalog Menu
            </a>
        </div>
    </div>
</body>
</html>
```
### c. File View (products/index.blade.php)

```html
<body class="bg-gray-900 text-white min-h-screen p-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-green-400">Dashboard Menu Ngawi</h1>
            <a href="{{ route('products.create') }}" class="bg-green-600 px-4 py-2 rounded-lg font-semibold">
                + Tambah Menu Baru
            </a>
        </div>

        <div class="bg-gray-800 rounded-xl overflow-hidden border border-gray-700">
            <table class="w-full text-left">
                <thead class="bg-gray-700 text-gray-300">
                    <tr>
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-750">
                        <td class="p-4">{{ $product->name }}</td>
                        <td class="p-4 text-green-400">Rp {{ number_format($product->price) }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-400 mx-2">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
```

### d. File View (products/create.blade.php)

```html
<form action="{{ route('products.store') }}" method="POST" class="bg-gray-800 p-8 rounded-xl">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-400 mb-2">Nama Produk</label>
        <input type="text" name="name" class="w-full bg-gray-700 rounded p-2" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-400 mb-2">Harga</label>
        <input type="number" name="price" class="w-full bg-gray-700 rounded p-2" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-400 mb-2">Deskripsi</label>
        <textarea name="description" class="w-full bg-gray-700 rounded p-2" required></textarea>
    </div>
    <button type="submit" class="w-full bg-green-600 py-3 rounded-lg font-bold">Simpan Menu</button>
</form>
```

### e. File Model (Product.php)

```PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Mengizinkan mass assignment agar fungsi create() dan update() berjalan lancar
    protected $fillable = ['name', 'description', 'price'];
}
