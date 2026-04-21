<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>

    <form action="/update/{{ $product->id }}" method="POST">
        @csrf
        <input type="text" name="nama" value="{{ $product->nama }}"><br><br>
        <input type="number" name="harga" value="{{ $product->harga }}"><br><br>
        <textarea name="deskripsi">{{ $product->deskripsi }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>