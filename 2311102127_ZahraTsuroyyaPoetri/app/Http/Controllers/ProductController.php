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