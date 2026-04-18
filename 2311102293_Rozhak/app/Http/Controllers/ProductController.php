<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

/**
 * Class ProductController
 * 
 * Menangani fungsi administratif (CRUD) untuk pengelolaan menu atau produk.
 * Memungkinkan administrator untuk menambah, melihat, mengubah, dan menghapus menu restoran.
 */
class ProductController extends Controller {
    /**
     * Menampilkan daftar semua produk di panel admin.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $products = Product::with('category')->latest()->get();
        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru yang dikirimkan melalui formulir ke database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|url'
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Menu berhasil ditambahkan ke Pawon!');
    }

    /**
     * Menampilkan formulir edit untuk produk tertentu.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Memperbarui data produk tertentu di database.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id) {
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|url'
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Menghapus produk tertentu dari database.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Menu berhasil dihapus!');
    }
}