<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('home', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $nama);
            $data['image'] = $nama;
        }

        Product::create($data);

        return redirect('/');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/');
    }
}