<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 11,12,13 <br> Laravel </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Zahra Tsuroyya Poetri</strong>
    <br>
    <strong>2311102127</strong>
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
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026</h3>
</div>

<hr>

### Dasar Teori

Laravel merupakan framework berbasis PHP yang bersifat open-source dan dapat digunakan secara gratis, yang dikembangkan oleh Taylor Otwell. Framework ini dirancang untuk mempermudah pengembangan aplikasi web dengan menyediakan struktur yang terorganisir serta fitur-fitur yang mendukung efisiensi pengembangan. Laravel mengadopsi arsitektur Model-View-Controller (MVC), yaitu pola yang memisahkan antara pengolahan data (model), tampilan (view), dan logika aplikasi (controller), sehingga memudahkan dalam pengelolaan dan pemeliharaan sistem.

Dalam implementasinya, Laravel memiliki perbedaan dengan konsep MVC pada umumnya, yaitu dengan adanya komponen routing. Routing berfungsi sebagai penghubung antara request dari pengguna dengan controller yang akan memproses request tersebut. Dengan demikian, controller tidak menerima request secara langsung, melainkan melalui proses routing terlebih dahulu, sehingga alur aplikasi menjadi lebih terstruktur dan fleksibel (Yudanto dkk., 2017).

## Tugas 11,12,13 

### Source Code - ProductController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create', [
            'title' => 'Tambah',
            'product' => new Product(),
            'route' => route('products.store'),
            'method' => 'POST'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', [
            'title' => 'Edit',
            'product' => $product,
            'route' => route('products.update', $product->id),
            'method' => 'PUT'
        ]);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus');
    }
}
```

### Source Code - template.blade.php

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas Modul 11,12,13</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe4ec, #fff6cc, #e0f7ff);
            background-attachment: fixed;
        }

        .header-box {
            width: 90%;
            max-width: 700px;
            margin: 40px auto 10px auto;
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(12px);
            padding: 20px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        .page-title {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }

        .page-desc {
            margin-top: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }

        .section-box {
            width: 94%;
            background: rgba(255,255,255,0.65);
            backdrop-filter: blur(10px);
            padding: 14px 20px;
            border-radius: 14px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.06);
            text-align: center;
        }

        .section-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            background: linear-gradient(90deg, #ff7eb3, #ffb347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-wrapper {
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            position: relative;
            z-index: 1;
            margin-top: 10px;
        }

        .card {
            background: white;
            padding: 18px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: 0.25s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .desc {
            color: #6b7280;
            font-size: 14px;
        }

        .price {
            margin-top: 8px;
            font-weight: 600;
            color: #f59e0b;
        }

        .actions {
            margin-top: 12px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            align-items: center;
        }

        .icon-btn {
            border: none;
            background: none;
            padding: 4px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .icon-edit { color: #22c55e; }
        .icon-delete { color: #ef4444; }

        .icon-edit:hover {
            transform: scale(1.2);
            color: #16a34a;
        }

        .icon-delete:hover {
            transform: scale(1.2);
            color: #dc2626;
        }

        .floating-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(135deg, #ff7eb3, #ffb347);
            color: white;
            padding: 14px 18px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-family: inherit;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #ff7eb3, #ffb347);
            color: white;
            font-weight: 500;
            cursor: pointer;
        }

        .sparkle {
            position: fixed;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            opacity: 0.9;
            animation: fireworkFloat 8s linear infinite;
            filter: blur(0.5px);
        }

        .sparkle.red { background: #ff2d2d; }
        .sparkle.pink { background: #ff2dfc; }
        .sparkle.yellow { background: #ffcc00; }
        .sparkle.blue { background: #00bfff; }
        .sparkle.green { background: #00e676; }

        @keyframes fireworkFloat {
            0% {
                transform: translateY(0) translateX(0) scale(0.6);
                opacity: 0;
            }

            10% {
                opacity: 0.8;
            }

            25% {
                transform: translateY(-25vh) translateX(-10px);
            }

            50% {
                transform: translateY(-50vh) translateX(10px);
            }

            75% {
                transform: translateY(-75vh) translateX(-8px);
            }

            100% {
                transform: translateY(-110vh) translateX(5px) scale(0.8);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <div class="header-box">
        <h1 class="page-title">Festival Kuliner Ngawi Barat</h1>
        <p class="page-desc">
            Jelajahi berbagai hidangan lezat dari restoran lokal dalam rangka Festival Kuliner Ngawi Barat, sebagai bagian dari upaya digitalisasi untuk mendukung pertumbuhan ekonomi daerah.
        </p>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <div class="sparkle red" style="left:5%; animation-delay:0s;"></div>
    <div class="sparkle pink" style="left:10%; animation-delay:1s;"></div>
    <div class="sparkle yellow" style="left:15%; animation-delay:2s;"></div>
    <div class="sparkle blue" style="left:20%; animation-delay:3s;"></div>
    <div class="sparkle green" style="left:25%; animation-delay:4s;"></div>

    <div class="sparkle red" style="left:30%; animation-delay:1.5s;"></div>
    <div class="sparkle pink" style="left:35%; animation-delay:2.5s;"></div>
    <div class="sparkle yellow" style="left:40%; animation-delay:3.5s;"></div>
    <div class="sparkle blue" style="left:45%; animation-delay:4.5s;"></div>
    <div class="sparkle green" style="left:50%; animation-delay:0.5s;"></div>

    <div class="sparkle red" style="left:55%; animation-delay:2s;"></div>
    <div class="sparkle pink" style="left:60%; animation-delay:3s;"></div>
    <div class="sparkle yellow" style="left:65%; animation-delay:4s;"></div>
    <div class="sparkle blue" style="left:70%; animation-delay:1s;"></div>
    <div class="sparkle green" style="left:75%; animation-delay:2.2s;"></div>

    <div class="sparkle red" style="left:80%; animation-delay:3.2s;"></div>
    <div class="sparkle pink" style="left:85%; animation-delay:4.2s;"></div>
    <div class="sparkle yellow" style="left:90%; animation-delay:1.2s;"></div>
    <div class="sparkle blue" style="left:95%; animation-delay:2.8s;"></div>

</body>
</html>
```

