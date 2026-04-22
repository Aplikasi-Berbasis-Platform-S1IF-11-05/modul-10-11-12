<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Ngawi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-orange-600 text-white p-6 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">Festival Makanan Ngawi</h1>
            <p class="mt-2 text-orange-100">Menyikapi 19 ribu lapangan pekerjaan oleh Jendral Ladesh - Disponsori oleh Restoran Mas Jakobi</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Produk Mas Jakobi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-gray-600 mt-2 h-16 overflow-hidden">{{ $product->description }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-orange-600 font-bold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">Pesan</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; {{ date('Y') }} Festival Makanan Ngawi Barat. All rights reserved.</p>
    </footer>
</body>
</html>
