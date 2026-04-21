<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan memanggil Model Product

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil data produk untuk ditampilkan di festival
        $products = Product::all();
        
        // Memanggil file festival.blade.php di folder resources/views
        return view('festival', compact('products'));
    }

    public function create()
    {
    return view('create_product'); // Memanggil file form
    }

    public function store(Request $request)
    {
        // 1. Validasi input agar tidak kosong
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        // 2. Simpan ke database
        \App\Models\Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80', // Gambar default
        ]);

        // 3. Kembali ke halaman utama dengan pesan sukses
        return redirect('/')->with('success', 'Menu baru berhasil ditambahkan!');
    }
}