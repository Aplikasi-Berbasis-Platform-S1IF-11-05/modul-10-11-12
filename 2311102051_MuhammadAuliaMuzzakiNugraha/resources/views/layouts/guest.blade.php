<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('brand/festival-logo.svg') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="festival-bg antialiased">
        <div class="min-h-screen flex items-center justify-center px-4 py-8">
            <div class="w-full max-w-md rounded-2xl surface-panel p-7 sm:p-8">
                <a href="{{ route('home') }}" class="mb-5 block text-center">
                    <img src="{{ asset('brand/festival-logo.svg') }}" alt="Logo Festival Kuliner Ngawi Timur" class="mx-auto mb-3 h-12 w-12 rounded-xl">
                    <span class="block text-xs uppercase tracking-[0.22em] text-slate-400">Festival Kuliner</span>
                    <span class="brand-title mt-1 block text-2xl font-extrabold text-rose-500">Ngawi Timur</span>
                </a>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
