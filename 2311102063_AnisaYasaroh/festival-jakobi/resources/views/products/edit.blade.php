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

<h2 class="text-center mb-4 fw-bold">Edit Produk</h2>

<div class="row justify-content-center">
<div class="col-md-6">

<div class="form-box">

<form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $product->name }}" class="form-control mb-3">

<textarea name="description" class="form-control mb-3">{{ $product->description }}</textarea>

<input type="number" name="price" value="{{ $product->price }}" class="form-control mb-3">

<!-- IMAGE -->
<input type="file" name="image" class="form-control mb-3" onchange="previewImage(event)">

<!-- GAMBAR LAMA -->
@if($product->image)
    <img id="preview" src="{{ asset('storage/'.$product->image) }}" width="100%" class="mb-3 rounded">
@else
    <img id="preview" width="100%" class="mb-3 rounded" style="display:none;">
@endif

<div class="d-flex justify-content-between">
<a href="/products" class="btn btn-outline-dark rounded-pill">Kembali</a>
<button class="btn btn-main px-4">Update</button>
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