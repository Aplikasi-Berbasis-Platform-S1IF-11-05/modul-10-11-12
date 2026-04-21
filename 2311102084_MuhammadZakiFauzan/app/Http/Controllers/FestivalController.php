<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FestivalController extends Controller {
    public function index() {
        $data = Produk::all();
        return view('welcome', compact('data'));
    }

    public function create() {
        return view('tambah');
    }

    public function store(Request $request) {
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Pakai nama file yang lebih aman
            $nama_file = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());

            if (!File::isDirectory(public_path('images'))) {
                File::makeDirectory(public_path('images'), 0777, true, true);
            }

            $file->move(public_path('images'), $nama_file);
            $input['gambar'] = $nama_file;
        }
        Produk::create($input);
        return redirect('/');
    }

    public function edit($id) {
        $produk = Produk::find($id);
        return view('edit', compact('produk'));
    }

    public function update(Request $request, $id) {
        $produk = Produk::find($id);
        $input = $request->all();

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && File::exists(public_path('images/' . $produk->gambar))) {
                File::delete(public_path('images/' . $produk->gambar));
            }

            $file = $request->file('gambar');
            $nama_file = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images'), $nama_file);
            $input['gambar'] = $nama_file;
        }

        $produk->update($input);
        return redirect('/');
    }

    public function destroy($id) {
        $produk = Produk::find($id);
        if ($produk->gambar && File::exists(public_path('images/' . $produk->gambar))) {
            File::delete(public_path('images/' . $produk->gambar));
        }
        $produk->delete();
        return redirect('/');
    }
}
