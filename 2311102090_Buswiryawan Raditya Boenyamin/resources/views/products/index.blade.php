{{--Buswiryawan Raditya Boenyamin
2311102090 --}}
@extends('layouts.app')
@section('title', 'Menu Festival - Restoran Jakobi')

@push('styles')
<style>
    .filter-bar { display:flex; gap:.6rem; flex-wrap:wrap; margin-bottom:2rem; align-items:center; }
    .filter-bar span { font-size:11px; letter-spacing:2px; text-transform:uppercase; color:#888; }
    .filter-btn { padding:6px 18px; border:1.5px solid #ccc; border-radius:30px; font-size:13px; text-decoration:none; color:var(--brown); background:white; transition:all .2s; }
    .filter-btn:hover { border-color:var(--red); color:var(--red); }
    .filter-btn.active { background:var(--red); border-color:var(--red); color:white; font-weight:700; }

    .section-title { font-family:'Playfair Display',serif; font-size:1.4rem; margin:2.5rem 0 1.2rem; padding-bottom:.5rem; border-bottom:2px solid var(--gold); }

    .product-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(270px,1fr)); gap:1.4rem; }

    .card { background:white; border-radius:12px; overflow:hidden; border:1px solid #EEE; display:flex; flex-direction:column; transition:transform .2s,box-shadow .2s; }
    .card:hover { transform:translateY(-4px); box-shadow:0 12px 28px rgba(0,0,0,.1); }

    .card-link { text-decoration:none; color:inherit; display:flex; flex-direction:column; flex:1; }

    .card-img { width:100%; height:190px; object-fit:cover; background:linear-gradient(135deg,#f5e6d3,#fdf0e0); display:flex; align-items:center; justify-content:center; font-size:3.5rem; }

    .card-body { padding:1rem 1.1rem 1.3rem; flex:1; display:flex; flex-direction:column; }
    .card-cat { font-size:10px; letter-spacing:2px; text-transform:uppercase; color:var(--red); font-weight:700; margin-bottom:.3rem; }
    .card-name { font-family:'Playfair Display',serif; font-size:1.05rem; font-weight:700; margin-bottom:.45rem; }
    .card-desc { font-size:12.5px; color:#666; line-height:1.6; flex:1; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
    .card-footer { display:flex; justify-content:space-between; align-items:flex-end; padding-top:.85rem; margin-top:.85rem; border-top:1px solid #F5F5F5; }
    .card-price { font-family:'Playfair Display',serif; font-size:1.15rem; font-weight:700; color:var(--red); }
    .card-portion { font-size:11px; color:#aaa; margin-top:2px; }
    .badge-avail { font-size:10px; background:#E8F5E9; color:#2E7D32; padding:3px 9px; border-radius:20px; font-weight:700; }
    .badge-unavail { font-size:10px; background:#FFEBEE; color:#C62828; padding:3px 9px; border-radius:20px; font-weight:700; }

    .card-see-more { display:block; text-align:center; padding:.65rem; border-top:1px solid #F5F5F5; font-size:12px; font-weight:700; color:var(--brown); text-decoration:none; letter-spacing:.5px; }
    .card-see-more:hover { background:var(--cream); color:var(--red); }

    .empty { text-align:center; padding:4rem 0; color:#999; font-size:1.1rem; }
</style>
@endpush

@section('content')
<div class="filter-bar">
    <span>Filter:</span>
    <a href="{{ route('home') }}" class="filter-btn {{ $category==='semua'?'active':'' }}">Semua</a>
    @foreach($categories as $cat)
        <a href="{{ route('home', ['category'=>$cat]) }}" class="filter-btn {{ $category===$cat?'active':'' }}">{{ ucfirst($cat) }}</a>
    @endforeach
</div>

@if($products->isEmpty())
    <div class="empty">
        <p>Belum ada produk. <a href="{{ route('products.create') }}" style="color:var(--red)">Tambah sekarang</a>.</p>
    </div>
@else
    @php $grouped = $products->groupBy('category'); $icons = ['makanan'=>'','minuman'=>'','dessert'=>'']; @endphp
    @foreach($grouped as $cat => $items)
        <h2 class="section-title">{{ $icons[$cat] ?? '🍽️' }} {{ ucfirst($cat) }}</h2>
        <div class="product-grid">
            @foreach($items as $p)
            <div class="card">
                <a href="{{ route('products.show', $p) }}" class="card-link">
                    @if($p->image)
                        @if(str_starts_with($p->image, 'http'))
                            <img src="{{ $p->image }}" alt="{{ $p->name }}" class="card-img" style="font-size:0"
                                 onerror="this.outerHTML='<div class=\'card-img\'>{{ $icons[$p->category] ?? '🍽️' }}</div>'">
                        @else
                            <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->name }}" class="card-img" style="font-size:0"
                                 onerror="this.outerHTML='<div class=\'card-img\'>{{ $icons[$p->category] ?? '🍽️' }}</div>'">
                        @endif
                    @else
                        <div class="card-img">{{ $icons[$p->category] ?? '🍽️' }}</div>
                    @endif

                    <div class="card-body">
                        <div class="card-cat">{{ $p->category }}</div>
                        <div class="card-name">{{ $p->name }}</div>
                        <div class="card-desc">{{ $p->description }}</div>
                        <div class="card-footer">
                            <div>
                                <div class="card-price">{{ $p->formatted_price }}</div>
                                @if($p->portion)<div class="card-portion">{{ $p->portion }}</div>@endif
                            </div>
                            <div style="text-align:right">
                                @if($p->is_available)
                                    <span class="badge-avail">Tersedia</span>
                                @else
                                    <span class="badge-unavail">Habis</span>
                                @endif
                                <div style="font-size:11px;color:#bbb;margin-top:4px">Stok: {{ $p->stock }}</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('products.show', $p) }}" class="card-see-more">Lihat Detail →</a>
            </div>
            @endforeach
        </div>
    @endforeach
@endif
@endsection