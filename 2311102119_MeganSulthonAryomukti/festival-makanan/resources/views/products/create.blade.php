@extends('layouts.app')

@section('content')
    <h1>Tambah Produk</h1>

    <div class="form-card">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"></textarea>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar">
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection