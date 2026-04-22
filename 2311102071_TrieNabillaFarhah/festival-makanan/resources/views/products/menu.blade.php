@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    html, body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #b37d59 0%, #734926 100%);
    }

    .section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        min-height: 100vh;
        color: white;
    }

    .section h1 {
        text-align: center;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 50px;
        letter-spacing: 2px;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .btn-nav {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        color: #fff;
        padding: 10px 22px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: 0.3s;
    }

    .btn-nav:hover {
        background: #fff;
        color: #2d251f;
        transform: translateY(-3px);
    }

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 18px;
}

.card {
    background: #f5f0e6;
    border-radius: 18px;
    width: 240px;              /* 🔥 ukuran pas */
    padding: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

.card img {
    width: 100%;
    height: 140px;             /* 🔥 lebih gede */
    object-fit: cover;         /* 🔥 biar rapi */
    border-radius: 12px;
    margin-bottom: 10px;
}

    .card:hover img {
        transform: scale(1.1) rotate(5deg);
    }

.card h3 {
    font-size: 18px;
    margin-bottom: 4px;
    color: #2d1e17;
}

.desc {
    font-size: 13px;
    color: #777;
    margin-bottom: 10px;
}

.bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 8px;
}

.price {
    color: #e67e22;
    font-weight: bold;
}

.rating {
    color: #f39c12;
    font-size: 13px;
}

.actions {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 12px;
}

.actions a, .actions button {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
}

.card {
    backdrop-filter: blur(10px);
}

.desc {
    font-size: 11px;
}

.price {
    font-size: 13px;
}

.left {
    display: flex;
    align-items: center;
    gap: 15px;
}

/* judul tengah */
.title-center {
    text-align: center;
    margin: 20px 0 30px 0;
}

.title-center h1 {
    font-size: 36px;
    font-weight: 700;
    color: white;
}

/* tombol tambah */
.add-wrapper {
    margin-bottom: 20px;
}

.btn-add {
    background: rgba(81, 55, 55, 0.77);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 13px;
}

.top-bar {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    align-items: center;
    margin-bottom: 25px;
}

/* kiri */
.top-bar .left {
    justify-self: start;
}

/* tengah */
.title-center {
    justify-self: center;
    font-size: 32px;
    font-weight: 700;
    color: white;
}

/* kanan (kosong biar balance) */
.right {
    justify-self: end;
}
</style>

<div class="section">


<div class="top-bar">
    <a href="/" class="btn-nav left">Dashboard</a>

    <div class="title-center">
        Kelola Produk
    </div>

    <div class="right"></div>
</div>

<div class="add-wrapper">
    <a href="/products/create" class="btn-add">Tambah Produk</a>
</div>

    <div class="grid">
        @forelse($products as $p)
            <div class="card">

                @if($p->image)
                <img src="{{ asset('storage/' . $p->image) }}">
            @else
                <img src="{{ asset('image/ayam.png') }}">
            @endif

                <h3>{{ $p->name }}</h3>

                <div class="desc">
                    {{ $p->description }}
                </div>

               <div class="bottom">
    <span class="price">
        Rp {{ number_format($p->price,0,',','.') }}
    </span>
    <span class="rating">
        @for ($i = 1; $i <= 5; $i++)
            @if($i <= $p->rating)
                ★
            @else
                ☆
            @endif
        @endfor
    </span>
</div>

                <div class="actions">
    <a href="/products/{{ $p->id }}/edit" class="icon-btn edit">
        <i class="fa-solid fa-pen"></i>
    </a>

    <form action="/products/{{ $p->id }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
        @csrf
        @method('DELETE')
        <button class="icon-btn delete">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</div>

            </div>
        @empty
            <p class="empty-msg">Belum ada menu</p>
        @endforelse
    </div>

</div>

@endsection