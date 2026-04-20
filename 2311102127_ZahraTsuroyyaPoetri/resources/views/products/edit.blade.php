@extends('template')

@section('title', 'Edit Produk')

@section('content')

<div class="main-container">

    <div class="box">

        <div class="title-box">
            <h2>Edit Produk</h2>
        </div>

        @include('products.form', [
            'route' => route('products.update', $product->id),
            'method' => 'PUT',
            'product' => $product
        ])

    </div>

</div>

@endsection