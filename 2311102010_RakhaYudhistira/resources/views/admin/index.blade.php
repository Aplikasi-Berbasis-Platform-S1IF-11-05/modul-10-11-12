<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Manajemen Menu Festival</h2>
    <button class="btn btn-primary shadow-sm px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> + Menu Baru
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive bg-white p-4 shadow-sm rounded-4">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 15%">Gambar</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th style="width: 25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>
                    @if($p->image_url)
                        <img src="{{ asset('images/'.$p->image_url) }}" width="80" height="60" style="object-fit: cover;" class="rounded shadow-sm" alt="{{ $p->name }}">
                    @else
                        <span class="badge bg-secondary">No Image</span>
                    @endif
                </td>
                <td>
                    <div class="fw-bold">{{ $p->name }}</div>
                    <small class="text-muted">{{ Str::limit($p->description, 50) }}</small>
                </td>
                <td class="text-success fw-bold">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-warning px-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id }}">
                            Edit
                        </button>

                        <form action="{{ route('admin.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger px-3">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg border-0" style="overflow: hidden; border-radius: 15px;">
                    
                    <form action="{{ route('admin.update', $p->id) }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 0;">
                        @csrf 
                        @method('PUT')
                        
                        <div class="modal-header bg-warning border-0 p-3 d-flex justify-content-between align-items-center" style="position: static; width: 100%;">
                            <h5 class="modal-title fw-bold text-dark m-0">Edit Produk Festival</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body p-4 bg-white" style="position: static; width: 100%;">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Nama Makanan</label>
                                <input type="text" name="name" value="{{ $p->name }}" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ $p->price }}" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Deskripsi Singkat</label>
                                <textarea name="description" class="form-control" rows="3">{{ $p->description }}</textarea>
                            </div>
                            
                            <div class="mb-1">
                                <label class="form-label fw-bold small text-uppercase">Ganti Foto</label>
                                <input type="file" name="image_url" class="form-control">
                            </div>
                            <small class="text-muted d-block mt-1" style="font-size: 0.7rem;">File lama: {{ $p->image_url }}</small>
                        </div>
                        
                        <div class="modal-footer bg-light border-0 p-3" style="position: static; width: 100%;">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning px-4 fw-bold text-dark shadow-sm">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="modal-content shadow-lg">
            @csrf
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title fw-bold">Tambah Produk Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Nama Makanan</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Sate Ngawi" required>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" placeholder="25000" required>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Deskripsi Singkat</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Jelaskan kelezatan masakan Mas Jakobi..."></textarea>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="small fw-bold">Foto Produk</label>
                    <input type="file" name="image_url" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-5 shadow-sm fw-bold">Simpan ke Database</button>
            </div>
        </form>
    </div>
</div>
@endsection