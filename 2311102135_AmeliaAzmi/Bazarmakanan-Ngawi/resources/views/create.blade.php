<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f1ec;
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    background: #2d1b16;
    position: fixed;
    color: white;
    padding: 20px;
}

.sidebar a {
    display: block;
    color: #ccc;
    margin-bottom: 10px;
    text-decoration: none;
}
.sidebar a:hover {
    color: white;
}

/* CONTENT */
.content {
    margin-left: 260px;
    padding: 30px;
}

/* CARD */
.card {
    border-radius: 10px;
}

/* BUTTON */
.btn-brown {
    background: #6d4c41;
    color: white;
}
.btn-brown:hover {
    background: #4e342e;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <hr>
    <a href="/">🏠 Home</a>
    <a href="/create">➕ Tambah Produk</a>
</div>

<!-- CONTENT -->
<div class="content">

    <h3 class="mb-4">Dashboard Produk</h3>

    <div class="row">

        <!-- FORM -->
        <div class="col-md-5">
            <div class="card p-4 shadow-sm">

                <h5 class="mb-3">Tambah Produk</h5>

                <form action="/store" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-brown w-100">Simpan</button>
                </form>

            </div>
        </div>

        <!-- TABLE -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">

                <h5 class="mb-3">Daftar Produk</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>Rp {{ number_format($p->price) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>

</body>
</html>