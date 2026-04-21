<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Ngawi Food Fest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 p-8 rounded-xl shadow-2xl w-full max-w-md border border-gray-700">
        <h2 class="text-2xl font-bold mb-6 text-green-400">Tambah Menu Baru</h2>
        
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-400 mb-2">Nama Produk</label>
                <input type="text" name="name" class="w-full bg-gray-700 border border-gray-600 rounded-lg p-2.5 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-400 mb-2">Harga (Rupiah)</label>
                <input type="number" name="price" class="w-full bg-gray-700 border border-gray-600 rounded-lg p-2.5 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-400 mb-2">Deskripsi Produk</label>
                <textarea name="description" rows="4" class="w-full bg-gray-700 border border-gray-600 rounded-lg p-2.5 focus:ring-green-500 focus:border-green-500" required></textarea>
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition">Simpan Menu</button>
                <a href="{{ route('products.index') }}" class="w-full bg-gray-600 text-center hover:bg-gray-700 text-white font-bold py-3 rounded-lg transition">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>