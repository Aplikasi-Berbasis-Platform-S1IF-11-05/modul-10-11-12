<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function dashboard()
    {
        $products = Product::latest()->take(6)->get();
        return view('dashboard', compact('products'));
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
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
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['name','description','price']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products','public');
        }

        Product::create($data);

        return redirect('/products')->with('success','Berhasil tambah produk');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $data = $request->only(['name','description','price']);
        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products','public');
        }

        $product->update($data);

        return redirect('/products')->with('success','Berhasil update');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect('/products')->with('success','Berhasil hapus');
    }
}