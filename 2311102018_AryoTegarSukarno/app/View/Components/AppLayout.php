@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>➕ Tambah Makanan</h3>

    <form method="POST" action="/makanan">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input name="harga" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>

</div>
@endsection
