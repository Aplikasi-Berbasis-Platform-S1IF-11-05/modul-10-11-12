@extends('layouts.app')

@section('title', 'Your Basket | Ngawi Food Festival')

@section('content')
<section class="max-w-[1400px] mx-auto px-6 pt-12 pb-24 min-h-[70vh]">
  <div class="mb-12">
    <a href="{{ route('home') }}#products" id="nav-back-link" class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400 hover:text-[#294e2c] transition-colors">
      <iconify-icon icon="lucide:arrow-left"></iconify-icon> Continue Exploring
    </a>
  </div>

  <div class="space-y-4 mb-12">
    <p class="text-[10px] font-bold uppercase tracking-[0.4em] text-[#336d8e]">Festival Selection</p>
    <h1 class="text-5xl lg:text-7xl tracking-tight text-[#294e2c] leading-none">Your <span class="italic">Basket.</span></h1>
  </div>

  @if(session('success'))
    <div class="bg-[#294e2c] text-[#f3e6ce] p-4 mb-8 text-sm font-bold tracking-wide uppercase">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="bg-red-600 text-white p-4 mb-8 text-sm font-bold tracking-wide uppercase">
      {{ session('error') }}
    </div>
  @endif

  @if($cart && count($cart) > 0)
    <div class="grid lg:grid-cols-12 gap-16 items-start">
      <div class="lg:col-span-8 space-y-8">
        <div class="border border-gray-100 bg-off-white">
          @foreach($cart as $id => $item)
            <div class="flex flex-col sm:flex-row items-center gap-6 p-6 border-b border-gray-100 last:border-0">
              <div class="w-24 h-24 bg-gray-100 shrink-0">
                <img src="{{ $item['image'] ?: 'https://images.unsplash.com/photo-1606471191009-63994c53433b?w=200&q=80' }}" class="w-full h-full object-cover" alt="{{ $item['name'] }}">
              </div>
              <div class="flex-1 space-y-2 text-center sm:text-left">
                <h3 class="text-xl font-bold text-[#294e2c]">{{ $item['name'] }}</h3>
                <p class="text-sm font-bold text-[#336d8e]">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
              </div>
              
              <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-4">
                @csrf
                <div class="flex items-center h-12 qty-input px-4 bg-white border border-gray-200">
                  <button type="button" onclick="this.nextElementSibling.stepDown(); this.form.submit()" class="text-gray-400 hover:text-[#336d8e]"><iconify-icon icon="lucide:minus"></iconify-icon></button>
                  <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-12 text-center bg-transparent font-black text-sm focus:outline-none hide-arrows" style="-moz-appearance: textfield; appearance: none;" onchange="this.form.submit()">
                  <button type="button" onclick="this.previousElementSibling.stepUp(); this.form.submit()" class="text-gray-400 hover:text-[#336d8e]"><iconify-icon icon="lucide:plus"></iconify-icon></button>
                </div>
              </form>

              <div class="text-right shrink-0 min-w-[100px] font-sans font-black text-lg">
                Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
              </div>
              
              <a href="{{ route('cart.remove', $id) }}" class="text-gray-400 hover:text-red-500 transition-colors p-2">
                <iconify-icon icon="lucide:trash-2" class="text-xl"></iconify-icon>
              </a>
            </div>
          @endforeach
        </div>
      </div>

      <div class="lg:col-span-4 sticky-summary sticky">
        <div class="p-8 border border-gray-100 bg-off-white space-y-8">
          <h3 class="text-2xl text-[#294e2c] font-bold">Summary</h3>
          
          <div class="space-y-4">
            <div class="flex justify-between items-center text-sm font-bold uppercase tracking-widest text-gray-500">
              <span>Subtotal</span>
              <span class="font-sans text-lg text-black">Rp{{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between items-center text-sm font-bold uppercase tracking-widest text-gray-500">
              <span>Platform Fee</span>
              <span class="font-sans text-lg text-black">Free</span>
            </div>
          </div>
          
          <div class="pt-6 border-t border-gray-200 flex justify-between items-center">
            <span class="text-sm font-bold uppercase tracking-widest text-[#294e2c]">Total</span>
            <span class="text-3xl font-black text-[#294e2c] font-sans">Rp{{ number_format($total, 0, ',', '.') }}</span>
          </div>

          <a href="{{ route('cart.checkout') }}" class="w-full h-16 bg-[#25D366] text-white sharp-btn flex items-center justify-center gap-3 text-xs font-bold uppercase tracking-[0.3em] hover:bg-[#128C7E] transition-colors">
            Order via WhatsApp <iconify-icon icon="logos:whatsapp-icon" class="text-xl"></iconify-icon>
          </a>

          <div class="flex gap-4 p-4 border border-[#294e2c]/10 bg-white">
            <iconify-icon icon="lucide:shield-check" class="text-2xl text-[#294e2c]"></iconify-icon>
            <div class="space-y-1">
              <p class="text-[10px] font-bold uppercase tracking-widest">Safe Transaction</p>
              <p class="text-xs text-gray-500">You will complete payment directly with our verified artisans via WhatsApp.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="flex flex-col items-center justify-center py-24 text-center space-y-6 border border-gray-100 bg-off-white">
      <iconify-icon icon="lucide:shopping-basket" class="text-6xl text-gray-300"></iconify-icon>
      <div class="space-y-2">
        <h3 class="text-2xl text-[#294e2c] font-bold">Your basket is empty</h3>
        <p class="text-gray-500 max-w-md">Looks like you haven't added any festival delicacies yet.</p>
      </div>
      <a href="{{ route('home') }}#products" class="inline-flex h-14 bg-[#294e2c] text-white sharp-btn items-center justify-center px-8 text-xs font-bold uppercase tracking-[0.3em] hover:bg-[#336d8e]">
        Browse Menu
      </a>
    </div>
  @endif
</section>
@endsection
