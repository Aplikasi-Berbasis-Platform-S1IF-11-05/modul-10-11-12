<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image_url'];
}
