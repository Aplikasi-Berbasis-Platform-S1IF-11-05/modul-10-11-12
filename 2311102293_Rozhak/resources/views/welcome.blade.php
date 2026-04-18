@extends('layouts.app')

@section('title', 'Katalog Menu Restoran Mas Jakobi')

@section('content')
<div class="container py-5">
    
    <!-- Hero Section Utama -->
    <div class="text-center mb-5 pb-3">
        <span class="v-badge mb-3">Festival Kuliner Ngawi Timur</span>
        <h1 class="fw-bold mb-3" style="font-size: 2.5rem; letter-spacing: -0.05em;">
            Cita Rasa Autentik Pawon Ngawi.
        </h1>
        <p class="text-muted mx-auto" style="max-width: 600px; font-size: 1.1rem;">
            Program digitalisasi 19 ribu lapangan kerja oleh Jendral Ladesh. 
            Eksplorasi mahakarya kuliner dari Restoran Mas Jakobi.
        </p>
    </div>

    <!-- List Kategori Produk -->
    @if($categories->count() > 0)
        @foreach($categories as $category)
            
            <!-- Validasi Produk Kategori -->
            @if($category->products->count() > 0)
                <div class="mb-5">
                    <h3 class="fw-bold mb-4" style="letter-spacing: -0.03em;">{{ $category->name }}</h3>
                    
                    <div class="row g-4">
                        @foreach($category->products as $product)
                            <div class="col-md-6 col-lg-4">
                                <div class="v-card">
                                    <!-- Gambar Menu Produk -->
                                    <img src="{{ $product->image ?? 'https://placehold.co/600x400?text=Pawon+Ngawi' }}" 
                                         alt="{{ $product->name }}" 
                                         class="v-card-img"
                                         loading="lazy">
                                    
                                    <!-- Detail Informasi Produk -->
                                    <div class="v-card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h2 class="product-title m-0">{{ $product->name }}</h2>
                                        </div>
                                        
                                        <p class="product-desc">{{ $product->description }}</p>
                                        
                                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3" style="border-top: 1px solid var(--v-border);">
                                            <!-- Harga Format Rupiah -->
                                            <span class="product-price">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <button class="btn btn-dark btn-sm px-3" style="border-radius: 6px;">
                                                Pesan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
        @endforeach
    @else
        <!-- Database Masih Kosong -->
        <div class="text-center py-5">
            <p class="text-muted">Katalog menu belum tersedia saat ini.</p>
        </div>
    @endif

</div>
@endsection