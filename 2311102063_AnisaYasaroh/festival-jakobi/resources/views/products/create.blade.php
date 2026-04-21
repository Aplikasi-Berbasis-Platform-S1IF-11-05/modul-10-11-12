@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(to right, #74ebd5, #6a9ff8);
    }

    .form-box {
        background: rgba(255,255,255,0.95);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .btn-main {
        background: linear-gradient(to right, #36d1dc, #5b86e5);
        color: white;
        border: none;
        border-radius: 20px;
    }
</style>

<h2 class="text-center mb-4 fw-bold">Tambah Produk</h2>

<div class="row justify-content-center">
<div class="col-md-6">

<div class="form-box">

<form action="/products" method="POST" enctype="multipart/form-data">
@csrf

<input type="text" name="name" placeholder="Nama Produk" class="form-control mb-3">

<textarea name="description" placeholder="Deskripsi" class="form-control mb-3"></textarea>

<input type="number" name="price" placeholder="Harga" class="form-control mb-3">

<!-- INPUT IMAGE -->
<input type="file" name="image" class="form-control mb-3" onchange="previewImage(event)">

<!-- PREVIEW -->
<img id="preview" width="100%" class="mb-3 rounded" style="display:none;">

<div class="d-flex justify-content-between">
<a href="/products" class="btn btn-outline-dark rounded-pill">Kembali</a>
<button class="btn btn-main px-4">Simpan</button>
</div>

</form>

</div>
</div>
</div>

<script>
function previewImage(event){
    const reader = new FileReader();
    reader.onload = function(){
        const img = document.getElementById('preview');
        img.src = reader.result;
        img.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection