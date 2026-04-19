@extends('produk.layout')

@section('content')
{{-- CSS Khusus Halaman --}}
<style>
    /* 1. STYLING CONTAINER UTAMA (BARU) */
    .super-container {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.04), 0 1px 3px rgba(0,0,0,0.05);
        padding: 40px;
        position: relative;
        border: 1px solid rgba(0,0,0,0.02);
        margin-bottom: 2rem;
    }

    /* Aksen garis gradien di bagian atas container */
    .super-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 8px;
        background: linear-gradient(90deg, #c0392b, #e67e22);
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
    }

    /* 2. STYLING TOMBOL */
    .btn-custom {
        background-color: #c0392b;
        color: white;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
        padding: 10px 24px;
    }
    .btn-custom:hover {
        background-color: #a93226;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.25);
    }

    /* 3. STYLING TABEL */
    .card-table {
        border-radius: 16px;
        border: 1px solid #f4f4f4;
        background: #fafaf9; /* Warna latar tabel sedikit berbeda dari container */
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.01);
        overflow: hidden;
    }
    .table-custom {
        margin-bottom: 0;
    }
    .table-custom th {
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.8px;
        color: #888;
        background-color: transparent;
        border-bottom: 2px solid #eaeaea;
        padding: 20px 16px;
    }
    .table-custom td {
        padding: 18px 16px;
        border-bottom: 1px solid #f0f0f0;
        background-color: #ffffff;
    }
    .table-hover tbody tr:hover td {
        background-color: #fdfaf6;
    }
</style>

{{-- BUNGKUSAN CONTAINER BARU --}}
<div class="super-container">
    
    {{-- Header Container --}}
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-light">
        <div>
            <h2 class="fw-bold mb-1" style="color: #2c3e50; letter-spacing: -0.5px;">Daftar Produk</h2>
            <p class="text-muted mb-0 small">Kelola menu makanan dan minuman dari dapur Mas Jakobi</p>
        </div>
        <a href="/produk/create" class="btn btn-custom">
            <i class="bi bi-plus-lg me-2"></i> Tambah Produk
        </a>
    </div>

    {{-- Wadah Tabel --}}
    <div class="card-table">
        <div class="table-responsive">
            <table class="table table-hover table-custom align-middle">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="25%">Nama Produk</th>
                        <th width="15%">Kategori</th>
                        <th width="20%">Harga</th>
                        <th width="15%" class="text-center">Tersedia</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $produk)
                    <tr>
                        <td class="text-center text-muted fw-medium">{{ $loop->iteration }}</td>
                        <td>
                            <span class="fw-bold" style="color: #2c3e50; font-size: 1.05rem;">{{ $produk->nama_produk }}</span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis px-3 py-2 rounded-pill border border-warning-subtle fw-bold">
                                {{ $produk->kategori }}
                            </span>
                        </td>
                        <td class="fw-bold" style="color: #c0392b;">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>
                        <td class="text-center">
                            @if($produk->tersedia)
                                <span class="badge bg-success-subtle text-success-emphasis px-3 py-2 rounded-pill fw-bold">
                                    <i class="bi bi-check-circle-fill me-1"></i> Ya
                                </span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary-emphasis px-3 py-2 rounded-pill fw-bold">
                                    <i class="bi bi-x-circle-fill me-1"></i> Tidak
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/produk/{{ $produk->id }}/edit" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1 fw-medium">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="/produk/{{ $produk->id }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 bg-white">
                            <div class="d-flex flex-column align-items-center justify-content-center my-4">
                                <div class="bg-light rounded-circle p-4 mb-3">
                                    <i class="bi bi-inbox fs-1 text-secondary"></i>
                                </div>
                                <h5 class="fw-bold text-dark">Belum ada produk</h5>
                                <p class="text-muted small mb-0">Klik tombol "Tambah Produk" di sudut kanan atas untuk memulai.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection