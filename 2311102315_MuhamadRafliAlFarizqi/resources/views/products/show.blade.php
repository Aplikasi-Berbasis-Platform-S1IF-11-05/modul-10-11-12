@extends('layouts.app')

@section('title', $product->name . ' | Ngawi Food Festival')
@section('nav-home', 'text-gray-500 hover:text-[#f26226]')
@section('nav-products', 'text-[#f26226]')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">

        {{-- Back Navigation --}}
        <nav class="mb-10">
            <a href="{{ route('products.index') }}#products" class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-[#f26226] transition-colors">
                <iconify-icon icon="lucide:arrow-left"></iconify-icon> Back to festival favorites
            </a>
        </nav>

        {{-- Product Hero --}}
        <div class="grid lg:grid-cols-2 gap-16 items-start mb-24">

            {{-- Image Gallery --}}
            <div class="space-y-4">
                <div class="aspect-square bg-gray-100 overflow-hidden card-sharp">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                {{-- Thumbnail strip from related + self --}}
                @php
                    $galleryImages = collect([$product])->merge($relatedProducts)->take(4);
                @endphp
                <div class="grid grid-cols-4 gap-4">
                    @foreach($galleryImages as $idx => $item)
                    <div class="aspect-square bg-gray-100 card-sharp overflow-hidden cursor-pointer transition-opacity {{ $idx === 0 ? 'border-[#f26226] border-2 opacity-100' : 'opacity-50 hover:opacity-100' }}">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Product Info --}}
            <div class="space-y-10">
                <div class="space-y-4">
                    <div class="inline-block bg-[#f26226]/10 text-[#f26226] px-3 py-1 text-[10px] font-bold uppercase tracking-widest">{{ $product->category }}</div>

                    {{-- Split name for accent color on last word --}}
                    @php
                        $words = explode(' ', $product->name);
                        $lastWord = array_pop($words);
                        $firstWords = implode(' ', $words);
                    @endphp
                    <h1 class="text-5xl lg:text-7xl font-black text-[#1a1a1a] leading-[0.9] tracking-tighter uppercase">
                        {{ $firstWords }} <span class="text-[#f26226]">{{ $lastWord }}</span>
                    </h1>

                    @if($product->is_featured)
                    <div class="flex items-center gap-4 text-sm font-bold">
                        <div class="flex items-center text-yellow-500">
                            <iconify-icon icon="mdi:star"></iconify-icon>
                            <iconify-icon icon="mdi:star"></iconify-icon>
                            <iconify-icon icon="mdi:star"></iconify-icon>
                            <iconify-icon icon="mdi:star"></iconify-icon>
                            <iconify-icon icon="mdi:star"></iconify-icon>
                        </div>
                        <span class="text-gray-400">CHEF'S PICK</span>
                    </div>
                    @endif

                    <div class="text-4xl font-black text-[#1a1a1a]">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

                    <p class="text-gray-600 text-lg leading-relaxed">{{ $product->description }}</p>
                </div>

                {{-- CTA --}}
                <div class="flex flex-col sm:flex-row gap-4 items-center">
                    <a href="{{ route('cart') }}" class="flex-1 bg-[#f26226] text-white h-14 btn-sharp flex items-center justify-center gap-3 font-bold uppercase tracking-widest hover:bg-[#d8490d] shadow-lg transition-all w-full">
                        Add to Cart <iconify-icon icon="lucide:shopping-cart" class="text-xl"></iconify-icon>
                    </a>
                    <a href="{{ route('products.index') }}#products" class="flex-1 border-2 border-[#1a1a1a] text-[#1a1a1a] h-14 btn-sharp flex items-center justify-center gap-3 font-bold uppercase tracking-widest hover:bg-[#1a1a1a] hover:text-white transition-all w-full">
                        Explore More <iconify-icon icon="lucide:utensils" class="text-xl"></iconify-icon>
                    </a>
                </div>

                {{-- Quick Info --}}
                <div class="pt-8 border-t border-gray-100 grid grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-gray-400">Category</h4>
                        <p class="text-sm font-bold uppercase">{{ $product->category }}</p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-gray-400">Regional Origin</h4>
                        <p class="text-sm font-bold uppercase">East Ngawi</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Content: Details + Sidebar --}}
        <div class="grid lg:grid-cols-3 gap-12 pb-24">

            {{-- Left: Description & Reviews --}}
            <div class="lg:col-span-2 space-y-16">

                {{-- The Composition --}}
                <section class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-black text-[#1a1a1a] mb-2">THE COMPOSITION</h2>
                        <div class="w-12 h-1 bg-[#f26226]"></div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-12">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xs font-black uppercase tracking-widest text-[#f26226] mb-4">About This Dish</h3>
                                <p class="text-sm text-gray-600 leading-relaxed">{{ $product->description }}</p>
                            </div>
                            <div>
                                <h3 class="text-xs font-black uppercase tracking-widest text-[#f26226] mb-4">Tags</h3>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-gray-50 text-gray-600 text-[10px] font-black uppercase border border-gray-100 btn-sharp">{{ $product->category }}</span>
                                    <span class="px-3 py-1 bg-gray-50 text-gray-600 text-[10px] font-black uppercase border border-gray-100 btn-sharp">Ngawi Timur</span>
                                    <span class="px-3 py-1 bg-gray-50 text-gray-600 text-[10px] font-black uppercase border border-gray-100 btn-sharp">Festival 2026</span>
                                    @if($product->is_featured)
                                    <span class="px-3 py-1 bg-[#f26226]/10 text-[#f26226] text-[10px] font-black uppercase border border-[#f26226]/20 btn-sharp">Featured</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xs font-black uppercase tracking-widest text-[#f26226] mb-4">The Method</h3>
                                <p class="text-sm text-gray-600 leading-relaxed">Prepared fresh daily using traditional recipes passed down through generations in the Jakobi family. Each dish is carefully crafted with locally-sourced ingredients from the East Ngawi region.</p>
                            </div>
                            <div>
                                <h3 class="text-xs font-black uppercase tracking-widest text-[#f26226] mb-4">Serving Suggestion</h3>
                                <p class="text-sm text-gray-600 leading-relaxed">Best enjoyed fresh at the festival grounds. Pair with a refreshing Es Dawet or Wedang Jahe for the complete Ngawi culinary experience.</p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Reviews --}}
                <section class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-black text-[#1a1a1a] mb-2">VOICES FROM THE FEST</h2>
                        <div class="w-12 h-1 bg-[#f26226]"></div>
                    </div>
                    <div class="grid gap-6">
                        <div class="p-8 bg-gray-50 card-sharp space-y-4 text-left">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-[#f26226] flex items-center justify-center text-white font-bold">AM</div>
                                    <div>
                                        <h4 class="text-xs font-black uppercase">Aris M.</h4>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Verified Taster</p>
                                    </div>
                                </div>
                                <div class="text-yellow-500 flex gap-0.5 text-xs">
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                </div>
                            </div>
                            <p class="text-sm italic text-gray-600 leading-relaxed">"{{ $product->name }} is absolutely incredible. The flavors are authentic and the portion is generous. A must-try at the Ngawi Food Festival!"</p>
                        </div>
                        <div class="p-8 bg-gray-50 card-sharp space-y-4 text-left">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">SK</div>
                                    <div>
                                        <h4 class="text-xs font-black uppercase">Sarah K.</h4>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Food Critic</p>
                                    </div>
                                </div>
                                <div class="text-yellow-500 flex gap-0.5 text-xs">
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                    <iconify-icon icon="mdi:star"></iconify-icon>
                                </div>
                            </div>
                            <p class="text-sm italic text-gray-600 leading-relaxed">"Mr. Jakobi's {{ $product->category }} selection never disappoints. This dish represents the best of East Ngawi's culinary heritage. Worth every visit to the festival."</p>
                        </div>
                    </div>
                </section>
            </div>

            {{-- Right Sidebar --}}
            <aside class="space-y-8">

                {{-- Product Details Card --}}
                <div class="p-8 bg-[#1a1a1a] text-white card-sharp sticky top-32">
                    <h3 class="text-xs font-black uppercase tracking-widest text-[#f26226] mb-6">Product Details</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between items-center border-b border-white/10 pb-4">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Price</span>
                            <span class="text-lg font-black">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-white/10 pb-4">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Category</span>
                            <span class="text-lg font-black">{{ strtoupper($product->category) }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-white/10 pb-4">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Restaurant</span>
                            <span class="text-lg font-black">JAKOBI</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-white/10 pb-4">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Region</span>
                            <span class="text-lg font-black">EAST NGAWI</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Status</span>
                            <span class="text-lg font-black text-[#f26226]">{{ $product->is_featured ? 'FEATURED' : 'AVAILABLE' }}</span>
                        </div>
                    </div>
                    <div class="mt-10 p-4 border border-white/10 bg-white/5 btn-sharp">
                        <p class="text-[10px] text-gray-400 leading-tight">* All dishes are prepared fresh daily at Mr. Jakobi's kitchen. Part of the General Ladesh regional digitalization initiative.</p>
                    </div>
                </div>

                {{-- Trust Badges --}}
                <div class="p-8 bg-gray-50 border border-gray-100 card-sharp space-y-6">
                    <h3 class="text-xs font-black uppercase tracking-widest text-[#1a1a1a]">Digital Trust</h3>
                    <div class="flex gap-4">
                        <iconify-icon icon="lucide:shield-check" class="text-2xl text-[#f26226] flex-shrink-0"></iconify-icon>
                        <div class="space-y-1">
                            <h4 class="text-[10px] font-black uppercase">Verified Heritage</h4>
                            <p class="text-xs text-gray-500">Sourced through the General Ladesh digitalization initiative.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <iconify-icon icon="lucide:truck" class="text-2xl text-[#f26226] flex-shrink-0"></iconify-icon>
                        <div class="space-y-1">
                            <h4 class="text-[10px] font-black uppercase">Flash Delivery</h4>
                            <p class="text-xs text-gray-500">Fresh from the festival floor to your doorstep in 30 mins.</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    {{-- Related Products --}}
    @if($relatedProducts->count() > 0)
    <section class="py-24 border-t border-gray-100 bg-[#fafafa]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-3xl lg:text-4xl font-black text-[#1a1a1a] tracking-tight">MORE FROM <span class="text-[#f26226]">{{ strtoupper($product->category) }}</span></h2>
                <div class="w-20 h-1 bg-[#f26226] mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <a href="{{ route('products.show', $related) }}" class="group bg-white card-sharp p-4 block">
                    <div class="aspect-square mb-4 bg-gray-100 overflow-hidden">
                        <img src="{{ $related->image }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-start">
                            <h3 class="text-sm font-black text-[#1a1a1a] uppercase leading-tight">{{ $related->name }}</h3>
                            <span class="text-[#f26226] font-bold text-sm whitespace-nowrap ml-2">Rp {{ number_format($related->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">{{ Str::limit($related->description, 60) }}</p>
                        <span class="inline-block pt-2 text-[#1a1a1a] text-[10px] font-black uppercase tracking-widest group-hover:text-[#f26226] transition-colors">View Details →</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
