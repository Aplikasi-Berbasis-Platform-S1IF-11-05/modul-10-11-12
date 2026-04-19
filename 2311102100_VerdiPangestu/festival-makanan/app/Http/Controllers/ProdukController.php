<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // ← WAJIB DITAMBAHKAN untuk fitur hapus gambar

class ProdukController extends Controller
{
    public function home()
    {
        $produks = Produk::where('tersedia', true)->get();
        return view('welcome', compact('produks')); // ← halaman publik
    }

    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks')); // ← halaman admin
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
            'kategori'    => 'required',
            'gambar'      => 'nullable|image|file|max:2048', // Validasi gambar (maks 2MB)
        ]);

        // Tambahkan nilai untuk checkbox tersedia
        $validatedData['tersedia'] = $request->has('tersedia');

        // Logika simpan gambar
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('produk-images', 'public');
        }

        Produk::create($validatedData);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric|min:0',
            'kategori'    => 'required|string',
            'gambar'      => 'nullable|image|file|max:2048', // Tambahkan validasi gambar
        ]);

        $produk = Produk::findOrFail($id);

        // Update nilai ketersediaan
        $validatedData['tersedia'] = $request->has('tersedia');

        // Logika update gambar
        if ($request->file('gambar')) {
            // Hapus gambar lama dari server JIKA ada
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            // Simpan gambar yang baru diupload
            $validatedData['gambar'] = $request->file('gambar')->store('produk-images', 'public');
        }

        $produk->update($validatedData);

        return redirect('/produk')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus file gambar dari server sebelum menghapus data dari database
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus!');
    }
}