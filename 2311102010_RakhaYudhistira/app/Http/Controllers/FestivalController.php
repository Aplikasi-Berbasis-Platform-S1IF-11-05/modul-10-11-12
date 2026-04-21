<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FestivalController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
