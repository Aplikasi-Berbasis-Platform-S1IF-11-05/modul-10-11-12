<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel Festival')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('brand/festival-logo.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="festival-bg antialiased">
    <header class="sticky top-0 z-30 border-b border-slate-700/80 bg-[#071a33]/85 backdrop-blur">
        <div class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3">
                <img src="{{ asset('brand/festival-logo.svg') }}" alt="Logo Festival Kuliner Ngawi Timur" class="h-10 w-10 rounded-lg">
                <div>
                <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Admin Panel</p>
                <h1 class="brand-title text-lg font-bold text-slate-100">Festival Kuliner Ngawi Timur</h1>
                </div>
            </div>

            <nav class="flex flex-wrap items-center gap-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-3 py-1.5 text-slate-200 hover:bg-slate-800/80">Dashboard</a>
                <a href="{{ route('admin.categories.index') }}" class="rounded-lg px-3 py-1.5 text-slate-200 hover:bg-slate-800/80">Kategori</a>
                <a href="{{ route('admin.products.index') }}" class="rounded-lg px-3 py-1.5 text-slate-200 hover:bg-slate-800/80">Produk</a>
                <a href="{{ route('home') }}" class="btn-outline">Lihat Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-crimson">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @include('partials.flash-message')
        @yield('content')
    </main>
</body>
</html>
