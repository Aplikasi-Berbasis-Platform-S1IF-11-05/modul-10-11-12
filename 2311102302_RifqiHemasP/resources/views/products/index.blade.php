<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menu - Ngawi Food Fest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen p-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-green-400">Ngawi Food Fest</h1>
                <p class="text-gray-400">Manajemen Menu Restoran Mas Jakobi</p>
            </div>
            <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition font-semibold">
                + Tambah Menu Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-900 border border-green-400 text-green-200 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-300 uppercase text-sm">
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold">{{ $product->name }}</td>
                        <td class="p-4 text-gray-400 text-sm">{{ Str::limit($product->description, 50) }}</td>
                        <td class="p-4 text-green-400 font-mono">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="p-4">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-600 hover:bg-blue-700 text-xs px-3 py-1 rounded">Edit</a>
                                
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-xs px-3 py-1 rounded">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>