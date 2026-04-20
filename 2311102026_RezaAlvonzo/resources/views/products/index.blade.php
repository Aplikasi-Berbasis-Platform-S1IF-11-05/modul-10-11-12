<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Jakobi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f6f1e8;
            --ink: #1d1a15;
            --paper: #fff8ef;
            --primary: #cf4c26;
            --accent: #f4b400;
            --soft: #eadfce;
            --muted: #6b5d4d;
            --success: #2f7d32;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Outfit", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 12% 20%, #ffd89f 0, transparent 35%),
                radial-gradient(circle at 88% 10%, #ffc1ae 0, transparent 28%),
                linear-gradient(160deg, #f6f1e8 0%, #f2e8d6 48%, #efe3cd 100%);
            min-height: 100vh;
            line-height: 1.5;
        }

        .container {
            width: min(1120px, 92%);
            margin: 0 auto;
        }

        .hero {
            padding: 56px 0 34px;
            position: relative;
            animation: reveal 700ms ease-out;
        }

        .hero-badge {
            display: inline-block;
            background: var(--ink);
            color: #fff;
            padding: 8px 14px;
            border-radius: 99px;
            letter-spacing: 0.06em;
            font-size: 0.74rem;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-family: "DM Serif Display", serif;
            font-size: clamp(2.1rem, 5vw, 4.2rem);
            line-height: 1.05;
            max-width: 10ch;
        }

        .hero p {
            margin-top: 14px;
            max-width: 60ch;
            color: var(--muted);
            font-size: clamp(0.95rem, 1.7vw, 1.08rem);
        }

        .hero-strip {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .chip {
            background: var(--paper);
            border: 1px solid #d8c8b2;
            border-radius: 12px;
            padding: 8px 12px;
            font-size: 0.9rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            padding-bottom: 56px;
        }

        .create-panel {
            background: var(--paper);
            border: 1px solid #decdb7;
            border-radius: 18px;
            padding: 18px;
            margin: 24px 0 20px;
            box-shadow: 0 8px 24px rgba(53, 34, 14, 0.07);
        }

        .create-title {
            font-weight: 800;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .field {
            display: grid;
            gap: 6px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            font-size: 0.84rem;
            color: var(--muted);
            font-weight: 600;
        }

        .field input,
        .field textarea {
            border: 1px solid #cdb89e;
            border-radius: 10px;
            padding: 10px 11px;
            font-family: inherit;
            background: #fffdf8;
            font-size: 0.95rem;
        }

        .field textarea {
            min-height: 86px;
            resize: vertical;
        }

        .submit-btn,
        .delete-btn {
            border: 0;
            border-radius: 10px;
            padding: 10px 14px;
            font-family: inherit;
            font-weight: 700;
            cursor: pointer;
            transition: transform 120ms ease, opacity 120ms ease;
        }

        .submit-btn {
            background: var(--primary);
            color: #fff;
            justify-self: start;
            margin-top: 2px;
        }

        .delete-btn {
            background: #ffe2dc;
            color: #8a2308;
            padding: 8px 10px;
            font-size: 0.84rem;
        }

        .submit-btn:hover,
        .delete-btn:hover {
            opacity: 0.92;
            transform: translateY(-1px);
        }

        .alerts {
            display: grid;
            gap: 10px;
            margin-bottom: 14px;
        }

        .alert {
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 0.92rem;
            border: 1px solid transparent;
        }

        .alert.success {
            background: #e8f6e8;
            border-color: #c8e8c8;
            color: #1f5a22;
        }

        .alert.error {
            background: #ffe9e4;
            border-color: #ffd0c4;
            color: #85240f;
        }

        .card {
            background: var(--paper);
            border: 1px solid #decdb7;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(53, 34, 14, 0.09);
            transform: translateY(18px);
            opacity: 0;
            animation: cardIn 500ms ease forwards;
        }

        .card:nth-child(2) { animation-delay: 80ms; }
        .card:nth-child(3) { animation-delay: 150ms; }
        .card:nth-child(4) { animation-delay: 220ms; }
        .card:nth-child(5) { animation-delay: 290ms; }
        .card:nth-child(6) { animation-delay: 360ms; }

        .thumb {
            aspect-ratio: 16 / 10;
            background: var(--soft);
            overflow: hidden;
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 450ms ease;
        }

        .card:hover .thumb img {
            transform: scale(1.06);
        }

        .content {
            padding: 16px;
            display: grid;
            gap: 8px;
        }

        .category {
            width: fit-content;
            font-size: 0.78rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: #f4e5cf;
            color: #7b3f00;
            padding: 4px 8px;
            border-radius: 999px;
        }

        .name {
            font-size: 1.15rem;
            line-height: 1.3;
            font-weight: 700;
        }

        .description {
            color: var(--muted);
            font-size: 0.94rem;
            min-height: 64px;
        }

        .meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 4px;
            gap: 10px;
        }

        .price {
            font-weight: 800;
            color: var(--primary);
            font-size: 1.15rem;
        }

        .stock {
            font-size: 0.84rem;
            color: var(--muted);
        }

        .stock.ready {
            color: var(--success);
            font-weight: 600;
        }

        .empty {
            background: rgba(255, 255, 255, 0.7);
            border: 1px dashed #c7b299;
            border-radius: 16px;
            padding: 24px;
            color: var(--muted);
        }

        footer {
            border-top: 1px solid #d8c8b2;
            padding: 18px 0 28px;
            color: #5e4f3f;
            font-size: 0.9rem;
        }

        @keyframes reveal {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes cardIn {
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 960px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .hero {
                padding-top: 40px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .description {
                min-height: auto;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <section class="hero">
            <span class="hero-badge">Festival Kuliner Ngawi</span>
            <h1>Produk Restoran Mas Jakobi</h1>
            <p>
                Program digitalisasi untuk promosi UMKM kuliner. Semua menu restoran ditampilkan di sini agar masyarakat
                mudah melihat info harga, deskripsi, kategori, dan ketersediaan produk.
            </p>
            <div class="hero-strip">
                <span class="chip">Didukung Program Kerja Ngawi Barat</span>
                <span class="chip">Target 19.000 Lapangan Kerja</span>
                <span class="chip">Data Tersimpan di MySQL</span>
            </div>
        </section>

        @if ($products->isEmpty())
            <section class="empty">
                Belum ada produk. Jalankan migrasi dan seeder terlebih dahulu agar daftar menu muncul.
            </section>
        @else
            <section class="grid">
                @foreach ($products as $product)
                    <article class="card">
                        <div class="thumb">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="content">
                            <span class="category">{{ $product->category }}</span>
                            <h2 class="name">{{ $product->name }}</h2>
                            <p class="description">{{ $product->description }}</p>
                            <div class="meta">
                                <span class="price">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</span>
                                <span class="stock {{ $product->is_available ? 'ready' : '' }}">
                                    {{ $product->is_available ? 'Stok: ' . $product->stock : 'Tidak tersedia' }}
                                </span>
                            </div>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </section>
        @endif

        <section class="create-panel">
            <h2 class="create-title">Tambah Produk Baru</h2>

            <div class="alerts">
                @if (session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert error">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>

            <form action="{{ route('products.store') }}" method="POST" class="form-grid">
                @csrf
                <div class="field">
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="field">
                    <label for="category">Kategori</label>
                    <input type="text" id="category" name="category" value="{{ old('category') }}" required>
                </div>
                <div class="field">
                    <label for="price">Harga</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" required>
                </div>
                <div class="field">
                    <label for="stock">Stok</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0" required>
                </div>
                <div class="field full">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                </div>
                <div class="field full">
                    <label for="image_url">URL Gambar (opsional)</label>
                    <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}">
                </div>
                <button type="submit" class="submit-btn">Simpan Produk</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="container">Festival Makanan Mas Jakobi - Laravel + MySQL</div>
    </footer>
</body>
</html>
