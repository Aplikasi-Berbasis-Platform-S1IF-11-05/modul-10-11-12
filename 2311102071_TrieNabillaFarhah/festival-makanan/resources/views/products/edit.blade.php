@extends('layouts.app')

@section('content')

<style>

        html, body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #3d2b1f 0%, #8b5e3c 100%);
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

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        outline: none;
    }

    input:focus, textarea:focus {
        border-color: #8b5e3c;
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

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-update {
        flex: 1;
        padding: 10px;
        border-radius: 10px;
        border: none;
        background: #2d1e17;
        color: white;
        cursor: pointer;
    }

    .btn-back {
        flex: 1;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;
        text-align: center;
        background: #ccc;
        color: black;
    }
</style>

<div class="wrapper">
    <div class="card">

        <h1>Edit Produk</h1>

        <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- PREVIEW FOTO -->
            <div class="preview">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" id="previewImg">
                @else
                    <img src="{{ asset('images/ayam.png') }}" id="previewImg">
                @endif
            </div>

            <!-- NAMA -->
            <input type="text" name="name" value="{{ $product->name }}">

            <!-- HARGA -->
            <input type="number" name="price" value="{{ $product->price }}">

            <!-- RATING -->
            <input type="number" name="rating" value="{{ $product->rating }}" min="1" max="5">

            <!-- DESKRIPSI -->
            <textarea name="description">{{ $product->description }}</textarea>

            <!-- FOTO -->
            <input type="file" name="image" id="imageInput">

            <!-- BUTTON -->
            <div class="actions">
                <button class="btn-update">Update</button>
                <a href="/menu" class="btn-back">Kembali</a>
            </div>

        </form>

    </div>
</div>

<script>
    // preview gambar
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