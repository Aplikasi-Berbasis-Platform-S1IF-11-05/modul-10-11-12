<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }} — {{ config('app.name') }}</title>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <nav class="text-sm text-stone-500">
                <a href="{{ route('products.index') }}" class="hover:text-amber-800">Katalog</a>
                <span class="mx-2">/</span>
                <span class="text-stone-800">{{ $product->name }}</span>
            </nav>

            <div class="mt-6 grid gap-10 lg:grid-cols-2">
                <div class="rounded-2xl overflow-hidden bg-amber-100 border border-amber-200 aspect-square lg:aspect-auto lg:min-h-[320px]">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex h-full min-h-[280px] items-center justify-center text-amber-800/50">Belum ada foto produk</div>
                    @endif
                </div>
                <div>
                    <p class="text-sm font-medium text-amber-700">{{ $product->category->name }}</p>
                    <h1 class="mt-2 text-3xl font-bold text-stone-900">{{ $product->name }}</h1>
                    <p class="mt-4 text-2xl font-bold text-amber-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="mt-6 text-stone-700 leading-relaxed whitespace-pre-line">{{ $product->description }}</p>
                    @if($product->extra_info)
                        <div class="mt-8 rounded-xl bg-white border border-amber-100 p-4 shadow-sm">
                            <h2 class="text-sm font-semibold text-stone-800 uppercase tracking-wide">Informasi lain</h2>
                            <p class="mt-2 text-stone-600 whitespace-pre-line">{{ $product->extra_info }}</p>
                        </div>
                    @endif
                    <dl class="mt-8 grid grid-cols-2 gap-4 text-sm">
                        <div class="rounded-lg bg-white border border-amber-100 p-3">
                            <dt class="text-stone-500">Stok</dt>
                            <dd class="font-semibold text-stone-900">{{ $product->stock }} porsi</dd>
                        </div>
                        <div class="rounded-lg bg-white border border-amber-100 p-3">
                            <dt class="text-stone-500">Status</dt>
                            <dd class="font-semibold text-stone-900">{{ $product->is_available ? 'Tersedia' : 'Tidak tersedia' }}</dd>
                        </div>
                    </dl>
                </div>
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
