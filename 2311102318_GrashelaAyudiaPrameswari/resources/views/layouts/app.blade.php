<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="view-transition" content="same-origin">
  <title>@yield('title', 'Ngawi Food Festival | 2024')</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <link href="https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@800,700,500&f[]=public-sans@700,500,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  
  <style>
    @view-transition { navigation: auto; }
    html { background-color: #ffffff; scroll-behavior: smooth; }
    body {
      font-family: 'Public Sans', sans-serif;
      color: #1a1a1a;
      -webkit-font-smoothing: antialiased;
    }
    h1, h2, h3, h4 {
      font-family: 'PT Serif', serif;
      font-weight: 700;
      letter-spacing: -0.01em;
    }
    .rainbow-bar {
      height: 4px;
      width: 100%;
      background: linear-gradient(90deg, #336d8e 16.6%, #468254 33.2%, #ff5c1a 49.8%, #ff809e 66.4%, #d33c31 83%, #ffa600 100%);
    }
    .hero-text-shadow {
      text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    .sharp-btn {
      border-radius: 1px;
      transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .sharp-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(41, 78, 44, 0.15);
    }
    .gallery-img {
      border-radius: 1px;
      transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .gallery-card:hover .gallery-img {
      transform: scale(1.02);
    }
    .qty-input { border-radius: 1px; border: 1px solid #e5e7eb; }
    .sticky-summary { top: 7rem; }
    .check-icon { color: #294e2c; }
    .accent-teal { color: #336d8e; }
    .bg-off-white { background-color: #fefbf6; }
  </style>
</head>
<body>
  <div class="min-h-screen bg-white flex flex-col relative">
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
      <div class="rainbow-bar"></div>
      <nav class="max-w-[1400px] mx-auto px-6 flex justify-between items-center h-20">
        <div class="flex items-center gap-12">
          <a href="{{ route('home') }}" id="nav-logo-link" class="text-2xl font-bold tracking-tighter uppercase">
            Ngawi<span class="font-normal opacity-50 italic lowercase pr-1">food</span>Fest
          </a>
          <div class="hidden lg:flex items-center gap-8">
            <a href="{{ route('home') }}" id="nav-home-link" class="text-xs font-bold uppercase tracking-[0.2em] text-[#294e2c] hover:opacity-70 transition-opacity">Home</a>
            <a href="{{ route('home') }}#products" id="nav-products-link" class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 hover:text-[#294e2c] transition-colors">Eat</a>
            <a href="{{ route('home') }}#about" id="nav-about-link" class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 hover:text-[#294e2c] transition-colors">Our Impact</a>
            <a href="#contact" id="nav-contact-link" class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 hover:text-[#294e2c] transition-colors">Contact</a>
            <a href="{{ route('cart.index') }}" class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 hover:text-[#294e2c] transition-colors flex items-center gap-1">
              Cart
              @if(session('cart') && count(session('cart')) > 0)
                <span class="bg-[#ff5c1a] text-white rounded px-1.5 py-0.5 text-[9px]">{{ count(session('cart')) }}</span>
              @endif
            </a>
          </div>
        </div>
        <div class="flex items-center gap-6">
          <a href="#" id="cta-tickets-btn" class="bg-[#294e2c] text-white px-8 py-3 sharp-btn text-[10px] font-bold uppercase tracking-[0.2em]">Get Passes</a>
          <button class="lg:hidden text-2xl text-[#294e2c]"><iconify-icon icon="lucide:menu"></iconify-icon></button>
        </div>
      </nav>
    </header>

    <main class="flex-1 relative" style="view-transition-name: main-content">
      @yield('content')
    </main>

    <footer id="contact" class="bg-[#0e1c0e] text-white py-32 border-t border-white/5">
      <div class="max-w-[1400px] mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-20 mb-32">
          <div class="col-span-1 md:col-span-2 space-y-8">
            <a href="{{ route('home') }}" id="footer-logo-link" class="text-3xl font-bold tracking-tighter uppercase">
              Ngawi<span class="font-normal text-[#336d8e] lowercase italic pr-1">food</span>Fest
            </a>
            <p class="text-gray-400 text-lg max-w-sm leading-relaxed tracking-tight">
              Elevating East Ngawi's culinary landscape through sophisticated digital integration and community empowerment.
            </p>
            <div class="flex gap-6 pt-4">
              <a href="#" id="footer-social-ig" class="text-2xl opacity-40 hover:opacity-100 transition-opacity"><iconify-icon icon="lucide:instagram"></iconify-icon></a>
              <a href="#" id="footer-social-fb" class="text-2xl opacity-40 hover:opacity-100 transition-opacity"><iconify-icon icon="lucide:facebook"></iconify-icon></a>
              <a href="#" id="footer-social-tw" class="text-2xl opacity-40 hover:opacity-100 transition-opacity"><iconify-icon icon="lucide:twitter"></iconify-icon></a>
            </div>
          </div>
          <div class="space-y-8">
            <h4 class="text-[10px] font-black uppercase tracking-[0.4em] text-[#336d8e]">Festival</h4>
            <ul class="space-y-4">
              <li><a href="{{ route('home') }}" id="footer-link-home" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">The Home</a></li>
              <li><a href="#products" id="footer-link-eat" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">Eat & Drink</a></li>
              <li><a href="#" id="footer-link-plan" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">Plan Visit</a></li>
              <li><a href="#about" id="footer-link-jobs" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">19k Initiative</a></li>
            </ul>
          </div>
          <div class="space-y-8">
            <h4 class="text-[10px] font-black uppercase tracking-[0.4em] text-[#336d8e]">Resources</h4>
            <ul class="space-y-4">
              <li><a href="#" id="footer-link-faq" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">FAQ</a></li>
              <li><a href="#" id="footer-link-terms" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">Terms</a></li>
              <li><a href="#" id="footer-link-privacy" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">Privacy</a></li>
              <li><a href="#" id="footer-link-contact" class="text-xs font-bold uppercase tracking-[0.1em] text-gray-400 hover:text-white">Support</a></li>
            </ul>
          </div>
        </div>
        <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
          <p class="text-[9px] font-bold uppercase tracking-[0.4em] text-gray-500">&copy; 2024 Ngawi Food Festival. All rights reserved.</p>
          <div class="flex items-center gap-1">
            <div class="w-4 h-4 rounded-full bg-[#336d8e]"></div>
            <div class="w-4 h-4 rounded-full bg-[#468254]"></div>
            <div class="w-4 h-4 rounded-full bg-[#ff5c1a]"></div>
            <div class="w-4 h-4 rounded-full bg-[#ff809e]"></div>
            <div class="w-4 h-4 rounded-full bg-[#d33c31]"></div>
            <div class="w-4 h-4 rounded-full bg-[#ffa600]"></div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>
