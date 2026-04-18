@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <section class="surface-panel rounded-xl p-5 sm:p-6">
        <div class="mb-6">
            <h1 class="brand-title text-xl font-bold text-slate-100">Edit Produk</h1>
            <p class="text-sm text-muted">Perbarui data produk {{ $product->name }}.</p>
        </div>

        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-200">Kategori</label>
                <select id="category_id" name="category_id" class="select-field">
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <p class="mt-2 text-xs text-muted">
                    Opsi kategori ditarik otomatis dari data kategori admin.
                    <a href="{{ route('admin.categories.create') }}" class="text-rose-400 hover:text-rose-300">Tambah kategori baru</a>
                    jika belum tersedia.
                </p>
                @error('category_id')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="new_category_name" class="mb-2 block text-sm font-semibold text-slate-200">Atau Tambah Kategori Baru</label>
                <input
                    id="new_category_name"
                    name="new_category_name"
                    type="text"
                    class="input-field"
                    value="{{ old('new_category_name') }}"
                    placeholder="Contoh: Menu Favorit Baru"
                >
                <p class="mt-2 text-xs text-muted">Jika diisi, sistem akan membuat kategori baru otomatis lalu menggunakannya untuk produk ini.</p>
                @error('new_category_name')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-semibold text-slate-200">Nama Produk</label>
                    <input id="name" name="name" type="text" class="input-field" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="slug" class="mb-2 block text-sm font-semibold text-slate-200">Slug</label>
                    <input id="slug" name="slug" type="text" class="input-field" value="{{ old('slug', $product->slug) }}" required>
                    @error('slug')
                        <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="description" class="mb-2 block text-sm font-semibold text-slate-200">Deskripsi</label>
                <textarea id="description" name="description" class="textarea-field" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="price" class="mb-2 block text-sm font-semibold text-slate-200">Harga (Rp)</label>
                    <input id="price" name="price" type="number" min="0" step="0.01" class="input-field" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="mb-2 block text-sm font-semibold text-slate-200">Ganti Gambar (opsional)</label>
                    <input id="image" name="image" type="file" accept="image/png,image/jpeg,image/webp" class="input-field">
                    <p class="mt-2 text-xs text-muted">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @error('image')
                        <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="rounded-xl border border-slate-700/70 bg-slate-900/35 p-3">
                <p class="text-sm font-semibold text-slate-200">Gambar Saat Ini</p>
                <img
                    src="{{ asset('storage/' . $product->image_path) }}"
                    alt="{{ $product->name }}"
                    class="mt-3 h-40 rounded-lg border border-slate-700/70 object-cover"
                >
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-300" for="is_active">
                <input
                    id="is_active"
                    type="checkbox"
                    name="is_active"
                    value="1"
                    class="h-4 w-4 rounded border-slate-600 bg-slate-900 text-rose-600"
                    @checked(old('is_active', $product->is_active))
                >
                <span>Tampilkan produk di landing page (aktif)</span>
            </label>

            <div class="flex flex-wrap gap-3 pt-2">
                <button type="submit" class="btn-crimson">Simpan Perubahan</button>
                <a href="{{ route('admin.products.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </section>
@endsection