### Source Code - index.blade.php

```php
@extends('template')

@section('content')

<div class="section-wrapper">
    <div class="section-box">
        <h2 class="section-title">Menu Pilihan</h2>
    </div>
</div>

<div class="grid">
@foreach($products as $product)
    <div class="card">

        <h3>{{ $product->name }}</h3>

        <p class="desc">
            {{ $product->description }}
        </p>

        <p class="price">
            Rp {{ number_format($product->price,0,',','.') }}
        </p>

        <div class="actions">

            <a href="{{ route('products.edit',$product->id) }}"
            class="icon-btn icon-edit">
                <i class="bi bi-pencil"></i>
            </a>

            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="icon-btn icon-delete">
                    <i class="bi bi-trash"></i>
                </button>
            </form>

</div>

    </div>
@endforeach
</div>

<a href="{{ route('products.create') }}" class="floating-btn">
    + Tambah
</a>

@endsection
```

### Source Code - form.blade.php

```php
@extends('template')

@section('content')

<div class="form-wrapper">

    <div class="form-card">

        <h2 style="margin-bottom:20px;">
            {{ isset($product->id) ? 'Edit Menu' : 'Tambah Menu' }}
        </h2>

        <form action="{{ isset($product->id) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
            @csrf

            @if(isset($product->id))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" name="name" value="{{ $product->name ?? '' }}" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" value="{{ $product->price ?? '' }}" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" rows="4" required>{{ $product->description ?? '' }}</textarea>
            </div>

            <button class="btn-submit">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection
```

### Source Code - create.blade.php

```php
@extends('template')

@section('title', 'Tambah Produk')

@section('content')

<div class="main-container">

    <div class="box">

        <div class="title-box">
            <h2>Tambah Produk</h2>
        </div>

        @include('products.form', [
            'route' => route('products.store'),
            'method' => 'POST',
            'product' => new \App\Models\Product()
        ])

    </div>

</div>

@endsection
```

### SOurce Code - edit.blade.php

```php
@extends('template')

@section('title', 'Edit Produk')

@section('content')

<div class="main-container">

    <div class="box">

        <div class="title-box">
            <h2>Edit Produk</h2>
        </div>

        @include('products.form', [
            'route' => route('products.update', $product->id),
            'method' => 'PUT',
            'product' => $product
        ])

    </div>

</div>

@endsection
```

### Source Code - web.php

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::resource('products', ProductController::class);
```

### Hasil Output

![Hasil Output](modul11_12_13(1).png)

![Hasil Output](modul11_12_13(2).png)

![Hasil Output](modul11_12_13(3).png)

![Hasil Output](modul11_12_13(4).png)


### Deskripsi Kode

Kode tersebut merupakan aplikasi web berbasis Laravel yang digunakan untuk menampilkan dan mengelola data produk makanan dalam konteks festival kuliner. Aplikasi ini berfungsi sebagai sistem CRUD, sehingga pengguna dapat menambahkan, melihat, mengedit, dan menghapus data menu yang akan ditampilkan di halaman utama.

Cara kerjanya, routing mengarahkan request ke ProductController yang menangani seluruh proses seperti mengambil data, menyimpan, mengubah, dan menghapus produk dari database. Data dikelola menggunakan model Product, sedangkan tampilan dibuat dengan Blade template seperti halaman daftar produk dan form input.

Hasil output berupa halaman web yang menampilkan daftar menu dalam bentuk card berisi nama, deskripsi, dan harga. Pengguna juga dapat mengakses fitur tambah, edit, dan hapus melalui tombol yang tersedia.


