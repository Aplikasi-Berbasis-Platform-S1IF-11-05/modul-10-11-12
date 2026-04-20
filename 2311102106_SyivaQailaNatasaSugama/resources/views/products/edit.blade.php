@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <section class="card">
        <h1 style="margin-top: 0;">Edit Produk</h1>
        <p class="help">Perbarui data produk agar informasi di halaman depan selalu akurat.</p>

        <form action="{{ route('products.update', $product) }}" method="POST">
            @method('PUT')
            @include('products._form')
        </form>
    </section>
@endsection
