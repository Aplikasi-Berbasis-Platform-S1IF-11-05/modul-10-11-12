<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/');
    }

    public function edit($id)
{
    $product = Product::find($id);
    return view('edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::find($id);
    $product->update($request->all());
    return redirect('/');
}

public function delete($id)
{
    $product = Product::find($id);
    $product->delete();
    return redirect('/');
}
}