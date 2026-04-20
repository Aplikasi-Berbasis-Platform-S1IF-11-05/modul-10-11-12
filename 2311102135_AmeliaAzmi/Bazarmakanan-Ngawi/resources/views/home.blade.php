<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Festival Kuliner Ngawi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: transparent;
    position: absolute;
    width: 100%;
    z-index: 10;
}

.navbar a {
    color: white !important;
}

/* HERO */
.hero {
    height: 100vh;
    background: linear-gradient(rgba(30,20,10,0.9), rgba(30,20,10,0.9)),
    url('https://images.unsplash.com/photo-1555992336-03a23c4a3b7f');
    background-size: cover;
    display: flex;
    align-items: center;
    color: white;
}

.hero h1 {
    font-size: 60px;
    font-weight: bold;
}

.btn-gold {
    background: #c8a96a;
    color: black;
    border: none;
}
.btn-gold:hover {
    background: #a88b50;
}

/* SECTION */
.section {
    padding: 80px 0;
}

/* CARD */
.menu-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
}
.menu-card:hover {
    transform: translateY(-10px);
}

.menu-img {
    height: 180px;
    background: #6d4c41;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: white;
}

/* FOOTER */
.footer {
    background: #1e140a;
    color: white;
    padding: 30px;
    text-align: center;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-5">
    <span class="navbar-brand fw-bold">☕ Jakobi Resto</span>
    <div class="ms-auto">
        <a href="/create" class="btn btn-gold">Admin Panel</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">
                <h1>Enjoy Our Delicious Meal</h1>
                <p>
                    Festival makanan digital untuk mendukung UMKM Ngawi oleh Mas Jakobi.
                </p>
                <a href="#menu" class="btn btn-gold mt-3">Lihat Menu</a>
            </div>

            <div class="col-md-6 text-center">
                <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2"
                     class="img-fluid rounded-circle shadow"
                     style="width: 300px; height:300px; object-fit:cover;">
            </div>

        </div>
    </div>
</div>

<!-- MENU (VERSI UNIK & PREMIUM) -->
<div class="section" id="menu" style="background:#f5f1ec;">
    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Special Menu</h2>
            <p class="text-muted">Pilihan terbaik dari Jakobi Resto</p>
        </div>

        <!-- WRAPPER FLEX -->
        <div style="display:flex; gap:30px; overflow-x:auto; padding-bottom:10px;">

            @foreach($products as $p)
            <div style="min-width:300px; flex:0 0 auto;">

                <div style="
                    background:white;
                    border-radius:20px;
                    overflow:hidden;
                    box-shadow:0 10px 25px rgba(0,0,0,0.1);
                    transition:0.3s;
                " onmouseover="this.style.transform='scale(1.05)'" 
                   onmouseout="this.style.transform='scale(1)'">

                    <!-- TOP IMAGE STYLE -->
                    <div style="
                        height:180px;
                        background:linear-gradient(135deg,#6d4c41,#3e2723);
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:white;
                        font-size:50px;
                    ">
                        🍽️
                    </div>

                    <!-- CONTENT -->
                    <div style="padding:20px;">

                        <h5 class="fw-bold">{{ $p->name }}</h5>

                        <p class="text-muted" style="font-size:14px;">
                            {{ $p->description ?? 'Menu spesial terbaik kami' }}
                        </p>

                        <!-- PRICE -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span style="color:#6d4c41; font-weight:bold;">
                                Rp {{ number_format($p->price) }}
                            </span>
                        </div>

                        <!-- ACTION -->
                        <div class="mt-3 d-flex gap-2">
                            <a href="/edit/{{ $p->id }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/delete/{{ $p->id }}" class="btn btn-sm btn-danger">Hapus</a>
                        </div>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</div>