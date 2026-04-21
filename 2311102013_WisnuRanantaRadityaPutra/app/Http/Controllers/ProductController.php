<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib ditambahkan untuk fitur hapus/upload file

class ProductController extends Controller
{
    public function frontPage()
    {
        $products = Product::all();
        return view('festival', ['products' => $products, 'halaman' => 'depan']);
    }

    public function index()
    {
        $products = Product::all();
        return view('festival', ['products' => $products, 'halaman' => 'manajemen']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi file gambar (maks 2MB)
        ]);

        $data = $request->all();

        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder 'storage/app/public/products'
            $data['image_url'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Menu berhasil ditambah!');
    }

    public function edit(Product $product)
    {
        $products = Product::all();
        return view('festival', [
            'products' => $products, 
            'halaman' => 'manajemen', 
            'editProduct' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required', 
            'description' => 'required', 
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Jika user mengupload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage jika ada
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url);
            }
            // Simpan gambar baru
            $data['image_url'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Menu berhasil diubah!');
    }

    public function destroy(Product $product)
    {
        // Hapus file gambar dari folder sebelum menghapus data dari database
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Menu dihapus!');
    }
}