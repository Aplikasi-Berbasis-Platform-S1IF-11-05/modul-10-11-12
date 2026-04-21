@extends('layouts.app')

@section('title', $product->name . ' | Dish Details | Ngawi Food Festival')

@section('content')
<section class="max-w-[1400px] mx-auto px-6 pt-12 pb-24">
  <nav class="mb-12">
    <a href="{{ route('home') }}#products" id="nav-back-link" class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400 hover:text-[#294e2c] transition-colors">
      <iconify-icon icon="lucide:arrow-left"></iconify-icon> Back to festival kitchen
    </a>
  </nav>

  <div class="grid lg:grid-cols-12 gap-16 items-start">
    <div class="lg:col-span-7 space-y-8">
      <div class="aspect-[16/10] overflow-hidden bg-gray-100 border border-gray-100">
        <img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1606471191009-63994c53433b?w=1600&q=80' }}" class="w-full h-full object-cover" alt="{{ $product->name }}">
      </div>
      <div class="grid grid-cols-3 gap-6">
        <div class="aspect-square overflow-hidden bg-gray-100 border border-gray-100">
          <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=600" class="w-full h-full object-cover" alt="Prep 1">
        </div>
        <div class="aspect-square overflow-hidden bg-gray-100 border border-gray-100">
          <img src="https://images.unsplash.com/photo-1532634896-26909d0d4b89?w=600" class="w-full h-full object-cover" alt="Prep 2">
        </div>
        <div class="aspect-square overflow-hidden bg-gray-100 border border-gray-100">
          <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600" class="w-full h-full object-cover" alt="Prep 3">
        </div>
      </div>
    </div>

    <div class="lg:col-span-5 sticky-summary sticky">
      <div class="space-y-8">
        <div class="space-y-4">
          <p class="text-[10px] font-bold uppercase tracking-[0.4em] text-[#336d8e]">{{ $product->category }}</p>
          <h1 class="text-5xl lg:text-7xl tracking-tight text-[#294e2c] leading-none">{{ $product->name }}</h1>
          
          <div class="flex items-center gap-4 text-sm font-bold">
            <div class="flex items-center text-[#ffa600]">
              <iconify-icon icon="mdi:star"></iconify-icon>
              <iconify-icon icon="mdi:star"></iconify-icon>
              <iconify-icon icon="mdi:star"></iconify-icon>
              <iconify-icon icon="mdi:star"></iconify-icon>
              <iconify-icon icon="mdi:star"></iconify-icon>
            </div>
            <span class="text-gray-400 font-bold uppercase tracking-widest text-[10px]">4.9 (128 Reviews)</span>
          </div>
        </div>

        <p class="text-lg leading-relaxed text-gray-600 font-medium italic">
          "{{ $product->description }}"
        </p>

        <div class="pt-8 border-t border-gray-100">
          <div class="flex justify-between items-baseline mb-8">
            <span class="text-4xl font-black text-[#294e2c] font-sans">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">In Stock &bull; Freshly Prepared</span>
          </div>
          <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex flex-col sm:flex-row gap-4">
            @csrf
            <div class="flex items-center h-16 qty-input px-6 bg-off-white">
              <button type="button" onclick="this.nextElementSibling.stepDown()" class="text-lg hover:text-[#336d8e]"><iconify-icon icon="lucide:minus"></iconify-icon></button>
              <input type="number" name="quantity" value="1" min="1" class="w-16 text-center bg-transparent font-black text-lg focus:outline-none hide-arrows" style="-moz-appearance: textfield; appearance: none;">
              <button type="button" onclick="this.previousElementSibling.stepUp()" class="text-lg hover:text-[#336d8e]"><iconify-icon icon="lucide:plus"></iconify-icon></button>
            </div>
            <button type="submit" id="cta-add-to-cart" class="flex-1 h-16 bg-[#294e2c] text-white sharp-btn flex items-center justify-center gap-3 text-xs font-bold uppercase tracking-[0.3em] hover:bg-[#336d8e]">
              Add to Basket <iconify-icon icon="lucide:shopping-bag" class="text-xl"></iconify-icon>
            </button>
          </form>
        </div>

        <div class="space-y-4 pt-8">
          <div class="flex gap-4 p-4 border border-gray-100 bg-off-white">
            <iconify-icon icon="lucide:truck" class="text-2xl text-[#336d8e]"></iconify-icon>
            <div class="space-y-1">
              <p class="text-[10px] font-bold uppercase tracking-widest">Fast Festival Delivery</p>
              <p class="text-xs text-gray-500">Available within East Ngawi area in 30-45 minutes.</p>
            </div>
          </div>
          <div class="flex gap-4 p-4 border border-gray-100">
            <iconify-icon icon="lucide:shield-check" class="text-2xl text-[#294e2c]"></iconify-icon>
            <div class="space-y-1">
              <p class="text-[10px] font-bold uppercase tracking-widest">Digital Heritage Trust</p>
              <p class="text-xs text-gray-500">Verified recipe. Part of the 19k Jobs program.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-32 space-y-32">
    <section class="grid lg:grid-cols-2 gap-20 items-start">
      <div class="space-y-12">
        <div class="space-y-4">
          <h2 class="text-4xl text-[#294e2c]">The Composition</h2>
          <div class="w-16 h-1 bg-[#336d8e]"></div>
        </div>
        <p class="text-gray-600 leading-relaxed text-lg">
          Our {{ $product->name }} begins with premium local ingredients, meticulously prepared with a spice paste and slow-cooked to perfection. Each serving is hand-crafted and authentically East Ngawi.
        </p>
        <div class="grid sm:grid-cols-2 gap-8">
          <div class="space-y-4">
            <h4 class="text-xs font-bold uppercase tracking-[0.3em] text-[#336d8e]">Key Characteristics</h4>
            <ul class="space-y-3">
              <li class="flex items-center gap-3 text-sm font-medium">
                <iconify-icon icon="lucide:check" class="check-icon"></iconify-icon> Locally Sourced
              </li>
              <li class="flex items-center gap-3 text-sm font-medium">
                <iconify-icon icon="lucide:check" class="check-icon"></iconify-icon> Authentic Recipe
              </li>
              <li class="flex items-center gap-3 text-sm font-medium">
                <iconify-icon icon="lucide:check" class="check-icon"></iconify-icon> High Quality Value
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bg-off-white p-12 lg:p-20 border border-gray-100">
        <h3 class="text-3xl text-[#294e2c] mb-8">The Method</h3>
        <div class="space-y-8">
          <div class="flex gap-6">
            <span class="text-4xl font-bold text-[#336d8e] opacity-20">01</span>
            <p class="text-gray-600 leading-relaxed font-medium">
              Carefully selected ingredients are brought from the highlands specifically for the festival.
            </p>
          </div>
          <div class="flex gap-6">
            <span class="text-4xl font-bold text-[#336d8e] opacity-20">02</span>
            <p class="text-gray-600 leading-relaxed font-medium">
              Prepared by artisans using traditional methods preserved over generations.
            </p>
          </div>
          <div class="flex gap-6">
            <span class="text-4xl font-bold text-[#336d8e] opacity-20">03</span>
            <p class="text-gray-600 leading-relaxed font-medium">
              Served fresh with our complementary signature accompaniments.
            </p>
          </div>
        </div>
      </div>
    </section>

    @if($relatedProducts->count() > 0)
    <section>
      <div class="flex flex-col md:flex-row justify-between items-baseline gap-4 mb-16">
        <h2 class="text-4xl text-[#294e2c]">You Might Also Like</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($relatedProducts as $related)
        <a href="{{ route('product.show', $related->slug) }}" class="gallery-card group block">
          <div class="aspect-[3/4] overflow-hidden bg-gray-100 mb-6 border border-gray-100 relative">
            <img src="{{ $related->image ?: 'https://images.unsplash.com/photo-1606471191009-63994c53433b?w=600&q=80' }}" class="w-full h-full object-cover gallery-img" alt="{{ $related->name }}">
          </div>
          <div class="space-y-1">
            <h3 class="text-xl">{{ $related->name }}</h3>
            <div class="flex items-center gap-4">
              <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $related->category }}</span>
              <span class="text-sm font-bold text-[#336d8e]">Rp{{ number_format($related->price, 0, ',', '.') }}</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </section>
    @endif
  </div>
</section>
@endsection
