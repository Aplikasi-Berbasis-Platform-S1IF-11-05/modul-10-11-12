<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Restoran Mas Jakobi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .card-container {
            width: 100%;
            max-width: 650px;
            background: #fff;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            border: none;
        }

        .card-header-gradient {
            /* Menyamakan dengan gradient di halaman utama Mas Jakobi */
            background: linear-gradient(90deg, #ff8c00 0%, #ff4500 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #e0e0e0;
            background-color: #fdfdfd;
            transition: all 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.15);
            border-color: #ff8c00;
        }

        .btn-save {
            background: linear-gradient(90deg, #ff8c00 0%, #ff4500 100%);
            border: none;
            border-radius: 15px;
            padding: 14px;
            font-weight: 700;
            color: white;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 69, 0, 0.3);
            color: white;
            opacity: 0.9;
        }

        .btn-back {
            text-decoration: none;
            color: #888;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s;
        }

        .btn-back:hover {
            color: #ff4500;
        }

        .input-group-text {
            background-color: #fff;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #888;
        }

        .has-prefix .form-control {
            border-left: none;
        }
    </style>
</head>
<body>

    <div class="card-container animate__animated animate__fadeInUp">
        <div class="card-header-gradient">
            <h2 class="fw-bold mb-1">Tambah Produk</h2>
            <p class="mb-0 opacity-75">Festival Makanan Restoran Mas Jakobi</p>
        </div>

        <div class="card-body p-4 p-md-5">
            @if($errors->any())
                <div class="alert alert-danger border-0 shadow-sm animate__animated animate__shakeX">
                    <ul class="mb-0 small fw-bold">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label"><i class="bi bi-tag me-1"></i> Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukan nama hidangan..." required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label"><i class="bi bi-cash-stack me-1"></i> Harga</label>
                        <div class="input-group has-prefix">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" class="form-control" placeholder="0" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label"><i class="bi bi-box-seam me-1"></i> Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Jumlah stok" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label"><i class="bi bi-grid me-1"></i> Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Makanan Utama, Minuman, Dessert" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label"><i class="bi bi-image me-1"></i> Gambar (URL)</label>
                        <input type="text" name="gambar" class="form-control" placeholder="https://link-foto-makanan.com/foto.jpg">
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label"><i class="bi bi-justify-left me-1"></i> Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan keunikan rasa masakan ini..."></textarea>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-check-circle-fill me-2"></i> Simpan ke Daftar Menu
                    </button>
                    <div class="text-center mt-3">
                        <a href="{{ route('products.index') }}" class="btn-back">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>