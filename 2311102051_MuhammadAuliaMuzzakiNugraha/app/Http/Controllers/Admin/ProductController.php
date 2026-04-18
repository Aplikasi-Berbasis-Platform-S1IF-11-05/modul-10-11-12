<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validatePayload($request);
        $validated['category_id'] = $this->resolveCategoryId($request, $validated['category_id'] ?? null);

        $validated['image_path'] = $request->file('image')->store('products', 'public');
        $validated['is_active'] = $request->boolean('is_active');
        unset($validated['image'], $validated['new_category_name']);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $this->validatePayload($request, $product);
        $validated['category_id'] = $this->resolveCategoryId($request, $validated['category_id'] ?? null);

        if ($request->hasFile('image')) {
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }

            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');
    unset($validated['image'], $validated['new_category_name']);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function validatePayload(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'category_id' => ['nullable', 'exists:categories,id', 'required_without:new_category_name'],
            'new_category_name' => ['nullable', 'string', 'max:255', 'required_without:category_id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('products', 'slug')->ignore($product?->id),
            ],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => [
                $product ? 'nullable' : 'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }

    private function resolveCategoryId(Request $request, mixed $existingCategoryId): int
    {
        if (! $request->filled('new_category_name')) {
            return (int) $existingCategoryId;
        }

        $categoryName = trim((string) $request->input('new_category_name'));
        $category = Category::where('name', $categoryName)->first();

        if (! $category) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => $this->generateUniqueCategorySlug($categoryName),
            ]);
        }

        return $category->id;
    }

    private function generateUniqueCategorySlug(string $name): string
    {
        $baseSlug = Str::slug($name);
        $baseSlug = $baseSlug === '' ? 'kategori-baru' : $baseSlug;

        $slug = $baseSlug;
        $counter = 2;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
