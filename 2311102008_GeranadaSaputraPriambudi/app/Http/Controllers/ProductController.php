<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('welcome', compact('products'));
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
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'stock'       => 'required|integer|min:0',
            'rating'      => 'required|numeric|min:0|max:5',
        ]);

        $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category'    => $request->category,
            'image'       => $imageName,
            'stock'       => $request->stock,
            'rating'      => $request->rating,
        ]);

        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan ke festival! 🎉');
    }

    public function destroy(Product $product)
    {
        // Hapus file gambar dari storage jika ada
        $imagePath = public_path('images/' . $product->image);
        if ($product->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();

        return redirect()->route('home')->with('success', 'Produk berhasil dihapus dari festival! 🗑️');
    }
}
