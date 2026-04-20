<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Makanan::where('tersedia', true)->get();
        $kategoris = $produks->pluck('kategori')->unique()->sort()->values();
        return view('welcome', compact('produks', 'kategoris'));
    }
}
