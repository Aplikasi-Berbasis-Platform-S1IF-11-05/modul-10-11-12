<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

/**
 * Class HomeController
 * 
 * Menangani logika untuk halaman depan (landing page) publik.
 * Mengambil data produk beserta kategorinya untuk ditampilkan kepada pengunjung.
 */
class HomeController extends Controller {
    /**
     * Menampilkan halaman utama aplikasi PawonNgawiFest.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $categories = Category::with('products')->get();

        return view('welcome', compact('categories'));
    }
}