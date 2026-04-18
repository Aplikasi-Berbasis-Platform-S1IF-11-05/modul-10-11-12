<!-- Input Nama Menu -->
<div class="mb-3">
    <label class="form-label fw-medium">Nama Menu</label>
    <input type="text" name="name" id="field-name" class="form-control" placeholder="Contoh: Nasi Goreng Ngawi" required>
</div>

<!-- Input Kategori Produk -->
<div class="mb-3">
    <label class="form-label fw-medium">Kategori</label>
    <select name="category_id" id="field-category_id" class="form-select" required>
        <option value="" disabled selected>Pilih Kategori</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<!-- Input Harga Menu -->
<div class="mb-3">
    <label class="form-label fw-medium">Harga (Rp)</label>
    <input type="number" name="price" id="field-price" class="form-control" placeholder="15000" required>
</div>

<!-- Input Gambar Produk -->
<div class="mb-3">
    <label class="form-label fw-medium">URL Gambar Produk</label>
    <input type="url" name="image" id="field-image" class="form-control" placeholder="https://example.com/image.jpg">
</div>

<!-- Input Deskripsi Produk -->
<div class="mb-3">
    <label class="form-label fw-medium">Deskripsi</label>
    <textarea name="description" id="field-description" class="form-control" rows="3" placeholder="Jelaskan kelezatan menu ini..." required></textarea>
</div>