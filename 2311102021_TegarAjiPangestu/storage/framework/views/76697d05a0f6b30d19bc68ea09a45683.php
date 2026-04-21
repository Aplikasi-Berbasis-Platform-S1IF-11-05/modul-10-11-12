<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
        }

        /* Card Form */
        .card {
            background: #1e293b;
            border-radius: 18px;
            border: none;
        }

        h2 {
            color: #f1f5f9;
        }

        /* Input */
        .form-control {
            background: #020617;
            border: 1px solid #334155;
            color: #e2e8f0;
        }

        .form-control:focus {
            background: #020617;
            color: white;
            border-color: #3b82f6;
            box-shadow: none;
        }

        label {
            color: #cbd5f5;
        }

        /* Button */
        .btn-save {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            border: none;
            color: white;
        }

        .btn-back {
            background: #334155;
            color: white;
            border: none;
        }

        .btn-save:hover,
        .btn-back:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow col-md-6 mx-auto">

        <h2 class="text-center mb-4">Tambah Produk</h2>

        <form action="/store" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="/" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>

        </form>

    </div>
</div>

</body>
</html><?php /**PATH E:\SEMESTER6\praktikum\modul10\2311102021_TegarAjiPangestu\FestivalMakanan\resources\views/create.blade.php ENDPATH**/ ?>