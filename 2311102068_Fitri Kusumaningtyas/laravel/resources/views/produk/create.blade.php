<h1>Tambah Produk</h1>

<form method="POST" action="/produk">
@csrf
<input type="text" name="nama_produk" placeholder="Nama Produk"><br>
<textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
<input type="number" name="harga" placeholder="Harga"><br>
<input type="text" name="gambar" placeholder="Nama gambar"><br>
<button type="submit">Simpan</button>
</form>