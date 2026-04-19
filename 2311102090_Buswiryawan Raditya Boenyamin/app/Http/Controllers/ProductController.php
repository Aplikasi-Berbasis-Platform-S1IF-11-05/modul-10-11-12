<?php
// Buswiryawan Raditya Boenyamin
// 2311102090

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function index(Request $request)
    {
        $category   = $request->get('category', 'semua');
        $query      = Product::orderBy('category')->orderBy('name');
        if ($category !== 'semua') $query->byCategory($category);

        $products   = $query->get();
        $categories = Product::distinct()->pluck('category')->sort()->values();

        return view('products.index', compact('products', 'categories', 'category'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string',
            'stock'       => 'required|integer|min:0',
            'portion'     => 'nullable|string|max:100',
            'image_url'   => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['name','description','price','category','stock','portion']);
        $data['is_available'] = $request->has('is_available');
        if ($request->hasFile('image'))       $data['image'] = $request->file('image')->store('products','public');
        elseif ($request->filled('image_url')) $data['image'] = $request->image_url;

        Product::create($data);
        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string',
            'stock'       => 'required|integer|min:0',
            'portion'     => 'nullable|string|max:100',
            'image_url'   => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['name','description','price','category','stock','portion']);
        $data['is_available'] = $request->has('is_available');
        if ($request->hasFile('image'))       $data['image'] = $request->file('image')->store('products','public');
        elseif ($request->filled('image_url')) $data['image'] = $request->image_url;

        $product->update($data);
        return redirect()->route('home')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('home')->with('success', 'Produk berhasil dihapus!');
    }
}