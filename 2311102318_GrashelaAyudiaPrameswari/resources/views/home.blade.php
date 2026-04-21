@extends('layouts.app')

@section('title', 'Ngawi Food Festival | 2024')

@section('content')
<section class="relative h-[85vh] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=1600&q=80" class="w-full h-full object-cover" alt="Ngawi Landscape">
    <div class="absolute inset-0 bg-black/30 bg-gradient-to-b from-transparent via-transparent to-black/60"></div>
  </div>
  
  <div class="relative z-10 text-center text-white px-6">
    <p class="text-[10px] font-bold uppercase tracking-[0.4em] mb-4 hero-text-shadow">East Ngawi Regional Initiative</p>
    <h1 class="text-4xl md:text-6xl lg:text-7xl mb-8 hero-text-shadow italic">
      See you in the <span class="not-italic">Highlands.</span>
    </h1>
    <p class="text-lg md:text-xl font-medium tracking-wide max-w-2xl mx-auto mb-12 hero-text-shadow opacity-90">
      A culinary celebration by Mr. Jakobi and General Ladesh. Bridging the digital divide through the heritage of flavor.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
      <a href="#products" id="hero-browse-link" class="w-full sm:w-auto px-12 py-5 bg-white text-[#294e2c] sharp-btn text-xs font-bold uppercase tracking-[0.3em]">Explore the Menu</a>
      <a href="#about" id="hero-story-link" class="w-full sm:w-auto px-12 py-5 border border-white/40 text-white sharp-btn text-xs font-bold uppercase tracking-[0.3em] hover:bg-white/10 transition-colors backdrop-blur-sm">Our Story</a>
    </div>
  </div>
  
  <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center gap-4">
    <div class="w-px h-16 bg-white/40"></div>
    <p class="text-[8px] font-black uppercase tracking-[0.5em] text-white/60">Scroll to Discover</p>
  </div>
</section>

<section id="products" class="py-24 bg-[#fefbf6]">
  <div class="max-w-[1400px] mx-auto px-6">
    <div class="flex flex-col md:flex-row justify-between items-baseline mb-16 gap-4">
      <div>
        <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-[#336d8e] mb-2">Featured Tastes</p>
        <h2 class="text-4xl md:text-5xl text-[#294e2c]">The Festival Kitchen</h2>
      </div>
      <a href="#products" id="view-all-link" class="text-xs font-bold uppercase tracking-[0.2em] text-[#294e2c] border-b border-[#294e2c] pb-1 hover:opacity-60 transition-opacity">View All Plates</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      @foreach($products as $product)
      <a href="{{ route('product.show', $product->slug) }}" class="gallery-card group block">
        <div class="aspect-[3/4] overflow-hidden bg-gray-100 mb-6 border border-gray-100 relative">
          <img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1606471191009-63994c53433b?w=600&q=80' }}" class="w-full h-full object-cover gallery-img" alt="{{ $product->name }}">
        </div>
        <div class="space-y-1">
          <h3 class="text-xl">{{ $product->name }}</h3>
          <div class="flex items-center gap-4">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $product->category }}</span>
            <span class="text-sm font-bold text-[#336d8e]">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<section id="about" class="relative py-32 overflow-hidden bg-[#294e2c] text-[#f3e6ce]">
  <div class="max-w-[1400px] mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">
    <div class="space-y-12">
      <div class="space-y-4">
        <p class="text-[10px] font-bold uppercase tracking-[0.5em] text-[#ffa600]">19,000 Jobs Initiative</p>
        <h2 class="text-5xl md:text-7xl lg:text-8xl italic leading-none">More than a <span class="not-italic">Festival.</span></h2>
      </div>
      <p class="text-xl md:text-2xl leading-relaxed opacity-80">
        Funded by General Ladesh and brought to life by the visionary hands of Mr. Jakobi. We are digitizing our heritage to create nineteen thousand opportunities for East Ngawi artisans.
      </p>
      <div class="grid grid-cols-3 gap-8 pt-8 border-t border-[#f3e6ce]/20">
        <div>
          <p class="text-4xl font-bold mb-1">19k</p>
          <p class="text-[10px] uppercase tracking-widest opacity-60 font-bold">Regional Jobs</p>
        </div>
        <div>
          <p class="text-4xl font-bold mb-1">250+</p>
          <p class="text-[10px] uppercase tracking-widest opacity-60 font-bold">Culinary Partners</p>
        </div>
        <div>
          <p class="text-4xl font-bold mb-1">100%</p>
          <p class="text-[10px] uppercase tracking-widest opacity-60 font-bold">Digital Growth</p>
        </div>
      </div>
      <a href="#" id="roadmap-link" class="inline-block px-12 py-5 bg-[#f3e6ce] text-[#294e2c] sharp-btn text-xs font-bold uppercase tracking-[0.3em]">The 2024 Digital Roadmap</a>
    </div>
    <div class="relative group">
      <div class="aspect-square overflow-hidden">
        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1000" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="Artisans">
      </div>
      <div class="absolute -bottom-8 -left-8 bg-[#336d8e] text-white p-12 hidden md:block">
        <iconify-icon icon="lucide:qr-code" class="text-4xl mb-4"></iconify-icon>
        <p class="text-xs font-bold uppercase tracking-[0.3em]">Scan for the full <br>Digital Experience</p>
      </div>
    </div>
  </div>
</section>

<section class="py-20">
  <div class="max-w-[1400px] mx-auto px-6">
    <div class="rainbow-bar mb-16"></div>
    <div class="flex flex-col md:flex-row items-center justify-between gap-12">
      <h2 class="text-4xl md:text-5xl lg:text-6xl tracking-tight max-w-xl">Experience the legacy of <span class="italic">flavor.</span></h2>
      <div class="flex flex-col items-center gap-6">
        <a href="#" id="join-now-link" class="px-16 py-6 border-2 border-[#294e2c] text-[#294e2c] sharp-btn text-xs font-bold uppercase tracking-[0.3em] hover:bg-[#294e2c] hover:text-white">Grab Your Passes</a>
        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Available until June 30th</p>
      </div>
    </div>
  </div>
</section>
@endsection
