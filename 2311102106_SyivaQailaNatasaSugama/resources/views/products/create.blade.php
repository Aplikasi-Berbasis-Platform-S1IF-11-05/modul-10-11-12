@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <section class="card">
        <h1 style="margin-top: 0;">Tambah Produk Baru</h1>
        <p class="help">Isi data produk yang akan tampil di festival makanan.</p>

        <form action="{{ route('products.store') }}" method="POST">
            @include('products._form')
        </form>
    </section>
@endsection
