@extends('layouts.app')

@section('title', 'Ngawi Food Fest | Mr. Jakobi\'s Culinary Celebration')
@section('nav-home', 'text-[#f26226]')

@section('content')
    {{-- Hero Section --}}
    <section class="relative py-20 lg:py-32 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center max-w-4xl mx-auto space-y-8">
                <div class="inline-block border border-[#f26226] text-[#f26226] px-4 py-1 text-[10px] font-bold tracking-[0.2em] uppercase">Regional Digitalization Initiative</div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-[#1a1a1a] leading-none tracking-tighter">TASTE THE <span class="text-[#f26226]">LEGACY</span> OF EAST NGAWI.</h1>
                <p class="text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl">A culinary celebration powered by General Ladesh, bridging heritage and digital innovation to create 19,000 regional opportunities.</p>
                <div class="flex flex-wrap gap-4 justify-center pt-4">
                    <a href="#products" class="bg-[#f26226] text-white px-10 py-4 btn-sharp font-bold text-sm uppercase tracking-widest hover:bg-[#d8490d] transition-all shadow-lg">Explore Menu</a>
                    <a href="#about" class="border-2 border-[#1a1a1a] text-[#1a1a1a] px-10 py-4 btn-sharp font-bold text-sm uppercase tracking-widest hover:bg-[#1a1a1a] hover:text-white transition-all">Our Story</a>
                </div>
            </div>

            {{-- Hero Featured Image --}}
            @if($featuredProducts->first())
            <div class="mt-20 relative max-w-5xl mx-auto h-[400px] md:h-[600px] bg-gray-100 overflow-hidden">
                <img src="{{ $featuredProducts->first()->image }}" class="w-full h-full object-cover" alt="{{ $featuredProducts->first()->name }}">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white text-left">
                    <span class="text-[#ffa92e] font-bold uppercase tracking-widest text-xs">Chef Jakobi Selection</span>
                    <h3 class="text-4xl font-black mt-2 tracking-tight uppercase">{{ $featuredProducts->first()->name }}</h3>
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- Products Section --}}
    <section id="products" class="py-24 border-t border-gray-100 bg-[#fafafa]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-4xl lg:text-5xl font-black text-[#1a1a1a] tracking-tight">FESTIVAL <span class="text-[#f26226]">FAVORITES</span></h2>
                <div class="w-20 h-1 bg-[#f26226] mx-auto"></div>
                <p class="text-gray-500 max-w-xl mx-auto">Traditional recipes re-imagined for the digital age, using ingredients sourced from East Ngawi's finest producers.</p>
            </div>

            {{-- Category Filter --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <a href="{{ route('products.index') }}" class="px-5 py-2 text-[10px] font-black uppercase tracking-widest border transition-all btn-sharp {{ !request('category') ? 'bg-[#f26226] text-white border-[#f26226]' : 'border-gray-200 text-[#1a1a1a] hover:bg-[#f26226] hover:text-white hover:border-[#f26226]' }}">All</a>
                @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category]) }}" class="px-5 py-2 text-[10px] font-black uppercase tracking-widest border transition-all btn-sharp {{ request('category') == $category ? 'bg-[#f26226] text-white border-[#f26226]' : 'border-gray-200 text-[#1a1a1a] hover:bg-[#f26226] hover:text-white hover:border-[#f26226]' }}">{{ $category }}</a>
                @endforeach
            </div>

            {{-- Search --}}
            <div class="max-w-md mx-auto mb-12">
                <form action="{{ route('products.index') }}" method="GET">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="relative">
                        <iconify-icon icon="lucide:search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></iconify-icon>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search menu..." class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-[4px] text-sm focus:outline-none focus:border-[#f26226] transition-colors">
                    </div>
                </form>
            </div>

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                <a href="{{ route('products.show', $product) }}" class="group bg-white card-sharp p-4 block">
                    <div class="aspect-square mb-4 bg-gray-100 overflow-hidden relative">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        @if($product->is_featured)
                            <div class="absolute top-3 left-3 bg-[#f26226] text-white px-3 py-1 text-[10px] font-black uppercase tracking-widest">Featured</div>
                        @endif
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-start">
                            <h3 class="text-sm font-black text-[#1a1a1a] uppercase leading-tight">{{ $product->name }}</h3>
                            <span class="text-[#f26226] font-bold text-sm whitespace-nowrap ml-2">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                        <div class="pt-2">
                            <span class="inline-block py-1.5 text-[#1a1a1a] text-[10px] font-black uppercase tracking-widest group-hover:text-[#f26226] transition-colors">View Details →</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-16 space-y-4">
                    <iconify-icon icon="lucide:search-x" class="text-5xl text-gray-300"></iconify-icon>
                    <h3 class="text-lg font-black uppercase text-gray-400">No menu found</h3>
                    <a href="{{ route('products.index') }}" class="inline-block bg-[#f26226] text-white px-8 py-3 btn-sharp text-xs font-bold uppercase tracking-widest hover:bg-[#d8490d] transition-all">View All Menu</a>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
            <div class="flex justify-center mt-12">
                {{ $products->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600" alt="Kitchen" class="w-full h-80 object-cover card-sharp">
                    <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600" alt="Food" class="w-full h-64 object-cover card-sharp mt-16 shadow-2xl shadow-black/10">
                </div>
                <div class="space-y-8">
                    <h2 class="text-5xl font-black text-[#1a1a1a] leading-tight">19,000 JOBS.<br><span class="text-[#f26226]">ONE VISION.</span></h2>
                    <p class="text-gray-600 text-lg leading-relaxed">The Ngawi Food Festival is more than a celebration of taste. Funded by General Ladesh and hosted by Mr. Jakobi, this regional initiative aims to revitalize our economy through digital empowerment and culinary heritage.</p>
                    <div class="grid grid-cols-2 gap-8 pt-4 border-t border-gray-100">
                        <div class="space-y-1">
                            <div class="text-4xl font-black text-[#f26226]">19K</div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Employment Created</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-4xl font-black text-[#1a1a1a]">{{ $products->total() }}+</div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Menu Available</div>
                        </div>
                    </div>
                    <a href="#products" class="inline-block bg-[#1a1a1a] text-white px-10 py-4 btn-sharp text-sm font-bold uppercase tracking-widest hover:bg-[#f26226] transition-all">Explore Menu</a>
                </div>
            </div>
        </div>
    </section>
@endsection
