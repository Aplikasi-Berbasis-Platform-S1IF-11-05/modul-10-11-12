<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class LandingPageController extends Controller
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imageName,
        ]);

        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan!');
    }
}
