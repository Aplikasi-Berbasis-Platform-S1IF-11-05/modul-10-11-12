<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngawi Food Fest | Digitalisasi Ngawi Timur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #111827 0%, #064e3b 100%);
        }
    </style>
</head>
<body class="hero-gradient text-white min-h-screen flex items-center justify-center font-sans">
    <div class="text-center px-6">
        <h2 class="text-green-500 font-bold uppercase tracking-widest mb-2">Program Digitalisasi Ngawi Barat</h2>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">
            NGAWI <span class="text-green-400">FOOD FEST</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-10">
            Mewujudkan 19 ribu lapangan kerja melalui digitalisasi kuliner. 
            Menghadirkan cita rasa autentik dari Restoran Mas Jakobi untuk dunia.
        </p>

        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('products.index') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-10 py-4 rounded-full text-lg font-bold transition-all transform hover:scale-105 shadow-lg shadow-green-900/50">
                Lihat Katalog Menu
            </a>
            
            <a href="#" class="border border-gray-500 hover:bg-gray-800 text-white px-10 py-4 rounded-full text-lg font-bold transition-all">
                Tentang Jendral Ladesh
            </a>
        </div>

        <p class="mt-12 text-sm text-gray-500 italic">
            Didukung penuh oleh Pendanaan Ngawi Barat & Mas Paris
        </p>
    </div>
</body>
</html>