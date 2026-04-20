<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk - Ngawi Food Festival</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #f53003;
            --primary-light: #ff6a00;
            --secondary: #1b1b18;
            --bg-light: #fdfdfc;
            --bg-dark: #0a0a0a;
            --text-light: #1b1b18;
            --text-dark: #ededec;
        }

        @media (prefers-color-scheme: dark) {
            body { background-color: var(--bg-dark); color: var(--text-dark); }
            .form-container { background: #161615; border-color: #3e3e3a; }
            input, textarea, select { background: #0a0a0a; border-color: #3e3e3a; color: white; }
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }

        body {
            background-color: var(--bg-light);
            color: var(--text-light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            background: white;
            padding: 3rem;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            border: 1px solid #f0f0f0;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--primary);
            text-align: center;
        }

        p {
            text-align: center;
            color: #666;
            margin-bottom: 2.5rem;
            font-weight: 300;
        }

        .form-group { margin-bottom: 1.5rem; }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input, textarea, select {
            width: 100%;
            padding: 1rem 1.5rem;
            border-radius: 16px;
            border: 1px solid #e3e3e0;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(245, 48, 3, 0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: #888;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .back-link:hover { color: var(--primary); }

        .error-msg {
            color: var(--primary);
            font-size: 0.8rem;
            margin-top: 0.3rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Menu</h1>
        <p>Berikan detail produk terbaik Mas Jakobi untuk festival ini.</p>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" id="name" placeholder="Contoh: Sambal Tumpang Ngawi" required>
                @error('name') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" required>
                    <option value="Main Course">Main Course</option>
                    <option value="Snack">Snack</option>
                    <option value="Beverage">Beverage</option>
                    <option value="Dessert">Dessert</option>
                </select>
                @error('category') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="price">Harga (Rp)</label>
                <input type="number" name="price" id="price" placeholder="Contoh: 15000" required>
                @error('price') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" rows="4" placeholder="Jelaskan kelezatan produk ini..." required></textarea>
                @error('description') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="image">Foto Produk</label>
                <input type="file" name="image" id="image" required>
                @error('image') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="submit-btn">Simpan ke Katalog</button>
        </form>

        <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke Beranda</a>
    </div>
</body>
</html>
