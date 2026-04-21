@extends('layouts.app')

@section('content')
    {{-- DASHBOARD --}}
    @if($halaman == 'depan')
    <div class="hero-section text-center">
        <div class="container">
            <span class="badge bg-primary/20 text-info border border-info px-3 py-2 rounded-pill mb-3">
                <i class="bi bi-rocket-takeoff me-1"></i> Program 19.000 Lapangan Kerja
            </span>
            <h1 class="display-5 fw-bold mb-3">Festival Makanan <span style="color: #38bdf8;">Ngawi Timur</span></h1>
            <p class="lead text-slate-300 mx-auto" style="max-width: 600px; color: #cbd5e1;">
                Eksplorasi kuliner terbaik dari restoran Mas Jakobi. Didukung penuh oleh Jendral Ladesh.
            </p>
        </div>
    </div>
    @endif

    <div class="container pb-5 mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 bg-success text-white rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($halaman == 'depan')
            <div class="row g-4">
                @forelse($products as $p)
                <div class="col-lg-4 col-md-6">
                    <div class="card card-menu">
                        <img src="{{ $p->image_url ? asset('storage/' . $p->image_url) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=600&auto=format&fit=crop' }}" alt="{{ $p->name }}">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $p->name }}</h5>
                            <p class="card-text text-muted mb-4" style="font-size: 0.9rem; line-height: 1.6;">{{ $p->description }}</p>
                            <div class="d-flex align-items-center justify-content-between mt-auto">
                                <span class="price-tag"><i class="bi bi-tag-fill me-1"></i> Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 dash-container">
                    <i class="bi bi-inbox text-muted" style="font-size: 4rem;"></i>
                    <h4 class="fw-bold mt-3 text-dark">Belum Ada Menu</h4>
                </div>
                @endforelse
            </div>

        {{-- ADMIN PANEL --}}
        @elseif($halaman == 'manajemen')
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-1 text-dark">Manajemen Menu</h3>
                    <p class="text-muted mb-0">Kelola data makanan restoran Ngawi Timur</p>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Baru
                </button>
            </div>

            <div class="dash-container table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="80">Menu</th>
                            <th>Info Makanan</th>
                            <th>Harga</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $p)
                        <tr>
                            <td>
                                <img src="{{ $p->image_url ? asset('storage/' . $p->image_url) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=150&auto=format&fit=crop' }}" class="img-thumb">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $p->name }}</div>
                                <div class="text-muted d-inline-block text-truncate" style="max-width: 250px; font-size: 0.85rem;">{{ $p->description }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-success border border-success-subtle px-2 py-1">
                                    Rp {{ number_format($p->price, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('products.edit', $p->id) }}" class="btn btn-light text-primary action-btn me-1 border shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-light text-danger action-btn border shadow-sm" onclick="return confirm('Hapus menu {{ $p->name }}?')"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-4">Data Kosong</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- MODAL ADD --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-box-seam me-2 text-primary"></i> Tambah Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3"><label class="form-label">Nama Menu</label><input type="text" name="name" class="form-control" required></div>
                        <div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="description" class="form-control" rows="3" required></textarea></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Harga (Rp)</label><input type="number" name="price" class="form-control" required></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Foto Produk</label><input type="file" name="image" class="form-control" accept="image/*"></div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    @if(isset($editProduct))
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-pencil-square me-2 text-warning"></i> Edit Menu</h5>
                    <a href="{{ route('products.index') }}" class="btn-close" aria-label="Close"></a>
                </div>
                <form action="{{ route('products.update', $editProduct->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3"><label class="form-label">Nama Menu</label><input type="text" name="name" class="form-control" value="{{ $editProduct->name }}" required></div>
                        <div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="description" class="form-control" rows="3" required>{{ $editProduct->description }}</textarea></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Harga (Rp)</label><input type="number" name="price" class="form-control" value="{{ $editProduct->price }}" required></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Ganti Foto</label><input type="file" name="image" class="form-control" accept="image/*"></div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <a href="{{ route('products.index') }}" class="btn btn-light border">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-bold"><i class="bi bi-check-lg me-1"></i> Update Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection

{{-- Script Khusus Modal Edit --}}
@push('scripts')
    @if(isset($editProduct))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editModal = new bootstrap.Modal(document.getElementById('modalEdit'), { backdrop: 'static', keyboard: false });
            editModal.show();
        });
    </script>
    @endif
@endpush