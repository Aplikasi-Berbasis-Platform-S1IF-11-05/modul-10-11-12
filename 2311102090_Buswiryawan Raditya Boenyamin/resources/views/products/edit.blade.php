{{--Buswiryawan Raditya Boenyamin
2311102090 --}}
@extends('layouts.app')
@section('title', 'Edit Produk')

@push('styles')
<style>
    .form-card { background:white; border-radius:12px; border:1px solid #EEE; padding:2rem; max-width:700px; margin:0 auto; }
    .form-title { font-family:'Playfair Display',serif; font-size:1.5rem; margin-bottom:1.5rem; padding-bottom:.75rem; border-bottom:2px solid var(--gold); }
    .form-group { margin-bottom:1.2rem; }
    label { display:block; font-size:13px; font-weight:700; margin-bottom:.4rem; color:var(--brown); text-transform:uppercase; letter-spacing:.5px; }
    input[type=text],input[type=number],input[type=url],input[type=file],select,textarea {
        width:100%; padding:10px 14px; border:1.5px solid #DDD; border-radius:8px;
        font-family:'Lato',sans-serif; font-size:14px; transition:border-color .2s;
    }
    input:focus,select:focus,textarea:focus { outline:none; border-color:var(--gold); }
    textarea { height:120px; resize:vertical; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:1rem; }
    .checkbox-label { display:flex; align-items:center; gap:.6rem; font-size:14px; font-weight:400; text-transform:none; letter-spacing:0; cursor:pointer; }
    input[type=checkbox] { width:18px; height:18px; cursor:pointer; }
    .hint { font-size:11px; color:#aaa; margin-top:4px; }
    .current-img { margin-top:.6rem; }
    .current-img img { height:70px; border-radius:8px; display:block; margin-top:4px; object-fit:cover; }
    .btn-submit { background:var(--gold); color:white; border:none; padding:12px 32px; border-radius:8px; font-size:14px; font-weight:700; cursor:pointer; margin-right:.75rem; }
    .btn-submit:hover { opacity:.85; }
    .btn-cancel { color:var(--brown); text-decoration:none; font-size:14px; }
</style>
@endpush

@section('content')
<div class="form-card">
    <div class="form-title"> Edit: {{ $product->name }}</div>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-row">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="category" required>
                    <option value="makanan" {{ old('category',$product->category)=='makanan'?'selected':'' }}> Makanan</option>
                    <option value="minuman" {{ old('category',$product->category)=='minuman'?'selected':'' }}> Minuman</option>
                    <option value="dessert" {{ old('category',$product->category)=='dessert'?'selected':'' }}> Dessert</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" required>{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required>
            </div>
            <div class="form-group">
                <label>Porsi</label>
                <input type="text" name="portion" value="{{ old('portion', $product->portion) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
            </div>
        </div>
        <div class="form-group">
            <label>Ganti Gambar — Upload File</label>
            <input type="file" name="image" accept="image/*">
            @if($product->image)
                <div class="current-img">
                    <span style="font-size:11px;color:#aaa">Gambar saat ini:</span>
                    @if(str_starts_with($product->image, 'http'))
                        <img src="{{ $product->image }}" alt="foto">
                    @else
                        <img src="{{ asset('storage/'.$product->image) }}" alt="foto">
                    @endif
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Ganti Gambar — atau URL Online</label>
            <input type="url" name="image_url"
                   value="{{ old('image_url', str_starts_with($product->image ?? '', 'http') ? $product->image : '') }}"
                   placeholder="https://images.unsplash.com/...">
            <p class="hint">Kosongkan jika tidak ingin mengganti gambar.</p>
        </div>
        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_available" {{ $product->is_available ? 'checked' : '' }}>
                Produk tersedia / aktif dijual
            </label>
        </div>
        <div style="margin-top:1.5rem">
            <button type="submit" class="btn-submit"> Update Produk</button>
            <a href="{{ route('home') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection