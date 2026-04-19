{{--Buswiryawan Raditya Boenyamin
2311102090 --}}
@extends('layouts.app')
@section('title', $product->name . ' - Restoran Jakobi')

@push('styles')
<style>
    .back-link { display:inline-flex; align-items:center; gap:.4rem; color:var(--brown); text-decoration:none; font-size:13px; font-weight:700; margin-bottom:1.5rem; }
    .back-link:hover { color:var(--red); }

    .detail-wrap { display:grid; grid-template-columns:1fr 1fr; gap:2.5rem; background:white; border-radius:14px; border:1px solid #EEE; overflow:hidden; }
    @media(max-width:700px){ .detail-wrap { grid-template-columns:1fr; } }

    .detail-img { width:100%; height:380px; object-fit:cover; background:linear-gradient(135deg,#f5e6d3,#fdf0e0); display:flex; align-items:center; justify-content:center; font-size:6rem; }

    .detail-body { padding:2rem 2rem 2rem 0; display:flex; flex-direction:column; justify-content:center; }
    @media(max-width:700px){ .detail-body { padding:1.5rem; } }

    .detail-cat { font-size:11px; letter-spacing:2px; text-transform:uppercase; color:var(--red); font-weight:700; margin-bottom:.5rem; }
    .detail-name { font-family:'Playfair Display',serif; font-size:2rem; font-weight:900; line-height:1.2; margin-bottom:1rem; }
    .detail-price { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--red); margin-bottom:1.2rem; }
    .detail-desc { font-size:14.5px; color:#555; line-height:1.8; margin-bottom:1.5rem; }

    .detail-meta { display:flex; gap:1rem; flex-wrap:wrap; margin-bottom:1.5rem; }
    .meta-pill { background:var(--cream); border:1px solid #E5D8C0; border-radius:20px; padding:5px 14px; font-size:12px; color:var(--brown); }
    .badge-avail { background:#E8F5E9; color:#2E7D32; border:1px solid #A5D6A7; border-radius:20px; padding:5px 14px; font-size:12px; font-weight:700; }
    .badge-unavail { background:#FFEBEE; color:#C62828; border:1px solid #EF9A9A; border-radius:20px; padding:5px 14px; font-size:12px; font-weight:700; }

    .detail-actions { display:flex; gap:.75rem; margin-top:.5rem; }
    .btn-edit { background:var(--gold); color:white; border:none; padding:11px 28px; border-radius:8px; font-size:13px; font-weight:700; text-decoration:none; display:inline-block; }
    .btn-del-trigger { background:var(--red); color:white; border:none; padding:11px 28px; border-radius:8px; font-size:13px; font-weight:700; cursor:pointer; }
    .btn-edit:hover, .btn-del-trigger:hover { opacity:.85; }

    /* ===== MODAL ===== */
    .modal-overlay {
        display:none; position:fixed; inset:0;
        background:rgba(0,0,0,.55); z-index:999;
        align-items:center; justify-content:center;
    }
    .modal-overlay.open { display:flex; }
    .modal-box {
        background:white; border-radius:14px; padding:2rem;
        max-width:380px; width:90%; text-align:center;
        animation: popIn .2s ease;
    }
    @keyframes popIn { from{transform:scale(.85);opacity:0} to{transform:scale(1);opacity:1} }
    .modal-icon { font-size:3rem; margin-bottom:.75rem; }
    .modal-title { font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; margin-bottom:.5rem; }
    .modal-desc { font-size:13.5px; color:#666; margin-bottom:1.5rem; line-height:1.6; }
    .modal-actions { display:flex; gap:.75rem; justify-content:center; }
    .btn-cancel-modal { background:#F5F5F5; color:#555; border:none; padding:10px 24px; border-radius:8px; font-size:13px; font-weight:700; cursor:pointer; }
    .btn-confirm-del { background:var(--red); color:white; border:none; padding:10px 24px; border-radius:8px; font-size:13px; font-weight:700; cursor:pointer; }
    .btn-cancel-modal:hover { background:#EEE; }
    .btn-confirm-del:hover { opacity:.85; }
</style>
@endpush

@section('content')
<a href="{{ route('home') }}" class="back-link">← Kembali ke Menu</a>

<div class="detail-wrap">
    @php $icons = ['makanan'=>'🍛','minuman'=>'🥤','dessert'=>'🍡']; @endphp
    @if($product->image)
        @if(str_starts_with($product->image, 'http'))
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="detail-img" style="font-size:0">
        @else
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="detail-img" style="font-size:0">
        @endif
    @else
        <div class="detail-img">{{ $icons[$product->category] ?? '🍽️' }}</div>
    @endif

    <div class="detail-body">
        <div class="detail-cat">{{ $product->category }}</div>
        <div class="detail-name">{{ $product->name }}</div>
        <div class="detail-price">{{ $product->formatted_price }}</div>
        <div class="detail-desc">{{ $product->description }}</div>

        <div class="detail-meta">
            @if($product->portion)
                <span class="meta-pill"> {{ $product->portion }}</span>
            @endif
            <span class="meta-pill"> Stok: {{ $product->stock }}</span>
            @if($product->is_available)
                <span class="badge-avail">✓ Tersedia</span>
            @else
                <span class="badge-unavail">✗ Habis</span>
            @endif
        </div>

        <div class="detail-actions">
            <a href="{{ route('products.edit', $product) }}" class="btn-edit"> Edit</a>
            <button type="button" class="btn-del-trigger" onclick="document.getElementById('deleteModal').classList.add('open')">
                 Hapus
            </button>
        </div>
    </div>
</div>

{{-- Modal Konfirmasi Hapus --}}
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon"></div>
        <div class="modal-title">Hapus Produk</div>
        <div class="modal-desc">
            Kamu yakin ingin menghapus <strong>{{ $product->name }}</strong>?<br>
            Tindakan ini tidak bisa dibatalkan.
        </div>
        <div class="modal-actions">
            <button class="btn-cancel-modal" onclick="document.getElementById('deleteModal').classList.remove('open')">
                Batal
            </button>
            <form action="{{ route('products.destroy', $product) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn-confirm-del">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Tutup modal kalau klik di luar box
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('open');
    });
</script>
@endpush
@endsection