<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->paginate(8);

        $totalActiveProducts = $featuredProducts->total();

        return view('public.landing', compact('featuredProducts', 'totalActiveProducts'));
    }

    public function about()
    {
        $stats = [
            'totalProducts' => Product::where('is_active', true)->count(),
            'totalCategories' => Category::count(),
            'averagePrice' => Product::where('is_active', true)->avg('price') ?? 0,
        ];

        return view('public.about', compact('stats'));
    }

    public function products(Request $request)
    {
        $categories = Category::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        $selectedCategory = (string) $request->query('category', '');

        $productsQuery = Product::with('category')
            ->where('is_active', true)
            ->latest();

        if ($selectedCategory !== '') {
            $productsQuery->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }

        $products = $productsQuery->paginate(12)->withQueryString();
        $selectedCategoryName = optional($categories->firstWhere('slug', $selectedCategory))->name;

        return view('public.products', compact('products', 'categories', 'selectedCategory', 'selectedCategoryName'));
    }
}
