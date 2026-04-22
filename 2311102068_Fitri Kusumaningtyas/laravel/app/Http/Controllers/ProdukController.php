<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // READ 
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    // CREATE 
    public function create()
    {
        return view('produk.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
            'gambar'      => 'nullable|image',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = file_get_contents($request->file('gambar')->getRealPath());
        }

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'gambar'      => $gambar,
        ]);

        return redirect('/')->with('success', 'Produk berhasil ditambahkan!');
    }

    // EDIT 
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // UPDATE 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
            'gambar'      => 'nullable|image',
        ]);

        $produk = Produk::findOrFail($id);

        $gambar = $produk->gambar; // tetap pakai gambar lama
        if ($request->hasFile('gambar')) {
            $gambar = file_get_contents($request->file('gambar')->getRealPath());
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'gambar'      => $gambar,
        ]);

        return redirect('/')->with('success', 'Produk berhasil diupdate!');
    }

    // DELETE 
    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect('/')->with('success', 'Produk berhasil dihapus!');
    }

    public function showGambar($id)
    {
        $produk = Produk::findOrFail($id);

        if (!$produk->gambar) {
            abort(404);
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($produk->gambar);

        return response($produk->gambar)
            ->header('Content-Type', $mimeType);
    }
}