@extends('layouts.app')

@section('title', 'Manajemen Menu - Admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="letter-spacing: -0.05em;">Manajemen Menu</h1>
            <p class="text-muted">Kelola produk festival makanan PawonNgawiFest.</p>
        </div>
        <!-- Trigger Modal Create -->
        <button type="button" class="btn btn-dark px-4 py-2" style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#createModal">
            + Tambah Menu Baru
        </button>
    </div>

    @if(session('success'))
        <div class="v-alert v-alert-success mb-4">
            <span class="fw-bold me-2">Success:</span> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="v-alert v-alert-error mb-4">
            <div class="d-flex flex-column">
                <span class="fw-bold mb-1">Error:</span>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="v-card p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">
                    <tr>
                        <th class="px-4 py-3 border-0">Menu</th>
                        <th class="py-3 border-0">Kategori</th>
                        <th class="py-3 border-0 text-end">Harga</th>
                        <th class="px-4 py-3 border-0 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody style="font-size: 0.95rem;">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $product->image ?? 'https://placehold.co/600x400?text=No+Image' }}" 
                                         alt="{{ $product->name }}" 
                                         class="rounded me-3"
                                         style="width: 48px; height: 48px; object-fit: cover; border: 1px solid var(--v-border);">
                                    <div>
                                        <div class="fw-semibold">{{ $product->name }}</div>
                                        <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                            {{ $product->description }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="v-badge mb-0">{{ $product->category->name ?? 'Tanpa Kategori' }}</span>
                            </td>
                            <td class="py-3 text-end fw-medium">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Trigger Modal Edit -->
                                    <button class="btn btn-light btn-sm border edit-button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-category="{{ $product->category_id }}"
                                            data-price="{{ $product->price }}"
                                            data-image="{{ $product->image }}"
                                            data-description="{{ $product->description }}">
                                        Edit
                                    </button>
                                    <!-- Trigger Modal Delete -->
                                    <button class="btn btn-outline-danger btn-sm delete-button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                Belum ada menu yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @include('products.partials.form', ['categories' => \App\Models\Category::all()])
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark px-4">Simpan Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    @include('products.partials.form', ['categories' => \App\Models\Category::all()])
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark px-4">Perbarui Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
        <div class="modal-content border-0 shadow-xl" style="border-radius: var(--v-radius);">
            <div class="modal-body p-4">
                <h2 class="fw-bold mb-3" style="letter-spacing: -0.06em; font-size: 1.5rem; color: #000;">Hapus Menu</h2>
                <p class="text-muted mb-4" style="font-size: 1rem; line-height: 1.5;">
                    Apakah Anda yakin ingin menghapus <span id="delete-name" class="fw-bold text-dark"></span>? 
                    Tindakan ini permanen dan tidak dapat dibatalkan.
                </p>
                
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-light px-4 py-2" data-bs-dismiss="modal" 
                                style="border: 1px solid var(--v-border); font-weight: 500; font-size: 0.9rem; border-radius: 6px;">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-danger px-4 py-2" 
                                style="font-weight: 600; font-size: 0.9rem; background-color: #000; border: 1px solid #000; border-radius: 6px; transition: all 0.2s;">
                            Ya, Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    #deleteModal .btn-danger:hover {
        background-color: #ff0000 !important;
        border-color: #ff0000 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Edit Modal Data
        const editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const form = document.getElementById('editForm');
                form.action = `/admin/products/${id}`;

                // Fill fields in the modal form
                document.querySelector('#editModal #field-name').value = this.getAttribute('data-name');
                document.querySelector('#editModal #field-category_id').value = this.getAttribute('data-category');
                document.querySelector('#editModal #field-price').value = this.getAttribute('data-price');
                document.querySelector('#editModal #field-image').value = this.getAttribute('data-image');
                document.querySelector('#editModal #field-description').value = this.getAttribute('data-description');
            });
        });

        // Logika Hapus Modal
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const form = document.getElementById('deleteForm');
                form.action = `/admin/products/${id}`;
                document.getElementById('delete-name').textContent = name;
            });
        });
    });
</script>
@endsection@endsection