<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->active()
            ->latest()
            ->get();

        $featuredProducts = $products->where('featured', true);
        $startingPrice = $products->min('price');
        $totalProducts = $products->count();

        return view('festival.index', compact(
            'products',
            'featuredProducts',
            'startingPrice',
            'totalProducts'
        ));
    }
}
