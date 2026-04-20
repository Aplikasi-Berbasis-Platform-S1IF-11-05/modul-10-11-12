@extends('template')

@section('title', 'Tambah Produk')

@section('content')

<div class="main-container">

    <div class="box">

        <div class="title-box">
            <h2>Tambah Produk</h2>
        </div>

        @include('products.form', [
            'route' => route('products.store'),
            'method' => 'POST',
            'product' => new \App\Models\Product()
        ])

    </div>

</div>

@endsection