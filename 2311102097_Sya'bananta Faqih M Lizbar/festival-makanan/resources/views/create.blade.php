<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Menu</h1>

    <form action="/store" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama makanan"><br><br>
        <input type="number" name="harga" placeholder="Harga"><br><br>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>