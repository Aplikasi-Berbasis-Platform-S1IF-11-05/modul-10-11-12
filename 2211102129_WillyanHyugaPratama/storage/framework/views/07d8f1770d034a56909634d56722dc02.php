<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Festival Makanan Ngawi Timur</title>
        <style>
            :root {
                color-scheme: light;
                --bg: #f7f2ea;
                --surface: rgba(255, 255, 255, 0.82);
                --ink: #1f2937;
                --muted: #5b6472;
                --brand: #b45309;
                --brand-strong: #78350f;
                --accent: #f59e0b;
                --line: rgba(120, 53, 15, 0.12);
                --shadow: 0 24px 70px rgba(120, 53, 15, 0.14);
            }

            * { box-sizing: border-box; }
            html { scroll-behavior: smooth; }
            body {
                margin: 0;
                font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                color: var(--ink);
                background:
                    radial-gradient(circle at top left, rgba(245, 158, 11, 0.16), transparent 32%),
                    radial-gradient(circle at 85% 10%, rgba(180, 83, 9, 0.16), transparent 26%),
                    linear-gradient(180deg, #fffaf3 0%, var(--bg) 100%);
            }

            a { color: inherit; text-decoration: none; }
            .wrap { width: min(1180px, calc(100% - 32px)); margin: 0 auto; }
            .shell { padding: 28px 0 56px; }
            .topbar {
                display: flex;
                justify-content: space-between;
                gap: 16px;
                align-items: center;
                padding: 16px 20px;
                border: 1px solid var(--line);
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(16px);
                border-radius: 22px;
                box-shadow: 0 10px 40px rgba(120, 53, 15, 0.08);
            }

            .brand {
                display: flex;
                align-items: center;
                gap: 12px;
                font-weight: 800;
                letter-spacing: 0.02em;
            }

            .brand-mark {
                width: 44px;
                height: 44px;
                border-radius: 16px;
                display: grid;
                place-items: center;
                background: linear-gradient(135deg, var(--brand), var(--accent));
                color: white;
                box-shadow: 0 16px 30px rgba(180, 83, 9, 0.28);
            }

            .meta {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
                justify-content: flex-end;
                color: var(--muted);
                font-size: 0.92rem;
            }

            .hero {
                display: grid;
                grid-template-columns: 1.2fr 0.8fr;
                gap: 24px;
                margin-top: 24px;
                align-items: stretch;
            }

            .hero-card, .stats-card, .section-card {
                background: var(--surface);
                border: 1px solid var(--line);
                border-radius: 28px;
                box-shadow: var(--shadow);
                backdrop-filter: blur(18px);
            }

            .hero-card {
                padding: clamp(24px, 4vw, 48px);
                position: relative;
                overflow: hidden;
            }

            .hero-card::after {
                content: "";
                position: absolute;
                inset: auto -80px -120px auto;
                width: 280px;
                height: 280px;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(245, 158, 11, 0.26), transparent 70%);
                pointer-events: none;
            }

            .eyebrow {
                display: inline-flex;
                gap: 8px;
                align-items: center;
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(245, 158, 11, 0.12);
                color: var(--brand-strong);
                font-weight: 700;
                font-size: 0.88rem;
            }

            h1 {
                margin: 18px 0 14px;
                font-size: clamp(2.4rem, 5vw, 4.8rem);
                line-height: 0.98;
                letter-spacing: -0.05em;
                max-width: 11ch;
            }

            .lead {
                max-width: 62ch;
                font-size: 1.06rem;
                line-height: 1.8;
                color: var(--muted);
            }

            .cta-row {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
                margin-top: 28px;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                padding: 14px 18px;
                border-radius: 16px;
                font-weight: 700;
                border: 1px solid transparent;
                transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            }

            .btn:hover { transform: translateY(-1px); }
            .btn-primary {
                background: linear-gradient(135deg, var(--brand), var(--brand-strong));
                color: white;
                box-shadow: 0 18px 34px rgba(120, 53, 15, 0.24);
            }

            .btn-secondary {
                background: rgba(255, 255, 255, 0.78);
                color: var(--brand-strong);
                border-color: rgba(180, 83, 9, 0.18);
            }

            .stats-card {
                padding: 24px;
                display: grid;
                gap: 16px;
                align-content: start;
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .stat {
                padding: 18px;
                border-radius: 20px;
                background: linear-gradient(180deg, rgba(255,255,255,0.92), rgba(255,255,255,0.6));
                border: 1px solid rgba(120, 53, 15, 0.08);
            }

            .stat strong { display: block; font-size: 1.55rem; margin-bottom: 6px; }
            .stat span { color: var(--muted); font-size: 0.92rem; }

            .section { margin-top: 26px; }

            .section-head {
                display: flex;
                justify-content: space-between;
                align-items: end;
                gap: 12px;
                margin: 24px 0 14px;
            }

            .section-head h2 {
                margin: 0;
                font-size: clamp(1.5rem, 3vw, 2.2rem);
                letter-spacing: -0.03em;
            }

            .section-head p {
                margin: 0;
                color: var(--muted);
                max-width: 58ch;
                line-height: 1.6;
            }

            .product-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 18px;
            }

            .product-card {
                overflow: hidden;
                border-radius: 24px;
                border: 1px solid var(--line);
                background: rgba(255,255,255,0.84);
                box-shadow: 0 16px 40px rgba(120, 53, 15, 0.1);
            }

            .product-visual {
                min-height: 164px;
                padding: 20px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                background:
                    radial-gradient(circle at 20% 20%, rgba(255,255,255,0.44), transparent 28%),
                    linear-gradient(135deg, rgba(245, 158, 11, 0.92), rgba(180, 83, 9, 0.96));
                color: white;
            }

            .product-image {
                width: 100%;
                height: 170px;
                object-fit: cover;
                border-radius: 18px;
                margin-bottom: 14px;
                background: rgba(255, 255, 255, 0.14);
                box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.18);
            }

            .product-category {
                display: inline-flex;
                width: fit-content;
                padding: 7px 12px;
                border-radius: 999px;
                background: rgba(255,255,255,0.18);
                font-size: 0.84rem;
                font-weight: 700;
            }

            .product-name {
                margin: 0;
                font-size: 1.45rem;
                line-height: 1.05;
                letter-spacing: -0.03em;
                max-width: 12ch;
            }

            .product-body { padding: 18px 18px 20px; }

            .price-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                margin-bottom: 12px;
            }

            .price {
                font-size: 1.35rem;
                font-weight: 800;
                color: var(--brand-strong);
            }

            .badge {
                padding: 7px 10px;
                border-radius: 999px;
                background: rgba(245, 158, 11, 0.14);
                color: var(--brand-strong);
                font-size: 0.82rem;
                font-weight: 700;
            }

            .description {
                margin: 0;
                color: var(--muted);
                line-height: 1.7;
                min-height: 5.2em;
            }

            .product-foot {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                margin-top: 18px;
                padding-top: 16px;
                border-top: 1px solid rgba(120, 53, 15, 0.1);
                color: var(--muted);
                font-size: 0.92rem;
            }

            .feature-list {
                display: grid;
                gap: 12px;
            }

            .feature {
                display: flex;
                gap: 12px;
                align-items: start;
                padding: 14px 16px;
                border-radius: 18px;
                background: rgba(255,255,255,0.72);
                border: 1px solid rgba(120, 53, 15, 0.08);
            }

            .dot {
                width: 12px;
                height: 12px;
                margin-top: 6px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--brand), var(--accent));
                box-shadow: 0 0 0 5px rgba(245, 158, 11, 0.12);
                flex: none;
            }

            .feature strong { display: block; margin-bottom: 4px; }
            .feature span { color: var(--muted); line-height: 1.6; }

            .empty {
                padding: 34px;
                border-radius: 24px;
                border: 1px dashed rgba(120, 53, 15, 0.2);
                background: rgba(255,255,255,0.7);
                color: var(--muted);
            }

            @media (max-width: 980px) {
                .hero, .product-grid { grid-template-columns: 1fr; }
                .stats-grid { grid-template-columns: 1fr 1fr; }
            }

            @media (max-width: 640px) {
                .shell { padding-top: 14px; }
                .topbar, .section-head { flex-direction: column; align-items: start; }
                .meta { justify-content: start; }
                .stats-grid { grid-template-columns: 1fr; }
                .product-name { max-width: none; }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <div class="wrap">
                <header class="topbar">
                    <div class="brand">
                        <div class="brand-mark">FM</div>
                        <div>
                            <div>Festival Makanan Ngawi Timur</div>
                            <small style="color: var(--muted); font-weight: 600;">Katalog digital restoran Mas Jakobi</small>
                        </div>
                    </div>
                    <div class="meta">
                        <span>Produk aktif: <?php echo e($totalProducts); ?></span>
                        <span>Harga mulai: Rp<?php echo e(number_format($startingPrice ?? 0, 0, ',', '.')); ?></span>
                        <span>MySQL ready</span>
                    </div>
                </header>

                <section class="hero">
                    <article class="hero-card">
                        <span class="eyebrow">Digitalisasi festival kuliner</span>
                        <h1>Merayakan rasa restoran Mas Jakobi dalam satu halaman.</h1>
                        <p class="lead">
                            Website ini menampilkan produk restoran sebagai etalase festival makanan. Semua data produk disimpan di database MySQL, sehingga menu bisa dikelola dan ditampilkan langsung dari sumber data yang sama.
                        </p>
                        <div class="cta-row">
                            <a class="btn btn-primary" href="#menu">Lihat menu festival</a>
                            <a class="btn btn-secondary" href="#unggulan">Menu unggulan</a>
                        </div>
                    </article>

                    <aside class="stats-card">
                        <div>
                            <span class="eyebrow" style="font-size: 0.8rem;">Ringkasan data</span>
                            <h2 style="margin: 12px 0 0; font-size: 1.8rem; letter-spacing: -0.03em;">Struktur sederhana, siap dikembangkan.</h2>
                        </div>
                        <div class="stats-grid">
                            <div class="stat">
                                <strong><?php echo e($totalProducts); ?></strong>
                                <span>produk aktif tersimpan di MySQL</span>
                            </div>
                            <div class="stat">
                                <strong><?php echo e($featuredProducts->count()); ?></strong>
                                <span>produk unggulan untuk halaman depan</span>
                            </div>
                            <div class="stat">
                                <strong>Laravel</strong>
                                <span>framework utama aplikasi</span>
                            </div>
                            <div class="stat">
                                <strong>MySQL</strong>
                                <span>database untuk penyimpanan data</span>
                            </div>
                        </div>
                        <div class="feature-list">
                            <div class="feature">
                                <div class="dot"></div>
                                <div>
                                    <strong>Data dinamis</strong>
                                    <span>Produk diambil dari tabel products, bukan hardcode di view.</span>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="dot"></div>
                                <div>
                                    <strong>Tampilan responsif</strong>
                                    <span>Layout tetap nyaman dibuka di layar desktop maupun ponsel.</span>
                                </div>
                            </div>
                        </div>
                    </aside>
                </section>

                <section id="unggulan" class="section">
                    <div class="section-head">
                        <div>
                            <h2>Menu unggulan festival</h2>
                            <p>Deretan produk pilihan yang ditonjolkan di halaman depan untuk memudahkan pengunjung melihat menu paling penting terlebih dahulu.</p>
                        </div>
                    </div>

                    <?php if($featuredProducts->isNotEmpty()): ?>
                        <div class="product-grid">
                            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="product-card">
                                    <div class="product-visual">
                                        <?php if($product->image_url): ?>
                                            <img class="product-image" src="<?php echo e(asset($product->image_url)); ?>" alt="<?php echo e($product->name); ?>">
                                        <?php endif; ?>
                                        <span class="product-category"><?php echo e($product->category); ?></span>
                                        <h3 class="product-name"><?php echo e($product->name); ?></h3>
                                    </div>
                                    <div class="product-body">
                                        <div class="price-row">
                                            <div class="price">Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></div>
                                            <?php if($product->badge): ?>
                                                <span class="badge"><?php echo e($product->badge); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="description"><?php echo e($product->description); ?></p>
                                        <div class="product-foot">
                                            <span>Slug: <?php echo e($product->slug); ?></span>
                                            <span>Ditampilkan di depan</span>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="empty">Belum ada produk unggulan yang ditandai di database.</div>
                    <?php endif; ?>
                </section>

                <section id="menu" class="section">
                    <div class="section-head">
                        <div>
                            <h2>Seluruh produk restoran</h2>
                            <p>Semua menu aktif yang tersimpan di database ditampilkan di sini, lengkap dengan harga, deskripsi, kategori, dan label tambahan.</p>
                        </div>
                    </div>

                    <?php if($products->isNotEmpty()): ?>
                        <div class="product-grid">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="product-card">
                                    <div class="product-visual" style="background: linear-gradient(135deg, rgba(180, 83, 9, 0.94), rgba(120, 53, 15, 0.96));">
                                        <?php if($product->image_url): ?>
                                            <img class="product-image" src="<?php echo e(asset($product->image_url)); ?>" alt="<?php echo e($product->name); ?>">
                                        <?php endif; ?>
                                        <span class="product-category"><?php echo e($product->category); ?></span>
                                        <h3 class="product-name"><?php echo e($product->name); ?></h3>
                                    </div>
                                    <div class="product-body">
                                        <div class="price-row">
                                            <div class="price">Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></div>
                                            <?php if($product->badge): ?>
                                                <span class="badge"><?php echo e($product->badge); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="description"><?php echo e($product->description); ?></p>
                                        <div class="product-foot">
                                            <span><?php echo e($product->featured ? 'Produk unggulan' : 'Menu reguler'); ?></span>
                                            <span><?php echo e($product->updated_at?->diffForHumans() ?? 'Baru diperbarui'); ?></span>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="empty">Tidak ada produk aktif yang ditemukan di tabel products.</div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </body>
</html>
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Willy\Modul11-13\resources\views/festival/index.blade.php ENDPATH**/ ?>