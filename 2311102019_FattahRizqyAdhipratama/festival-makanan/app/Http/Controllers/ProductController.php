<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Halaman Landing (Tampilan yang ada di screenshot kamu)
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    // Halaman Daftar Produk (Jika ingin ada dashboard khusus list)
    // Jika tidak butuh, fungsi ini bisa dikosongkan/dihapus
    /*
    public function list() 
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    */

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('home')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('home')->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('home')->with('success', 'Menu berhasil dihapus!');
    }
}