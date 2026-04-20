@extends('template')

@section('content')

<div class="form-wrapper">

    <div class="form-card">

        <h2 style="margin-bottom:20px;">
            {{ isset($product->id) ? 'Edit Menu' : 'Tambah Menu' }}
        </h2>

        <form action="{{ isset($product->id) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
            @csrf

            @if(isset($product->id))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" name="name" value="{{ $product->name ?? '' }}" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" value="{{ $product->price ?? '' }}" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" rows="4" required>{{ $product->description ?? '' }}</textarea>
            </div>

            <button class="btn-submit">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection