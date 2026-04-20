@extends('layouts.app')

@section('title', 'Kelola Produk')

@section('content')
    <section class="card">
        <div class="topbar" style="margin-bottom: 10px;">
            <div>
                <h1 style="margin: 0 0 6px;">Kelola Produk Restoran</h1>
                <p class="help" style="margin: 0;">Data ini dipakai untuk halaman depan Festival Kuliner.</p>
            </div>
            <a class="btn primary" href="{{ route('products.create') }}">Tambah Produk</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div style="overflow-x:auto;">
            <table>
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            <strong>{{ $product->name }}</strong>
                            <div class="help">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</div>
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->is_available ? 'Tampil' : 'Disembunyikan' }}</td>
                        <td>
                            <a class="btn" href="{{ route('products.edit', $product) }}">Edit</a>
                            <form class="inline-form" action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="help">Belum ada produk. Tambahkan produk pertama Anda.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 14px;">
            {{ $products->links() }}
        </div>
    </section>
@endsection
