<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model Category
 *
 * Mewakili kategori produk dalam sistem festival makanan PawonNgawiFest.
 * Digunakan untuk mengelompokkan menu seperti 'Makanan Khas', 'Minuman Segar', dsb.
 */
class Category extends Model {
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Mendapatkan semua produk yang terkait dengan kategori ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
}