<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // READ (home)
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    // CREATE PAGE (ADMIN DASHBOARD)
    public function create()
    {
        $products = Product::all(); // ✅ WAJIB ADA
        return view('create', compact('products'));
    }

    // STORE DATA
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/create'); // biar balik ke dashboard
    }

    // DELETE
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect('/create'); // biar update tabel
    }

    // EDIT PAGE
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return redirect('/create');
    }
}