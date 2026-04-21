<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    // Tambahkan 'kategori', 'stok', dan 'gambar' di sini
    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'gambar',
        'deskripsi'
    ];
}
