<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'category', 'description', 'price', 'image',
        'preparation_time', 'regional_origin', 'calories', 'total_fat',
        'protein', 'carbs', 'sodium', 'ingredients', 'allergens',
        'method', 'serving_suggestion', 'rating', 'review_count',
    ];

    protected function casts(): array
    {
        return [
            'ingredients' => 'array',
            'allergens' => 'array',
            'price' => 'decimal:2',
            'rating' => 'decimal:1',
        ];
    }
}
