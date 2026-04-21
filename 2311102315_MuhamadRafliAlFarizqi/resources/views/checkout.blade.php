@extends('layouts.app')

@section('title', 'Checkout | Ngawi Food Fest')

@section('styles')
<style>
 .input-sharp { border-radius: 4px; border: 1px solid #e5e7eb; transition: border-color 0.2s ease; }
 .input-sharp:focus { outline: none; border-color: #f26226; box-shadow: 0 0 0 0 transparent; }
 .step-active { color: #f26226; }
 .step-line-active { background-color: #f26226; }
</style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24">
    <div class="flex flex-col items-center mb-12">
        <nav class="flex items-center justify-center w-full max-w-2xl mb-8 text-[10px] font-bold uppercase tracking-[0.2em]">
            <div class="flex items-center gap-4 text-gray-400">
                <a href="{{ route('cart') }}" class="hover:text-[#f26226] transition-colors">01. Cart</a>
                <div class="w-12 h-[1px] bg-[#f26226]"></div>
                <div class="text-[#f26226]">02. Checkout</div>
                <div class="w-12 h-[1px] bg-gray-200"></div>
                <div class="text-gray-300">03. Review</div>
            </div>
        </nav>
        <h1 class="text-4xl md:text-5xl font-black text-[#1a1a1a] tracking-tighter">SECURE <span class="text-[#f26226]">CHECKOUT</span></h1>
    </div>
    
    <div class="grid lg:grid-cols-12 gap-12">
        <div class="lg:col-span-7 space-y-12">
            <section id="contact-info" class="space-y-6">
                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 bg-[#1a1a1a] text-white flex items-center justify-center font-bold text-xs">1</span>
                    <h2 class="text-xl font-black tracking-tight">Contact Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="email" class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Email Address</label>
                        <input type="email" id="email" placeholder="jakobi@example.com" class="w-full p-4 input-sharp bg-[#fafafa] text-sm focus:border-[#f26226] focus:ring-1 focus:ring-[#f26226]" required>
                    </div>
                    <div class="space-y-2">
                        <label for="phone" class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Phone Number</label>
                        <input type="tel" id="phone" placeholder="+62 812-3456-7890" class="w-full p-4 input-sharp bg-[#fafafa] text-sm focus:border-[#f26226] focus:ring-1 focus:ring-[#f26226]" required>
                    </div>
                </div>
            </section>
            
            <section id="delivery-address" class="space-y-6 border-t border-gray-100 pt-12">
                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 bg-[#1a1a1a] text-white flex items-center justify-center font-bold text-xs">2</span>
                    <h2 class="text-xl font-black tracking-tight">Delivery Address</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2 space-y-2">
                        <label for="full-name" class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Full Name</label>
                        <input type="text" id="full-name" placeholder="Mr. Jakobi" class="w-full p-4 input-sharp bg-[#fafafa] text-sm focus:border-[#f26226] focus:ring-1 focus:ring-[#f26226]" required>
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label for="street" class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Street Address</label>
                        <input type="text" id="street" placeholder="Jl. Heritage No. 123, East Ngawi" class="w-full p-4 input-sharp bg-[#fafafa] text-sm focus:border-[#f26226] focus:ring-1 focus:ring-[#f26226]" required>
                    </div>
                    <div class="space-y-2">
                        <label for="city" class="text-[10px] font-bold uppercase tracking-widest text-gray-500">City / District</label>
                        <input type="text" id="city" placeholder="Ngawi City" class="w-full p-4 input-sharp bg-[#fafafa] text-sm focus:border-[#f26226] focus:ring-1 focus:ring-[#f26226]" required>
                    </div>
                    <div class="space-y-2">
                        <label for="postal" class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Postal Code</label>
                        <input type="text" id="postal" placeholder="63211" class="w-full p-4 input-sharp bg-[#fafafa] text-sm focus:border-[#f26226] focus:ring-1 focus:ring-[#f26226]" required>
                    </div>
                </div>
            </section>
            
            <section id="payment-method" class="space-y-6 border-t border-gray-100 pt-12">
                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 bg-[#1a1a1a] text-white flex items-center justify-center font-bold text-xs">3</span>
                    <h2 class="text-xl font-black tracking-tight">Payment Method</h2>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <label class="relative flex items-center p-4 border border-[#f26226] bg-[#fff5f2] btn-sharp cursor-pointer group">
                        <input type="radio" name="payment" value="credit-card" class="w-4 h-4 accent-[#f26226]" checked>
                        <div class="ml-4 flex items-center justify-between w-full">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold uppercase tracking-tight">Credit / Debit Card</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Visa, Mastercard, JCB</span>
                            </div>
                            <div class="flex gap-2 text-2xl text-gray-400">
                                <iconify-icon icon="logos:visa"></iconify-icon>
                                <iconify-icon icon="logos:mastercard"></iconify-icon>
                            </div>
                        </div>
                    </label>
                    <label class="relative flex items-center p-4 border border-gray-100 btn-sharp cursor-pointer hover:border-gray-300 transition-all group">
                        <input type="radio" name="payment" value="digital-wallet" class="w-4 h-4 accent-[#f26226]">
                        <div class="ml-4 flex items-center justify-between w-full">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold uppercase tracking-tight">Digital Wallet</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Gopay, OVO, Dana</span>
                            </div>
                            <div class="flex gap-2 text-2xl text-gray-400">
                                <iconify-icon icon="simple-icons:googlepay"></iconify-icon>
                            </div>
                        </div>
                    </label>
                    <label class="relative flex items-center p-4 border border-gray-100 btn-sharp cursor-pointer hover:border-gray-300 transition-all group">
                        <input type="radio" name="payment" value="bank-transfer" class="w-4 h-4 accent-[#f26226]">
                        <div class="ml-4 flex items-center justify-between w-full">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold uppercase tracking-tight">Bank Transfer</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Automatic Verification</span>
                            </div>
                            <iconify-icon icon="lucide:landmark" class="text-xl text-gray-400"></iconify-icon>
                        </div>
                    </label>
                </div>
            </section>
        </div>
        
        <div class="lg:col-span-5">
            <div class="sticky top-32 space-y-6">
                <div class="bg-[#fafafa] p-8 card-sharp border border-gray-100">
                    <h3 class="text-lg font-black tracking-tight mb-6">Order Summary</h3>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between gap-4">
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-white border border-gray-100 btn-sharp overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1606471191009-63994c53433b?w=100" class="w-full h-full object-cover" alt="item">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4 class="text-xs font-black uppercase tracking-tight">Jakobi Signature Sate</h4>
                                    <span class="text-[10px] text-gray-400">Qty: 2</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold">$90.00</span>
                        </div>
                        <div class="flex justify-between gap-4">
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-white border border-gray-100 btn-sharp overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1563379091339-03b1cbb8e4c8?w=100" class="w-full h-full object-cover" alt="item">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4 class="text-xs font-black uppercase tracking-tight">East Ngawi Bakso</h4>
                                    <span class="text-[10px] text-gray-400">Qty: 1</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold">$38.00</span>
                        </div>
                    </div>
                    
                    <div class="space-y-3 pt-6 border-t border-gray-200">
                        <div class="flex justify-between text-xs text-gray-500 font-bold uppercase tracking-widest">
                            <span>Subtotal</span>
                            <span>$128.00</span>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 font-bold uppercase tracking-widest">
                            <span>Digital Service Fee</span>
                            <span>$12.80</span>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 font-bold uppercase tracking-widest">
                            <span>Delivery Fee</span>
                            <span>$5.00</span>
                        </div>
                        <div class="flex justify-between text-lg font-black text-[#1a1a1a] pt-4 border-t border-gray-200 uppercase">
                            <span>Total Amount</span>
                            <span>$145.80</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('products.index') }}" class="w-full mt-8 bg-[#f26226] text-white py-5 btn-sharp text-sm font-black uppercase tracking-[0.2em] text-center block hover:bg-[#d8490d] shadow-lg shadow-orange-500/20 transition-all">Complete Purchase</a>
                    <p class="text-center text-[10px] text-gray-400 mt-4 uppercase font-bold tracking-[0.1em]">Secure encrypted checkout powered by General Ladesh</p>
                </div>
                
                <div class="p-6 bg-[#fffaf5] border border-[#ffa92e]/20 btn-sharp flex items-start gap-4">
                    <iconify-icon icon="lucide:truck" class="text-2xl text-[#ffa92e]"></iconify-icon>
                    <div>
                        <h4 class="text-[10px] font-black uppercase tracking-widest">Regional Delivery</h4>
                        <p class="text-[10px] text-gray-600 uppercase tracking-tighter mt-1">Estimated arrival in 30-45 mins within East Ngawi area.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
