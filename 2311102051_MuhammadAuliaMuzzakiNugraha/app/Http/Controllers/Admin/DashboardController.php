<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $productCount = Product::count();
        $activeProductCount = Product::where('is_active', true)->count();
        $latestProducts = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'categoryCount',
            'productCount',
            'activeProductCount',
            'latestProducts'
        ));
    }
}
