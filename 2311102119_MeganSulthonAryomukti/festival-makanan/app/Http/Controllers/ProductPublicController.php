<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductPublicController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('category')
            ->where('is_published', true)
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_published, 404);

        return view('products.show', compact('product'));
    }
}
