<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="view-transition" content="same-origin">
    <title>@yield('title', 'Ngawi Food Fest | Mr. Jakobi\'s Culinary Celebration')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@800,700,500&f[]=public-sans@700,500,400&display=swap" rel="stylesheet">
    <style>
        @view-transition { navigation: auto; }
        html { background-color: #ffffff; scroll-behavior: smooth; }
        ::view-transition-old(main-content) { animation: 0.25s ease-out both fade-out; }
        ::view-transition-new(main-content) { animation: 0.25s ease-in 0.1s both fade-in; }
        @keyframes fade-out { from { opacity: 1; } to { opacity: 0; } }
        @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
        body { font-family: 'Public Sans', sans-serif; color: #1a1a1a; }
        h1, h2, h3, h4 { font-family: 'Cabinet Grotesk', sans-serif; text-transform: uppercase; letter-spacing: -0.02em; }
        .btn-sharp { border-radius: 4px; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-sharp { border-radius: 4px; border: 1px solid #f3f4f6; transition: all 0.3s ease; }
        .card-sharp:hover { border-color: #f26226; transform: translateY(-4px); }
    </style>
    @yield('styles')
</head>
<body>
<div class="min-h-screen bg-white flex flex-col relative overflow-x-hidden">

    {{-- Navbar --}}
    <header class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20">
            <a href="{{ route('products.index') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-[#f26226] flex items-center justify-center group-hover:bg-[#d8490d] transition-colors">
                    <iconify-icon icon="lucide:utensils" class="text-white text-2xl"></iconify-icon>
                </div>
                <span class="text-xl font-extrabold tracking-tighter text-[#1a1a1a]">NGAWI<span class="text-[#f26226]">FOODFEST</span></span>
            </a>
            <div class="hidden md:flex items-center gap-10">
                <a href="{{ route('products.index') }}" class="text-xs font-bold tracking-widest transition-colors uppercase @yield('nav-home', 'text-[#f26226]')">Home</a>
                <a href="{{ route('products.index') }}#products" class="text-xs font-bold tracking-widest transition-colors uppercase @yield('nav-products', 'text-gray-500 hover:text-[#f26226]')">Products</a>
                <a href="{{ route('products.index') }}#about" class="text-xs font-bold tracking-widest transition-colors uppercase @yield('nav-about', 'text-gray-500 hover:text-[#f26226]')">About</a>
                <a href="#contact" class="text-xs font-bold tracking-widest transition-colors uppercase text-gray-500 hover:text-[#f26226]">Contact</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('products.index') }}#products" class="bg-[#f26226] text-white px-5 py-2.5 rounded-[4px] text-xs font-bold uppercase tracking-widest hover:bg-[#d8490d] shadow-sm transition-all duration-200">Join Festival</a>
            </div>
            <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="md:hidden p-2 text-gray-900">
                <iconify-icon icon="lucide:menu" class="text-2xl"></iconify-icon>
            </button>
        </nav>
        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 pb-4">
            <a href="{{ route('products.index') }}" class="block py-3 text-xs font-bold tracking-widest uppercase text-gray-700 hover:text-[#f26226]">Home</a>
            <a href="{{ route('products.index') }}#products" class="block py-3 text-xs font-bold tracking-widest uppercase text-gray-700 hover:text-[#f26226]">Products</a>
            <a href="{{ route('products.index') }}#about" class="block py-3 text-xs font-bold tracking-widest uppercase text-gray-700 hover:text-[#f26226]">About</a>
            <a href="#contact" class="block py-3 text-xs font-bold tracking-widest uppercase text-gray-700 hover:text-[#f26226]">Contact</a>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="flex-1 relative" style="view-transition-name: main-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer id="contact" class="bg-[#1a1a1a] text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-white/10 pb-16 mb-10">
                <div class="col-span-1 md:col-span-2 space-y-6">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#f26226] flex items-center justify-center">
                            <iconify-icon icon="lucide:utensils" class="text-white text-2xl"></iconify-icon>
                        </div>
                        <span class="text-xl font-extrabold tracking-tighter">NGAWI<span class="text-[#f26226]">FOODFEST</span></span>
                    </a>
                    <p class="text-gray-400 max-w-sm text-sm leading-relaxed uppercase tracking-tighter">Empowering the East Ngawi culinary landscape through heritage and digital transformation.</p>
                </div>
                <div class="space-y-6">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-[#f26226]">Festival</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('products.index') }}" class="text-xs font-bold text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('products.index') }}#products" class="text-xs font-bold text-gray-400 hover:text-white transition-colors">Products</a></li>
                        <li><a href="{{ route('products.index') }}#about" class="text-xs font-bold text-gray-400 hover:text-white transition-colors">Our Story</a></li>
                        <li><a href="#" class="text-xs font-bold text-gray-400 hover:text-white transition-colors">19K Jobs</a></li>
                    </ul>
                </div>
                <div class="space-y-6">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-[#f26226]">Connect</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-xs font-bold text-gray-400 hover:text-white transition-colors uppercase">Instagram</a></li>
                        <li><a href="#" class="text-xs font-bold text-gray-400 hover:text-white transition-colors uppercase">Facebook</a></li>
                        <li><a href="#" class="text-xs font-bold text-gray-400 hover:text-white transition-colors uppercase">Twitter</a></li>
                        <li><a href="#" class="text-xs font-bold text-gray-400 hover:text-white transition-colors uppercase">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                <p>&copy; {{ date('Y') }} Ngawi Food Festival &mdash; Muhamad Rafli Al Farizqi (2311102315). Part of regional digitalization.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white">Privacy</a>
                    <a href="#" class="hover:text-white">Terms</a>
                </div>
            </div>
        </div>
    </footer>

</div>
@yield('scripts')
</body>
</html>
