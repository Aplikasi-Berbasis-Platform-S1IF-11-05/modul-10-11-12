<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk — Festival Kuliner Ngawi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold:        #d4a017;
            --gold-light:  #f0c842;
            --gold-dark:   #a07810;
            --emerald:     #1a6b4a;
            --dark:        #1a1208;
            --cream:       #faf6ef;
            --text-muted:  #7a6a4f;
            --error:       #c0392b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(160deg, #1a1208 0%, #2c1f08 60%, #1a3020 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .page-wrap {
            width: 100%;
            max-width: 640px;
            animation: fadeUp 0.7s ease-out both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            transition: color 0.25s;
        }
        .back-link:hover { color: var(--gold-light); }

        .card {
            background: #fff;
            border-radius: 28px;
            padding: 3rem;
            box-shadow: 0 24px 64px rgba(0,0,0,0.35);
        }

        .card-header { text-align: center; margin-bottom: 2.5rem; }
        .card-icon { font-size: 2.5rem; margin-bottom: 0.75rem; display: block; }
        .card-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.4rem;
        }
        .card-header p {
            font-size: 0.92rem;
            color: var(--text-muted);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }
        .form-group {
            margin-bottom: 1.4rem;
        }
        .form-group.full { grid-column: span 2; }

        label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 0.88rem 1.1rem;
            border: 1.5px solid #e5ddd0;
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            color: var(--dark);
            background: #fdfaf6;
            transition: border-color 0.25s, box-shadow 0.25s;
            outline: none;
        }
        input:focus, textarea:focus, select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(212,160,23,0.12);
        }
        textarea { resize: vertical; min-height: 110px; }

        input[type="file"] {
            cursor: pointer;
            padding: 0.7rem 1rem;
        }
        input[type="file"]::-webkit-file-upload-button {
            background: var(--dark);
            color: white;
            border: none;
            padding: 0.4rem 0.9rem;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            margin-right: 0.75rem;
            font-family: 'Inter', sans-serif;
        }

        .divider {
            height: 1px;
            background: #ede6dc;
            margin: 1.5rem 0;
        }

        .image-preview {
            display: none;
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 0.75rem;
            border: 1.5px solid #e5ddd0;
        }

        .error-msg {
            color: var(--error);
            font-size: 0.78rem;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-submit {
            width: 100%;
            padding: 1.1rem;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: var(--dark);
            border: none;
            border-radius: 14px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(212,160,23,0.35);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212,160,23,0.45);
        }
        .btn-submit:active { transform: translateY(0); }

        @media (max-width: 600px) {
            .card { padding: 2rem 1.5rem; }
            .form-row { grid-template-columns: 1fr; }
            .form-group.full { grid-column: span 1; }
        }
    </style>
</head>
<body>

    <div class="page-wrap">
        <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>

        <div class="card">
            <div class="card-header">
                <span class="card-icon">🍽️</span>
                <h1>Tambah Produk Menu</h1>
                <p>Lengkapi detail produk untuk ditampilkan di Festival Kuliner Ngawi</p>
            </div>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" placeholder="Contoh: Pecel Ngawi Spesial"
                        value="{{ old('name') }}" required>
                    @error('name')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select id="category" name="category" required>
                            @foreach(['Main Course','Snack','Beverage','Dessert','Soup','Sambal'] as $cat)
                                <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Harga (Rp)</label>
                        <input type="number" id="price" name="price" placeholder="Contoh: 25000"
                            value="{{ old('price') }}" min="0" required>
                        @error('price')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="stock">Stok (Porsi)</label>
                        <input type="number" id="stock" name="stock" placeholder="Contoh: 50"
                            value="{{ old('stock', 0) }}" min="0" required>
                        @error('stock')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating (0-5)</label>
                        <input type="number" id="rating" name="rating" placeholder="Contoh: 4.5"
                            value="{{ old('rating', 5.0) }}" min="0" max="5" step="0.1" required>
                        @error('rating')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Produk</label>
                    <textarea id="description" name="description"
                        placeholder="Ceritakan keunikan dan kelezatan produk ini...">{{ old('description') }}</textarea>
                    @error('description')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                </div>

                <div class="divider"></div>

                <div class="form-group">
                    <label for="image">Foto Produk</label>
                    <input type="file" id="image" name="image" accept="image/*" required
                        onchange="previewImage(this)">
                    <img id="imgPreview" class="image-preview" alt="Preview foto produk">
                    @error('image')<div class="error-msg">⚠ {{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn-submit">
                    🚀 Simpan ke Katalog Festival
                </button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imgPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
