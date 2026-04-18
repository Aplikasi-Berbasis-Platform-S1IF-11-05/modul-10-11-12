<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #fff0f5;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: #ff4d88;
}

/* FORM CARD */
.form-card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

/* BUTTON */
.btn-pink {
    background: #ff4d88;
    color: white;
    border: none;
}

.btn-pink:hover {
    background: #e6005c;
}

/* INPUT */
.form-control {
    border-radius: 10px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand">🍓 Festival Makanan</span>
    <a href="/" class="btn btn-light">← Kembali</a>
</nav>

<!-- FORM -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="form-card">
                <h3 class="mb-4 text-center">✨ Tambah Produk Baru</h3>

                <form action="/store" method="POST">
                    @csrf

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Seblak Pedas">
                    </div>

                    <!-- HARGA -->
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="price" class="form-control" placeholder="Contoh: 15000">
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi makanan..."></textarea>
                    </div>

                    <!-- BUTTON -->
                    <div class="d-grid">
                        <button class="btn btn-pink">💾 Simpan Produk</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>