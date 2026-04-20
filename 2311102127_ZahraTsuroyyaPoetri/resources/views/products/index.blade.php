@extends('template')

@section('content')

<div class="section-wrapper">
    <div class="section-box">
        <h2 class="section-title">Menu Pilihan</h2>
    </div>
</div>

<div class="grid">
@foreach($products as $product)
    <div class="card">

        <h3>{{ $product->name }}</h3>

        <p class="desc">
            {{ $product->description }}
        </p>

        <p class="price">
            Rp {{ number_format($product->price,0,',','.') }}
        </p>

        <div class="actions">

            <a href="{{ route('products.edit',$product->id) }}"
            class="icon-btn icon-edit">
                <i class="bi bi-pencil"></i>
            </a>

            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="icon-btn icon-delete">
                    <i class="bi bi-trash"></i>
                </button>
            </form>

</div>

    </div>
@endforeach
</div>

<a href="{{ route('products.create') }}" class="floating-btn">
    + Tambah
</a>

@endsection