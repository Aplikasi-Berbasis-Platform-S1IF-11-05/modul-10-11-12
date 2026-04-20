<!DOCTYPE html>

<html>
<head>
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial;
            background-color: #e6f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

    .container {
        background: white;
        padding: 25px;
        border-radius: 10px;
        width: 350px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #3399ff;
        color: white;
        border: none;
        margin-top: 10px;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Edit Produk</h2>

<form action="/update/{{ $product->id }}" method="POST">
    @csrf

    <label>Nama</label>
    <input type="text" name="nama" value="{{ $product->nama }}">

    <label>Harga</label>
    <input type="number" name="harga" value="{{ $product->harga }}">

    <label>Deskripsi</label>
    <textarea name="deskripsi">{{ $product->deskripsi }}</textarea>

    <button type="submit">Update</button>
</form>

<a href="/">Kembali</a>

</div>

</body>
</html>
