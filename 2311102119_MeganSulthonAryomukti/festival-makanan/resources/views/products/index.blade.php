@extends('layouts.app')

@section('content')
    <h1>Data Produk</h1>
    <a href="{{ route('products.create') }}" class="btn">+ Tambah Produk</a>
    <br><br>

    @if($products->count() > 0)
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                @foreach($products as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('products.show', $item->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@endsection