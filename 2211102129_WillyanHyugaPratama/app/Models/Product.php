<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'badge',
        'description',
        'price',
        'image_url',
        'featured',
        'is_active',
    ];

    protected $casts = [
        'price' => 'integer',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
