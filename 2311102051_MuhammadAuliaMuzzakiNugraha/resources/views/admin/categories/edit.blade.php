@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <section class="surface-panel rounded-xl p-5 sm:p-6">
        <div class="mb-6">
            <h1 class="brand-title text-xl font-bold text-slate-100">Edit Kategori</h1>
            <p class="text-sm text-muted">Perbarui data kategori {{ $category->name }}.</p>
        </div>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="mb-2 block text-sm font-semibold text-slate-200">Nama Kategori</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    class="input-field"
                    value="{{ old('name', $category->name) }}"
                    required
                >
                @error('name')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="slug" class="mb-2 block text-sm font-semibold text-slate-200">Slug</label>
                <input
                    id="slug"
                    name="slug"
                    type="text"
                    class="input-field"
                    value="{{ old('slug', $category->slug) }}"
                    required
                >
                @error('slug')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3 pt-2">
                <button type="submit" class="btn-crimson">Simpan Perubahan</button>
                <a href="{{ route('admin.categories.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </section>
@endsection
