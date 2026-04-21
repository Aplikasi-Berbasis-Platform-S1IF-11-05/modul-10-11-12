<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function store(Request $request) {
        $data = $request->all();

        // Cek jika ada upload file gambar
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            
            // Simpan ke folder public/images
            $file->move(public_path('images'), $nama_file);
            
            // Simpan nama filenya ke kolom image_url
            $data['image_url'] = $nama_file;
        }

        Product::create($data);
        return back()->with('success', 'Produk berhasil ditambah!');
    }

    public function update(Request $request, Product $admin) {
        $data = $request->all();

        if ($request->hasFile('image_url')) {
            // Hapus file lama jika ada agar tidak memenuhi storage Ngawi
            if ($admin->image_url && File::exists(public_path('images/' . $admin->image_url))) {
                File::delete(public_path('images/' . $admin->image_url));
            }

            $file = $request->file('image_url');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images'), $nama_file);
            
            $data['image_url'] = $nama_file;
        }

        $admin->update($data);
        return back()->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $admin) {
        // Hapus file gambar dari folder
        if ($admin->image_url && File::exists(public_path('images/' . $admin->image_url))) {
            File::delete(public_path('images/' . $admin->image_url));
        }

        $admin->delete();
        return back()->with('success', 'Produk berhasil dihapus!');
    }
}