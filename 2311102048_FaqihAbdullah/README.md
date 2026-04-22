<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 10-11-12 <br> LARAVEL DAN DATABASE </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Faqih Abdullah</strong>
    <br>
    <strong>2311102048</strong>
    <br>
    <strong>IF - 11 - 05</strong>
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

## Dasar Teori

Laravel adalah framework PHP berbasis arsitektur Model-View-Controller (MVC) yang memisahkan logika aplikasi, pengolahan data, dan tampilan antarmuka agar pengembangan lebih terstruktur. Pada project ini, Laravel digunakan untuk membangun website festival makanan dengan dua sisi utama: halaman publik untuk pengunjung dan dashboard admin untuk pengelolaan produk.

Interaksi data dilakukan menggunakan Eloquent ORM dengan database MySQL. Struktur data mencakup tabel `categories` dan `products`, sehingga data produk (nama, harga, deskripsi, stok, gambar, status publish) dapat dikelola secara relasional. Validasi input diterapkan di controller untuk menjaga konsistensi data, misalnya harga harus numeric dan deskripsi wajib diisi.

Antarmuka dibangun menggunakan Blade dan Tailwind CSS. Konsep UI modern seperti glassmorphism navbar, sticky navigation, dark mode toggle, serta komponen responsif diterapkan agar aplikasi nyaman digunakan di desktop maupun perangkat mobile.

## Tugas Restoran Mas Jakobi

Project ini mengimplementasikan kebutuhan digitalisasi festival makanan dengan fitur:

- Halaman publik untuk menampilkan katalog produk dan detail produk.
- Informasi jadwal festival dan profil kolaborasi Jakobi x Ladesh.
- Dashboard admin dengan autentikasi.
- CRUD produk (tambah, ubah, hapus, publish/unpublish).
- Upload gambar produk dengan preview langsung.
- Rich text editor sederhana untuk deskripsi produk.

## Code `web.php`

```php
<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductPublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductPublicController::class, 'index'])->name('home');
Route::get('/produk/{product:slug}', [ProductPublicController::class, 'show'])->name('products.show');

Route::middleware('guest')->group(function (): void {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::middleware('admin.auth')->group(function (): void {
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin', fn () => redirect()->route('admin.products.index'));
    Route::resource('/admin/products', ProductController::class)->except(['show'])->names('admin.products');
});
```

## Code `ProductController.php` (Admin)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePayload($request);
        $validated['slug'] = $this->generateUniqueSlug($validated['name']);
        $validated['image'] = $request->file('image')?->store('products', 'public');

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    private function validatePayload(Request $request, ?int $ignoreProductId = null): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]) + [
            'is_published' => $request->boolean('is_published'),
        ];
    }
}
```

## Code `ProductPublicController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductPublicController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('category')
            ->where('is_published', true)
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_published, 404);

        return view('products.show', compact('product'));
    }
}
```

## Code `Product.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'description',
        'image',
        'stock',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_published' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
```

## Code `Category.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
```

## Konfigurasi dan Menjalankan Program

1. Install dependency:

```bash
composer install
```

2. Atur koneksi database MySQL di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=festival_makanan
DB_USERNAME=root
DB_PASSWORD=
```

3. Generate key dan migrasi + seed:

```bash
php artisan key:generate
php artisan migrate --seed
```

4. Buat symlink storage untuk gambar:

```bash
php artisan storage:link
```

5. Jalankan server:

```bash
php artisan serve
```

## Akun Admin Default

- Email: `admin@festivalfood.test`
- Password: `password`

## Screenshot Output


```md
<img src="public/screenshots/Beranda(dark).png" alt="Halaman Beranda gelap" width="100%">
<img src="public/screenshots/Beranda(light).png" alt="Halaman Beranda terang" width="100%">
<img src="public/screenshots/detail produk.png" alt="Detail Produk" width="100%">
<img src="public/screenshots/jadwal Festival.png" alt="Jadwal Festival" width="100%">
<img src="public/screenshots/Katalog Produk.png" alt="Katalog Produk" width="100%">
<img src="public/screenshots/login.png" alt="Login Admin" width="100%">
<img src="public/screenshots/dashboard admin.png" alt="Dashboard Admin" width="100%">
<img src="public/screenshots/Tambah Produk.png" alt="Form Tambah Produk" width="100%">
<img src="public/screenshots/Tentang Kami.png" alt="Dark Mode Dashboard" width="100%">
```



## Penjelasan Code

Project ini adalah aplikasi web festival makanan berbasis Laravel dan MySQL dengan arsitektur MVC. Dari sisi publik, pengunjung dapat melihat daftar produk yang sudah dipublish, membaca detail produk, melihat jadwal festival, serta informasi kolaborasi Jakobi x Ladesh. Tampilan dirancang modern dengan Tailwind CSS, glassmorphism navbar, sticky navigation, hover animation, dark mode, dan desain responsif.

Dari sisi admin, sistem menyediakan autentikasi login serta modul CRUD produk. Data produk dikelola melalui `ProductController` dengan validasi input pada setiap proses simpan/update. Upload gambar disimpan ke storage publik Laravel, lalu ditampilkan pada halaman katalog. Relasi kategori-produk dikelola menggunakan Eloquent (`Category` dan `Product`), sehingga struktur data lebih rapi dan mudah dikembangkan.

Fitur tambahan yang mendukung usability admin adalah preview gambar sebelum submit, rich text editor sederhana pada deskripsi, serta tampilan dashboard yang tetap nyaman saat diakses lewat perangkat mobile. Dengan implementasi ini, website siap digunakan sebagai media digitalisasi promosi festival makanan.
