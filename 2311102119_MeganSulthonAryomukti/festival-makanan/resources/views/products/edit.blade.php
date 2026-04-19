@extends('layouts.app')

@section('content')
    <h1>Edit Produk</h1>

    <div class="form-card">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ $product->nama_produk }}">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" value="{{ $product->harga }}">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ $product->kategori }}">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" value="{{ $product->stok }}">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi">{{ $product->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label>Gambar Baru</label>
                <input type="file" name="gambar">
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
@endsection