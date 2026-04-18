<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model Product
 *
 * Mewakili item atau menu kuliner yang tersedia di Restoran Mas Jakobi.
 * Berisi informasi detail mengenai nama, deskripsi, harga, dan gambar produk.
 */
class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'name', 
        'description', 
        'price', 
        'image'
    ];

    /**
     * Mendapatkan kategori induk dari produk ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}