<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tentang — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-amber-50 text-stone-900 min-h-screen flex flex-col">
    <header class="sticky top-0 z-40 border-b border-amber-200/80 bg-amber-50/95 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-600 text-white text-sm font-bold">FK</span>
                    <span class="font-semibold text-stone-900 hidden sm:inline">Festival Kuliner</span>
                </a>
                <nav class="flex flex-wrap items-center gap-1 sm:gap-4 text-sm font-medium">
                    <a href="{{ route('home') }}" class="px-2 py-1 rounded-md {{ request()->routeIs('home') ? 'text-amber-800 bg-amber-100' : 'text-stone-700 hover:text-amber-800' }}">Beranda</a>
                    <a href="{{ route('products.index') }}" class="px-2 py-1 rounded-md {{ request()->routeIs('products.*') ? 'text-amber-800 bg-amber-100' : 'text-stone-700 hover:text-amber-800' }}">Katalog</a>
                    <a href="{{ route('about') }}" class="px-2 py-1 rounded-md {{ request()->routeIs('about') ? 'text-amber-800 bg-amber-100' : 'text-stone-700 hover:text-amber-800' }}">Tentang</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-1">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <h1 class="text-3xl font-bold text-stone-900">Tentang festival</h1>
            <div class="mt-8 prose prose-stone max-w-none">
                <p class="text-stone-700 leading-relaxed">
                    Di jantung Ngawi Timur, Mas Jakobi menjalankan restoran yang menjadi pusat cita rasa lokal. Pendanaan dari Jenderal Ladesh di Ngawi Barat membuka jalan bagi program digitalisasi—salah satu wujud komitmen mewujudkan visi pembangunan yang menyasar penciptaan lapangan kerja, termasuk target 19.000 kesempatan kerja di wilayah tersebut.
                </p>
                <p class="mt-4 text-stone-700 leading-relaxed">
                    Website Festival Kuliner ini menjadi etalase digital: pengunjung dapat melihat produk restoran di halaman depan beserta harga, deskripsi, dan informasi tambahan yang tersimpan rapi di basis data MySQL. Pengelolaan data dilakukan dengan framework Laravel (MVC, Eloquent, Blade) agar pengembangan dan pemeliharaan sistem tetap terstruktur.
                </p>
                <p class="mt-4 text-stone-700 leading-relaxed">
                    Nikmati jelajah menu, temukan hidangan favorit, dan dukung ekosistem kuliner Ngawi yang terhubung dengan teknologi.
                </p>
            </div>
            <div class="mt-10">
                <a href="{{ route('products.index') }}" class="inline-flex rounded-lg bg-amber-600 px-5 py-2.5 text-white font-semibold hover:bg-amber-700">Jelajahi katalog</a>
            </div>
        </div>
    </main>

    <footer class="bg-stone-900 text-amber-50/90 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-sm">
            <p class="font-semibold text-amber-200">{{ config('app.name') }}</p>
            <p class="mt-2 max-w-2xl">Program digitalisasi kuliner Ngawi Timur — kolaborasi restoran Mas Jakobi dengan dukungan dari Ngawi Barat.</p>
            <p class="mt-6 text-stone-500">&copy; {{ date('Y') }} Praktikum ABP Modul 11–13.</p>
        </div>
    </footer>
</body>
</html>
