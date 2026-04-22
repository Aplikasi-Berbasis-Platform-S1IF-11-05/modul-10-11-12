@extends('layouts.app')

@section('content')

<style>
html, body {
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #3d2b1f, #8b5e3c);
    min-height: 100vh;
}

body {
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
}

.card {
    background: #f9f4ea;
    padding: 30px;
    border-radius: 20px;
    width: 360px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #2d1e17;
}

.top-bar {
    position: absolute;
    top: 20px;
    left: 20px;
}

.btn-dashboard {
    padding: 6px 12px;
    background: rgba(255,255,255,0.2);
    color: white;
    border-radius: 20px;
    text-decoration: none;
    font-size: 12px;
}

.form-group {
    margin-bottom: 12px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.preview {
    text-align: center;
    margin-bottom: 10px;
}

.preview img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
}

.file-input {
    background: #eee;
    padding: 10px;
    border-radius: 10px;
}

/* BUTTON GROUP */
.btn-group {
    display: flex;
    gap: 10px;
}

.btn-save {
    flex: 1;
    padding: 10px;
    border-radius: 12px;
    border: none;
    background: #2d1e17;
    color: white;
    cursor: pointer;
}

.btn-cancel {
    flex: 1;
    padding: 10px;
    border-radius: 12px;
    text-decoration: none;
    text-align: center;
    background: #ccc;
    color: black;
}
</style>

<div class="top-bar">
    <a href="/" class="btn-dashboard">Dashboard</a>
</div>

<div class="wrapper">
    <div class="card">

        <h1>Tambah Produk</h1>

        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- PREVIEW FOTO -->
            <div class="preview">
                <img src="{{ asset('images/ayam.png') }}" id="previewImg">
            </div>

            <!-- NAMA -->
            <div class="form-group">
                <input type="text" name="name" placeholder="Nama Produk">
            </div>

            <!-- HARGA -->
            <div class="form-group">
                <input type="number" name="price" placeholder="Harga">
            </div>

            <!-- RATING -->
            <div class="form-group">
                <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5">
            </div>

            <!-- DESKRIPSI -->
            <div class="form-group">
                <textarea name="description" placeholder="Deskripsi"></textarea>
            </div>

            <!-- FOTO -->
            <div class="form-group">
                <input type="file" name="image" id="imageInput" class="file-input">
            </div>

            <!-- BUTTON -->
            <div class="btn-group">
                <button type="submit" class="btn-save">Simpan</button>
                <a href="/menu" class="btn-cancel">Cancel</a>
            </div>

        </form>

    </div>
</div>

<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('previewImg');

    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(file) {
            preview.src = URL.createObjectURL(file);
        }
    });
</script>

@endsection