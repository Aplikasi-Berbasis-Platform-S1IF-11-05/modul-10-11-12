<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::query()
            ->with('category')
            ->where('is_available', true)
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('products'));
    }
}
