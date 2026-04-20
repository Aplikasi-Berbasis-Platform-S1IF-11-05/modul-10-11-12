<!DOCTYPE html>

<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #3399ff;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #3399ff;
        color: white;
        border: none;
        border-radius: 6px;
        margin-top: 15px;
        cursor: pointer;
    }

    button:hover {
        background-color: #267acc;
    }

    .error {
        color: red;
        font-size: 12px;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 10px;
        text-decoration: none;
        color: #3399ff;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Tambah Produk 🍜</h2>

@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/store" method="POST">
    @csrf

    <label>Nama Produk</label>
    <input type="text" name="nama" placeholder="Masukkan nama produk" required>

    <label>Harga</label>
    <input type="number" name="harga" placeholder="Masukkan harga" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" placeholder="Masukkan deskripsi produk" required></textarea>

    <button type="submit">Simpan</button>
</form>

<a href="/">← Kembali ke Home</a>

</div>

</body>
</html>
