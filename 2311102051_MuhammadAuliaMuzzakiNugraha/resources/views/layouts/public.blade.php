<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Festival Kuliner Ngawi Timur')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('brand/festival-logo.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="festival-bg antialiased">
    <header class="sticky top-0 z-30 border-b border-slate-700/80 bg-[#071a33]/80 backdrop-blur">
        <div class="mx-auto w-full max-w-7xl px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('brand/festival-logo.svg') }}" alt="Logo Festival Kuliner Ngawi Timur" class="h-9 w-9 rounded-lg">
                <span class="brand-title text-lg font-bold text-slate-100">Festival Ngawi Timur</span>
            </a>

            <nav class="hidden items-center gap-2 md:flex">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-200 hover:bg-slate-800/80">Home</a>
                <a href="{{ route('about') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-200 hover:bg-slate-800/80">Tentang</a>
                <a href="{{ route('products.index') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-200 hover:bg-slate-800/80">Produk</a>
            </nav>

            <div class="flex items-center gap-2">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn-crimson text-sm">Admin Panel</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-outline text-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-crimson text-sm">Admin Panel</a>
                @endauth
            </div>
            </div>

            <nav class="mt-3 flex items-center gap-2 md:hidden">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-200 hover:bg-slate-800/80">Home</a>
                <a href="{{ route('about') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-200 hover:bg-slate-800/80">Tentang</a>
                <a href="{{ route('products.index') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-200 hover:bg-slate-800/80">Produk</a>
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-slate-800/70 bg-[#071a33]/70">
        <div class="mx-auto flex w-full max-w-7xl flex-col gap-2 px-4 py-6 text-sm text-slate-400 sm:px-6 lg:px-8 md:flex-row md:items-center md:justify-between">
            <p>Festival Makanan Ngawi Timur - Inisiatif Mas Jakobi.</p>
            <p>Didukung pendanaan Jendral Ladesh untuk mendorong digitalisasi.</p>
        </div>
    </footer>
</body>
</html>
