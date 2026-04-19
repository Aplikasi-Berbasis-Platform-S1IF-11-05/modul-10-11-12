<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Festival Kuliner Ngawi - Menikmati cita rasa autentik dari Restoran Mas Jakobi, bagian dari program digitalisasi Ngawi Barat.">
    <meta name="keywords" content="Festival Kuliner Ngawi, Restoran Mas Jakobi, Makanan Ngawi, Digitalisasi Ngawi Barat, Kuliner Nusantara">
    <title>Festival Kuliner Ngawi - Restoran Mas Jakobi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold:       #d4a017;
            --gold-light: #f0c842;
            --gold-dark:  #a07810;
            --emerald:    #1a6b4a;
            --emerald-light: #2da06e;
            --cream:      #faf6ef;
            --dark:       #1a1208;
            --dark-card:  #211a0c;
            --text-muted: #7a6a4f;
            --border:     rgba(212, 160, 23, 0.25);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--cream);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* ─── Toast Notification ─── */
        .toast {
            position: fixed;
            top: 90px;
            right: 24px;
            background: var(--emerald);
            color: white;
            padding: 1rem 1.8rem;
            border-radius: 14px;
            z-index: 9999;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(26,107,74,0.35);
            animation: slideFromRight 0.5s cubic-bezier(.21,1.02,.73,1) both;
        }
        @keyframes slideFromRight {
            from { transform: translateX(120%); opacity: 0; }
            to   { transform: translateX(0); opacity: 1; }
        }

        /* ─── Navbar ─── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 4rem;
            background: rgba(26, 18, 8, 0.92);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            z-index: 1000;
        }
        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gold);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        .brand-icon { font-size: 1.4rem; }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }
        .nav-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.03em;
            transition: color 0.25s;
        }
        .nav-links a:hover { color: var(--gold-light); }
        .nav-cta {
            background: var(--gold) !important;
            color: var(--dark) !important;
            padding: 0.55rem 1.4rem;
            border-radius: 999px;
            font-weight: 600 !important;
            transition: background 0.25s, transform 0.2s !important;
        }
        .nav-cta:hover {
            background: var(--gold-light) !important;
            transform: scale(1.04);
        }

        /* ─── Hero ─── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(160deg, #1a1208 0%, #2c1f08 50%, #1a3020 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 6rem 2rem 4rem;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% 110%, rgba(212,160,23,0.12) 0%, transparent 70%),
                radial-gradient(ellipse 60% 40% at 80% 20%,  rgba(26,107,74,0.15) 0%, transparent 60%);
        }
        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }
        .orb-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(212,160,23,0.18), transparent);
            top: -100px; right: -100px;
            animation: floatOrb 8s ease-in-out infinite;
        }
        .orb-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(26,107,74,0.2), transparent);
            bottom: -80px; left: -80px;
            animation: floatOrb 10s ease-in-out infinite reverse;
        }
        @keyframes floatOrb {
            0%, 100% { transform: translate(0, 0); }
            50%       { transform: translate(20px, -20px); }
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 860px;
            animation: fadeUp 1s ease-out both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(212,160,23,0.15);
            border: 1px solid rgba(212,160,23,0.35);
            color: var(--gold-light);
            padding: 0.45rem 1.2rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 1.8rem;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 900;
            color: white;
            line-height: 1.08;
            margin-bottom: 1.8rem;
        }
        .hero h1 .highlight {
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-desc {
            font-size: 1.18rem;
            color: rgba(255,255,255,0.65);
            font-weight: 300;
            line-height: 1.75;
            max-width: 660px;
            margin: 0 auto 2.5rem;
        }
        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: var(--dark);
            padding: 0.9rem 2.4rem;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(212,160,23,0.4);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(212,160,23,0.5);
        }
        .btn-outline {
            background: transparent;
            color: rgba(255,255,255,0.8);
            padding: 0.9rem 2.4rem;
            border-radius: 999px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.25);
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            border-color: var(--gold);
            color: var(--gold-light);
            transform: translateY(-3px);
        }

        /* ─── Stats Strip ─── */
        .stats-strip {
            background: var(--dark);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 2rem 4rem;
            display: flex;
            justify-content: center;
            gap: 5rem;
            flex-wrap: wrap;
        }
        .stat-item { text-align: center; }
        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--gold);
        }
        .stat-label {
            font-size: 0.78rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.45);
            font-weight: 600;
            margin-top: 0.25rem;
        }

        /* ─── Products Section ─── */
        .products-section {
            padding: 6rem 2rem;
            max-width: 1280px;
            margin: 0 auto;
        }
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        .section-eyebrow {
            display: inline-block;
            font-size: 0.78rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--emerald);
            font-weight: 600;
            margin-bottom: 0.8rem;
        }
        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        .section-header p {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 540px;
            margin: 0 auto 2rem;
        }

        /* ─── Product Grid ─── */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            /* overflow: hidden; */
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: transform 0.35s cubic-bezier(.21,1.02,.73,1), box-shadow 0.35s ease;
            opacity: 0;
            transform: translateY(24px);
        }
        .product-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 48px rgba(0,0,0,0.12);
        }
        /* Pastikan card-body tidak terpotong */
        .product-card .card-body { overflow: visible; }

        .card-image-wrap {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .card-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .product-card:hover .card-image-wrap img {
            transform: scale(1.08);
        }
        .card-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: var(--emerald);
            color: white;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 999px;
        }
        .card-rating {
            position: absolute;
            top: 14px;
            right: 14px;
            background: rgba(26,18,8,0.85);
            color: var(--gold-light);
            font-size: 0.78rem;
            font-weight: 600;
            padding: 0.3rem 0.7rem;
            border-radius: 999px;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .card-body { padding: 1.6rem; }
        .card-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        .card-desc {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.65;
            margin-bottom: 1.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1.2rem;
            border-top: 1px dashed rgba(0,0,0,0.1);
        }
        .card-price {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--gold-dark);
        }
        .card-stock {
            font-size: 0.78rem;
            color: var(--text-muted);
            display: block;
            margin-top: 0.15rem;
        }
        .btn-order {
            background: var(--dark);
            color: white;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.6rem 1.3rem;
            border-radius: 10px;
            text-decoration: none;
            transition: background 0.25s, transform 0.2s;
            white-space: nowrap;
        }
        .btn-order:hover {
            background: var(--emerald);
            transform: scale(1.04);
        }
        .card-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-delete {
            background: #fff5f5;
            border: 1.5px solid #feb2b2;
            color: #c53030;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.6rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: all 0.2s ease;
            z-index: 100 !important;
            position: relative;
            pointer-events: auto !important;
        }
        .btn-delete:hover {
            background: #fed7d7;
            border-color: #c53030;
            transform: scale(1.05);
        }
        .delete-form {
            display: inline-block;
            margin: 0;
            padding: 0;
            position: relative;
            z-index: 100;
        }

        /* Empty State */
        .empty-state {
            grid-column: 1/-1;
            text-align: center;
            padding: 5rem 2rem;
        }
        .empty-icon { font-size: 4rem; margin-bottom: 1rem; }
        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }
        .empty-state p { color: var(--text-muted); margin-bottom: 2rem; }

        /* ─── About Section ─── */
        .about-section {
            background: var(--dark);
            padding: 6rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .about-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 60% at 50% 0%, rgba(212,160,23,0.08), transparent);
        }
        .about-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        .about-text .section-eyebrow { color: var(--gold-light); }
        .about-text h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 3.5vw, 2.8rem);
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.25;
        }
        .about-text p {
            color: rgba(255,255,255,0.6);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        .about-quote {
            margin-top: 2rem;
            padding: 1.5rem;
            border-left: 3px solid var(--gold);
            background: rgba(212,160,23,0.06);
            border-radius: 0 12px 12px 0;
        }
        .about-quote p {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: rgba(255,255,255,0.8);
            font-size: 1.05rem;
        }
        .about-quote cite {
            display: block;
            margin-top: 0.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.82rem;
            color: var(--gold);
            font-weight: 600;
            font-style: normal;
        }
        .about-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }
        .about-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            padding: 2rem;
            border-radius: 18px;
            text-align: center;
            transition: background 0.3s, border-color 0.3s;
        }
        .about-card:hover {
            background: rgba(212,160,23,0.08);
            border-color: rgba(212,160,23,0.3);
        }
        .about-card .card-num {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--gold);
        }
        .about-card .card-lbl {
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-top: 0.4rem;
            font-weight: 600;
        }
        .about-card-wide {
            grid-column: span 2;
            background: linear-gradient(135deg, var(--emerald) 0%, #0e4230 100%);
            border-color: transparent;
        }
        .about-card-wide p {
            color: rgba(255,255,255,0.85);
            font-size: 0.95rem;
            font-weight: 500;
        }
        .about-card-wide .card-lbl { color: rgba(255,255,255,0.5); }

        /* ─── Footer ─── */
        footer {
            background: #0e0a04;
            border-top: 1px solid var(--border);
            padding: 4rem 2rem 2rem;
            text-align: center;
        }
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold);
            display: block;
            margin-bottom: 0.75rem;
        }
        .footer-tagline {
            color: rgba(255,255,255,0.4);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2.5rem;
        }
        .footer-links a {
            color: rgba(255,255,255,0.45);
            text-decoration: none;
            font-size: 0.88rem;
            transition: color 0.25s;
        }
        .footer-links a:hover { color: var(--gold-light); }
        .footer-divider {
            width: 60px;
            height: 1px;
            background: var(--border);
            margin: 0 auto 1.5rem;
        }
        .footer-copy {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.25);
        }

        /* ─── Responsive ─── */
        @media (max-width: 900px) {
            .about-inner { grid-template-columns: 1fr; }
            .about-cards { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 680px) {
            .navbar { padding: 0 1.5rem; }
            .stats-strip { gap: 2.5rem; padding: 2rem; }
            .hero h1 { font-size: 2.8rem; }
            .nav-links { display: none; }
            .about-card-wide { grid-column: span 2; }
        }
    </style>
</head>
<body>

    <?php if(session('success')): ?>
    <div class="toast" id="toast"><?php echo e(session('success')); ?></div>
    <script>setTimeout(() => { const t = document.getElementById('toast'); if(t) t.remove(); }, 4500);</script>
    <?php endif; ?>

    <!-- ─── Navbar ─── -->
    <nav class="navbar" id="top">
        <a href="#" class="brand">
            <span class="brand-icon">🍜</span> Festival Kuliner Ngawi
        </a>
        <ul class="nav-links">
            <li><a href="#top">Beranda</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="<?php echo e(route('products.create')); ?>" class="nav-cta">+ Tambah Menu</a></li>
        </ul>
    </nav>

    <!-- ─── Hero ─── -->
    <header class="hero">
        <div class="hero-orb orb-1"></div>
        <div class="hero-orb orb-2"></div>
        <div class="hero-content">
            <div class="hero-badge">🎪 Program Digitalisasi Ngawi Barat</div>
            <h1>
                Festival Kuliner<br>
                <span class="highlight">Ngawi</span>
            </h1>
            <p class="hero-desc">
                Selamat datang di platform digital Restoran Mas Jakobi — merayakan kelezatan autentik Ngawi Timur,
                didukung oleh Jendral Ladesh dalam mewujudkan 19.000 lapangan pekerjaan baru.
            </p>
            <div class="hero-actions">
                <a href="#menu" class="btn-primary">🍽️ Lihat Menu Spesial</a>
                <a href="#tentang" class="btn-outline">Selengkapnya →</a>
            </div>
        </div>
    </header>

    <!-- ─── Stats Strip ─── -->
    <div class="stats-strip">
        <div class="stat-item">
            <div class="stat-value">19K+</div>
            <div class="stat-label">Lapangan Kerja</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">100%</div>
            <div class="stat-label">Bahan Lokal</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">Ngawi</div>
            <div class="stat-label">Timur — Barat</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">2026</div>
            <div class="stat-label">Tahun Digitalisasi</div>
        </div>
    </div>

    <!-- ─── Products Section ─── -->
    <section class="products-section" id="menu">
        <div class="section-header">
            <span class="section-eyebrow">✦ Menu Festival</span>
            <h2>Menu Unggulan Restoran Mas Jakobi</h2>
            <p>Nikmati pilihan hidangan terbaik yang dibuat dengan cita rasa autentik Ngawi, langsung dari dapur Mas Jakobi.</p>
            <a href="<?php echo e(route('products.create')); ?>" class="btn-primary" style="font-size:0.9rem; padding: 0.75rem 1.8rem;">
                + Tambah Produk Baru
            </a>
        </div>

        <div class="product-grid">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="product-card">
                <div class="card-image-wrap">
                    <img src="<?php echo e(asset('images/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" loading="lazy">
                    <span class="card-badge"><?php echo e($product->category); ?></span>
                    <span class="card-rating">⭐ <?php echo e(number_format($product->rating, 1)); ?></span>
                </div>
                <div class="card-body">
                    <h3 class="card-name"><?php echo e($product->name); ?></h3>
                    <p class="card-desc"><?php echo e($product->description); ?></p>
                    <div class="card-footer">
                        <div>
                            <span class="card-price">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
                            <span class="card-stock">Stok: <?php echo e($product->stock); ?> porsi</span>
                        </div>
                        <div class="card-actions" style="position: relative; z-index: 999;">
                            <a href="#" class="btn-order">Pesan</a>
                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="delete-form" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-delete" title="Hapus Produk">
                                    🗑 Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state">
                <div class="empty-icon">🍽️</div>
                <h3>Belum Ada Menu</h3>
                <p>Jadilah yang pertama menambahkan produk ke festival kuliner ini!</p>
                <a href="<?php echo e(route('products.create')); ?>" class="btn-primary">+ Tambah Menu Pertama</a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ─── About Section ─── -->
    <section class="about-section" id="tentang">
        <div class="about-inner">
            <div class="about-text">
                <span class="section-eyebrow">✦ Tentang Kami</span>
                <h2>Digitalisasi Ngawi Barat demi Masa Depan</h2>
                <p>
                    Inisiatif ini lahir dari visi bersama antara Mas Jakobi — sang pemilik restoran berbasis di Ngawi Timur — dan Jendral Ladesh selaku pendana dari Ngawi Barat.
                </p>
                <p>
                    Festival Kuliner Ngawi adalah wujud nyata dari program digitalisasi UMKM kuliner guna membuka <strong style="color:var(--gold)">19.000 lapangan pekerjaan baru</strong> bagi masyarakat Ngawi dan sekitarnya.
                </p>
                <div class="about-quote">
                    <p>"Kita wujudkan Ngawi yang maju melalui teknologi dan kearifan lokal."</p>
                    <cite>— Mas Jakobi, Pendiri Restoran</cite>
                </div>
            </div>
            <div class="about-cards">
                <div class="about-card">
                    <div class="card-num">19K</div>
                    <div class="card-lbl">Lapangan Kerja</div>
                </div>
                <div class="about-card">
                    <div class="card-num">100%</div>
                    <div class="card-lbl">Bahan Lokal</div>
                </div>
                <div class="about-card">
                    <div class="card-num">Ngawi</div>
                    <div class="card-lbl">Timur &amp; Barat</div>
                </div>
                <div class="about-card">
                    <div class="card-num">2026</div>
                    <div class="card-lbl">Tahun Program</div>
                </div>
                <div class="about-card about-card-wide">
                    <div class="card-lbl">Didanai Oleh</div>
                    <p>Jendral Ladesh — Ngawi Barat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Footer ─── -->
    <footer>
        <span class="footer-logo">🍜 Festival Kuliner Ngawi</span>
        <p class="footer-tagline">Membawa cita rasa Ngawi Timur ke era digital bersama Jendral Ladesh</p>
        <div class="footer-links">
            <a href="#top">Beranda</a>
            <a href="#menu">Menu</a>
            <a href="#tentang">Tentang</a>
            <a href="<?php echo e(route('products.create')); ?>">Tambah Menu</a>
        </div>
        <div class="footer-divider"></div>
        <p class="footer-copy">&copy; 2026 Festival Kuliner Ngawi — Restoran Mas Jakobi. Semua hak dilindungi.</p>
    </footer>

    <script>
        // Scroll-reveal product cards
        const cards = document.querySelectorAll('.product-card');
        if (cards.length > 0) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, i) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('visible');
                            entry.target.style.transition = `transform 0.55s cubic-bezier(.21,1.02,.73,1) ${i * 0.08}s, opacity 0.55s ease ${i * 0.08}s, box-shadow 0.35s ease`;
                        }, 80);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08 });
            cards.forEach(c => observer.observe(c));
        }
    </script>
</body>
</html>
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Gery\Modul11-13\resources\views/welcome.blade.php ENDPATH**/ ?>