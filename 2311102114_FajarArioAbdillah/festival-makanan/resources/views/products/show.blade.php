<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $product->nama_produk }} - Mas Jakobi</title>
    
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

        .detail-container {
            width: 100%;
            max-width: 800px;
            background: #fff;
            border-radius: 35px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: none;
        }

        .header-gradient {
            /* Menyesuaikan dengan gradient Kuning-Oranye Dashboard Mas Jakobi */
            background: linear-gradient(90deg, #f7e61c 0%, #ff8c00 100%);
            padding: 30px;
            color: #2d3436;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 25px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .badge-category {
            background: rgba(247, 230, 28, 0.2);
            color: #d4af37;
            border: 1px solid #f7e61c;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .price-tag {
            font-size: 2rem;
            font-weight: 800;
            color: #ff8c00;
            display: block;
            margin: 15px 0;
        }

        .info-label {
            color: #888;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .info-value {
            color: #2d3436;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .description-box {
            background-color: #fcfcfc;
            padding: 20px;
            border-radius: 20px;
            border: 1px dashed #e0e0e0;
            line-height: 1.8;
            color: #555;
        }

        .btn-back {
            background: #f8f9fa;
            border: 2px solid #eee;
            color: #666;
            border-radius: 15px;
            padding: 12px 25px;
            font-weight: 700;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-back:hover {
            background: #eee;
            color: #2d3436;
            transform: translateX(-5px);
        }

        .stock-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2ecc71;
            font-weight: 700;
        }

        .stock-dot {
            width: 10px;
            height: 10px;
            background-color: #2ecc71;
            border-radius: 50%;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(46, 204, 113, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(46, 204, 113, 0); }
        }
    </style>
</head>
<body>

    <div class="detail-container animate__animated animate__zoomIn">
        <div class="header-gradient">
            <h4 class="fw-bold mb-0">Detail Produk</h4>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-light rounded-pill px-3 fw-bold">
                <i class="bi bi-x-lg"></i> Tutup
            </a>
        </div>

        <div class="card-body p-4 p-md-5">
            <div class="row g-5">
                <div class="col-md-5">
                    <img src="{{ $product->gambar ?? 'https://via.placeholder.com/500x500?text=No+Image' }}" 
                         alt="{{ $product->nama_produk }}" 
                         class="product-image animate__animated animate__fadeInLeft">
                </div>

                <div class="col-md-7 animate__animated animate__fadeIn">
                    <span class="badge-category mb-2 d-inline-block">{{ $product->kategori }}</span>
                    <h1 class="fw-bold text-dark display-6 mb-0">{{ $product->nama_produk }}</h1>
                    
                    <span class="price-tag">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>

                    <div class="row mb-4">
                        <div class="col-6 border-end text-center">
                            <p class="info-label mb-1">Stok Tersedia</p>
                            <div class="stock-indicator justify-content-center">
                                <span class="stock-dot"></span>
                                <span class="info-value">{{ $product->stok }} Unit</span>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <p class="info-label mb-1">ID Produk</p>
                            <p class="info-value">#JKB-{{ $product->id }}</p>
                        </div>
                    </div>

                    <p class="info-label mb-2">Tentang Menu Ini:</p>
                    <div class="description-box mb-4">
                        {{ $product->deskripsi ?: 'Tidak ada deskripsi untuk produk ini.' }}
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn-back">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning rounded-4 px-4 d-flex align-items-center fw-bold text-white shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i> Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>