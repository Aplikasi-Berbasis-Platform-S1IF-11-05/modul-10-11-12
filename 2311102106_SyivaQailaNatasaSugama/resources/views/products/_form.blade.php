@csrf

<div class="grid cols-2">
    <div class="field">
        <label for="name">Nama Produk</label>
        <input id="name" type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        @error('name')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="category">Kategori</label>
        <input id="category" type="text" name="category" value="{{ old('category', $product->category ?? 'Menu Utama') }}" required>
        @error('category')<p class="error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="grid cols-2">
    <div class="field">
        <label for="price">Harga (Rp)</label>
        <input id="price" type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price ?? '') }}" required>
        @error('price')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="image_url">URL Gambar (opsional)</label>
        <input id="image_url" type="url" name="image_url" value="{{ old('image_url', $product->image_url ?? '') }}" placeholder="https://...">
        @error('image_url')<p class="error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="field">
    <label for="description">Deskripsi Produk</label>
    <textarea id="description" name="description" required>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')<p class="error">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label>
        <input type="checkbox" name="is_available" value="1" {{ old('is_available', $product->is_available ?? true) ? 'checked' : '' }}>
        Produk tersedia untuk ditampilkan di halaman depan
    </label>
</div>

<div class="nav">
    <button type="submit" class="btn primary">Simpan Produk</button>
    <a class="btn" href="{{ route('products.index') }}">Batal</a>
</div>
