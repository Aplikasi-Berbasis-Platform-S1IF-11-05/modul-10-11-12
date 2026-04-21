@extends('layouts.app')

@section('title', 'Shopping Cart | Ngawi Food Fest')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
    <div class="flex flex-col gap-12 lg:flex-row lg:items-start">
        <div class="flex-1 space-y-8">
            <div class="border-b border-gray-100 pb-8 flex items-baseline justify-between">
                <h1 class="text-4xl lg:text-5xl font-black text-[#1a1a1a] tracking-tight">YOUR <span class="text-[#f26226]">BASKET</span></h1>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400">3 Items Selected</span>
            </div>
            
            <div class="space-y-6">
                <!-- Item 1 -->
                <div class="flex flex-col sm:flex-row gap-6 p-4 border border-gray-100 card-sharp group">
                    <div class="w-full sm:w-32 h-32 bg-gray-100 overflow-hidden flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1606471191009-63994c53433b?w=400&h=400&fit=crop" alt="Sate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="flex-1 flex flex-col justify-between py-1">
                        <div class="flex justify-between items-start">
                            <div class="space-y-1">
                                <h3 class="text-lg font-black text-[#1a1a1a] tracking-tight">Jakobi Signature Sate</h3>
                                <p class="text-xs text-gray-500 uppercase tracking-wider">Extra Peanut Glaze</p>
                            </div>
                            <button class="text-gray-400 hover:text-red-500 transition-colors">
                                <iconify-icon icon="lucide:trash-2" class="text-xl"></iconify-icon>
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-4 sm:mt-0">
                            <div class="flex items-center border border-gray-200 btn-sharp overflow-hidden">
                                <button class="p-2 px-3 hover:bg-gray-50 text-gray-500"><iconify-icon icon="lucide:minus" class="text-xs"></iconify-icon></button>
                                <span class="w-10 text-center font-bold text-sm">2</span>
                                <button class="p-2 px-3 hover:bg-gray-50 text-gray-500"><iconify-icon icon="lucide:plus" class="text-xs"></iconify-icon></button>
                            </div>
                            <div class="text-right">
                                <span class="block text-xs text-gray-400 uppercase font-bold tracking-widest">Subtotal</span>
                                <span class="text-lg font-black text-[#f26226]">$90.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex flex-col sm:flex-row gap-6 p-4 border border-gray-100 card-sharp group">
                    <div class="w-full sm:w-32 h-32 bg-gray-100 overflow-hidden flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1563379091339-03b1cbb8e4c8?w=400&h=400&fit=crop" alt="Bakso" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="flex-1 flex flex-col justify-between py-1">
                        <div class="flex justify-between items-start">
                            <div class="space-y-1">
                                <h3 class="text-lg font-black text-[#1a1a1a] tracking-tight">East Ngawi Bakso</h3>
                                <p class="text-xs text-gray-500 uppercase tracking-wider">Regular Size</p>
                            </div>
                            <button class="text-gray-400 hover:text-red-500 transition-colors">
                                <iconify-icon icon="lucide:trash-2" class="text-xl"></iconify-icon>
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-4 sm:mt-0">
                            <div class="flex items-center border border-gray-200 btn-sharp overflow-hidden">
                                <button class="p-2 px-3 hover:bg-gray-50 text-gray-500"><iconify-icon icon="lucide:minus" class="text-xs"></iconify-icon></button>
                                <span class="w-10 text-center font-bold text-sm">1</span>
                                <button class="p-2 px-3 hover:bg-gray-50 text-gray-500"><iconify-icon icon="lucide:plus" class="text-xs"></iconify-icon></button>
                            </div>
                            <div class="text-right">
                                <span class="block text-xs text-gray-400 uppercase font-bold tracking-widest">Subtotal</span>
                                <span class="text-lg font-black text-[#f26226]">$38.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pt-8">
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-[#1a1a1a] hover:text-[#f26226] transition-colors">
                    <iconify-icon icon="lucide:arrow-left"></iconify-icon> Continue Exploring Flavors
                </a>
            </div>
        </div>
        
        <aside class="w-full lg:w-96 lg:sticky lg:top-28">
            <div class="bg-[#fafafa] p-8 card-sharp border-gray-200 space-y-8">
                <h2 class="text-2xl font-black text-[#1a1a1a] tracking-tight">ORDER <span class="text-[#f26226]">SUMMARY</span></h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center text-sm font-bold text-gray-500 uppercase tracking-wider"><span>Basket Subtotal</span><span class="text-[#1a1a1a]">$128.00</span></div>
                    <div class="flex justify-between items-center text-sm font-bold text-gray-500 uppercase tracking-wider"><span>Digitalization Tax</span><span class="text-[#1a1a1a]">$12.80</span></div>
                    <div class="flex justify-between items-center text-sm font-bold text-gray-500 uppercase tracking-wider"><span>Delivery Fee</span><span class="text-[#1a1a1a]">$5.00</span></div>
                    <div class="h-px bg-gray-200 my-4"></div>
                    <div class="flex justify-between items-center"><span class="text-lg font-black text-[#1a1a1a] uppercase tracking-tight">Total Amount</span><span class="text-2xl font-black text-[#f26226]">$145.80</span></div>
                </div>
                <div class="space-y-4">
                    <a href="{{ route('checkout') }}" class="block w-full text-center bg-[#f26226] text-white py-5 btn-sharp text-sm font-black uppercase tracking-[0.2em] hover:bg-[#d8490d] shadow-lg shadow-orange-500/10 transition-all">Proceed to Checkout</a>
                    <div class="flex items-center gap-3 p-4 bg-white border border-gray-100 rounded-[4px]">
                        <iconify-icon icon="lucide:shield-check" class="text-[#f26226] text-2xl"></iconify-icon>
                        <div class="space-y-0.5">
                            <p class="text-[10px] font-black uppercase tracking-widest text-[#1a1a1a]">Secure Transaction</p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase">Encrypted by General Ladesh</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
