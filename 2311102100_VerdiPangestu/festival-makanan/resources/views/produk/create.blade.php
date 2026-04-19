@extends('produk.layout')

@section('content')
<style>
    /* --- STYLING FORM PREMIUM --- */
    .form-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.04), 0 5px 15px rgba(0,0,0,0.02);
        border: 1px solid rgba(0,0,0,0.03);
        position: relative;
        overflow: hidden;
    }

    /* Aksen Gradien Atas */
    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #c0392b, #e67e22);
    }

    /* Styling Input & Select */
    .form-control, .form-select {
        padding: 14px 18px;
        border-radius: 12px;
        border: 1px solid #e4e4e4;
        background-color: #fafaf9;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        background-color: #ffffff;
        border-color: #c0392b;
        box-shadow: 0 0 0 4px rgba(192, 57, 43, 0.1);
    }

    /* Khusus input file agar teksnya sejajar */
    input[type="file"].form-control {
        padding: 11px 18px;
    }

    .form-label {
        font-weight: 700;
        color: #2c3e50;
        font-size: 0.9rem;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
    }

    .input-group-text {
        background-color: #fafaf9;
        border: 1px solid #e4e4e4;
        border-right: none;
        border-radius: 12px 0 0 12px;
        color: #888;
        padding-left: 18px;
    }

    .form-control.with-icon {
        border-left: none;
        padding-left: 0;
    }

    /* Styling Switch (Checkbox) */
    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
        margin-top: 0;
        cursor: pointer;
    }
    .form-switch .form-check-input:checked {
        background-color: #27ae60;
        border-color: #27ae60;
    }
    .form-check-label {
        font-weight: 600;
        color: #2c3e50;
        margin-left: 10px;
        margin-top: 4px;
        cursor: pointer;
    }

    /* Styling Tombol */
    .btn-submit {
        background: linear-gradient(135deg, #c0392b, #d35400);
        color: white;
        font-weight: 700;
        padding: 12px 30px;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.2);
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(192, 57, 43, 0.3);
        color: white;
    }

    .btn-cancel {
        color: #6c757d;
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 50px;
        border: 1px solid #dee2e6;
        background: white;
        transition: all 0.3s ease;
    }
    .btn-cancel:hover {
        background: #f8f9fa;
        color: #2c3e50;
        border-color: #c6c6c6;
    }

    /* Styling Error Alert */
    .alert-error-custom {
        background-color: #fff5f5;
        border: 1px solid #ffe3e3;
        border-radius: 12px;
        color: #c0392b;
    }
</style>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-xl-7">
        
        {{-- Tombol Kembali --}}
        <div class="mb-4">
            <a href="/produk" class="text-decoration-none text-muted fw-semibold">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Produk
            </a>
        </div>

        <div class="form-card p-4 p-md-5">
            {{-- Header Form --}}
            <div class="text-center mb-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                    <i class="bi bi-plus-circle-fill fs-2" style="color: #c0392b;"></i>
                </div>
                <h3 class="fw-bold mb-1" style="color: #2c3e50; letter-spacing: -0.5px;">Tambah Produk Baru</h3>
                <p class="text-muted small">Lengkapi informasi di bawah ini untuk menambahkan menu ke katalog</p>
            </div>

            {{-- Pesan Error Validasi --}}
            @if($errors->any())
                <div class="alert alert-error-custom d-flex mb-4 p-3">
                    <i class="bi bi-exclamation-triangle-fill me-3 mt-1 fs-5"></i>
                    <div>
                        <span class="fw-bold">Gagal menyimpan data!</span>
                        <ul class="mb-0 mt-1 small ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Form dengan enctype untuk upload file --}}
            <form action="/produk" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Row 1: Nama Produk & Kategori --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-7">
                        <label class="form-label">Nama Produk</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                            <input type="text" name="nama_produk"
                                   class="form-control with-icon" value="{{ old('nama_produk') }}"
                                   placeholder="cth: Nasi Pecel Ngawi Spesial" required>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <label class="form-label">Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tags"></i></span>
                            <select name="kategori" class="form-select with-icon" required>
                                <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Pilih Kategori</option>
                                <option value="Makanan"  {{ old('kategori') == 'Makanan'  ? 'selected' : '' }}>Makanan</option>
                                <option value="Minuman"  {{ old('kategori') == 'Minuman'  ? 'selected' : '' }}>Minuman</option>
                                <option value="Dessert"  {{ old('kategori') == 'Dessert'  ? 'selected' : '' }}>Dessert</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Row 2: Harga --}}
                <div class="mb-4">
                    <label class="form-label">Harga Produk</label>
                    <div class="input-group">
                        <span class="input-group-text fw-bold" style="color: #555;">Rp</span>
                        <input type="number" name="harga"
                            class="form-control with-icon" value="{{ old('harga') }}"
                            placeholder="0" min="0" required>
                    </div>
                    <div class="form-text mt-2 small text-muted"><i class="bi bi-info-circle me-1"></i>Masukkan angka saja tanpa titik atau koma (cth: 15000)</div>
                </div>

                {{-- Row 3: Deskripsi --}}
                <div class="mb-4">
                    <label class="form-label">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" class="form-control"
                              rows="4" placeholder="Jelaskan komposisi atau rasa dari produk ini..." required>{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Row 4: Upload Gambar --}}
                <div class="mb-4">
                    <label class="form-label">Upload Gambar Produk (Opsional)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-image"></i></span>
                        <input type="file" name="gambar" class="form-control with-icon" accept="image/*">
                    </div>
                    <div class="form-text mt-2 small text-muted"><i class="bi bi-info-circle me-1"></i>Format yang didukung: JPG, PNG, JPEG. Maksimal 2MB.</div>
                </div>

                {{-- Row 5: Status Ketersediaan (Tampilan Switch) --}}
                <div class="mb-5 p-3 rounded-3" style="background-color: #f8f9fa; border: 1px dashed #dee2e6;">
                    <div class="form-check form-switch d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" role="switch"
                        name="tersedia" id="tersedia"
                        {{ old('tersedia', true) ? 'checked' : '' }}>
                        <label class="form-check-label ms-3" for="tersedia">
                            <span class="d-block text-dark">Produk Tersedia</span>
                            <span class="text-muted small fw-normal">Aktifkan jika produk ini siap dijual hari ini.</span>
                        </label>
                    </div>
                </div>

                {{-- Row 6: Action Buttons --}}
                <div class="d-flex flex-column flex-sm-row gap-3 mt-2 pt-3 border-top">
                    <button type="submit" class="btn btn-submit flex-grow-1">
                        <i class="bi bi-save me-2"></i> Simpan Produk
                    </button>
                    <a href="/produk" class="btn btn-cancel flex-grow-1 text-center text-decoration-none">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection