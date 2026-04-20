<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rayakan Festival Makanan Ngawi dengan produk terbaik dari Restoran Mas Jakobi. Temukan kelezatan autentik Ngawi di sini.">
    <meta name="keywords" content="Ngawi Food Festival, Mas Jakobi, Kuliner Ngawi, Pecel Ngawi, Makanan Tradisional">
    <title>Ngawi Food Festival - Mas Jakobi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --primary: #f53003;
            --primary-light: #ff6a00;
            --secondary: #1b1b18;
            --accent: #f8b803;
            --bg-light: #fdfdfc;
            --bg-dark: #0a0a0a;
            --card-bg: rgba(255, 255, 255, 0.8);
            --card-bg-dark: rgba(22, 22, 21, 0.8);
            --text-light: #1b1b18;
            --text-dark: #ededec;
            --glass: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: var(--bg-dark);
                color: var(--text-dark);
            }
            .glass-card {
                background: var(--card-bg-dark);
                border-color: #3e3e3a;
            }
            .navbar {
                background: rgba(10, 10, 10, 0.8);
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-light);
            line-height: 1.6;
            overflow-x: hidden;
            transition: background-color 0.3s ease;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 90vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            overflow: hidden;
            padding: 2rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
            opacity: 0.2;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -2px;
            line-height: 1;
            text-transform: uppercase;
        }

        .hero p {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2.5rem;
            background-color: white;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            background-color: var(--accent);
            color: white;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background: rgba(253, 253, 252, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--glass-border);
        }

        .brand {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: inherit;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        /* Products Grid */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 6rem 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid #f0f0f0;
            position: relative;
        }

        .product-card:hover {
            transform: scale(1.03);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-info {
            padding: 2rem;
        }

        .product-category {
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: block;
        }

        .product-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .product-description {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f0f0f0;
            padding-top: 1.5rem;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--secondary);
        }

        .buy-btn {
            background: var(--primary);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }

        .buy-btn:hover {
            background: var(--secondary);
        }

        /* Dark mode overrides for cards */
        @media (prefers-color-scheme: dark) {
            .product-card {
                background: #161615;
                border-color: #3e3e3a;
            }
            .product-description {
                color: #a1a09a;
            }
            .product-price {
                color: white;
            }
            .product-footer {
                border-top-color: #3e3e3a;
            }
        }

        /* Footer */
        footer {
            background: var(--secondary);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .footer-logo {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--primary);
            display: block;
        }

        .footer-text {
            opacity: 0.7;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .social-links a {
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--primary);
        }

        .copyright {
            font-size: 0.8rem;
            opacity: 0.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 { font-size: 3rem; }
            .hero p { font-size: 1.2rem; }
            .navbar { padding: 1rem 2rem; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="brand">NGWI FOOD FEST</a>
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#products">Menu</a>
            <a href="#about">Tentang Kami</a>
            <a href="<?php echo e(route('products.create')); ?>" style="color: var(--primary); font-weight: 700;">+ Tambah Menu</a>
        </div>
    </nav>

    <header class="hero" id="home">
        <?php if(session('success')): ?>
        <div style="position: fixed; top: 100px; right: 20px; background: #4CAF50; color: white; padding: 1rem 2rem; border-radius: 12px; z-index: 2000; box-shadow: 0 10px 20px rgba(0,0,0,0.1); animation: slideIn 0.5s ease-out;">
            <?php echo e(session('success')); ?>

        </div>
        <style>
            @keyframes slideIn { from { transform: translateX(100%); } to { transform: translateX(0); } }
        </style>
        <script>
            setTimeout(() => { document.currentScript.previousElementSibling.previousElementSibling.remove(); }, 5000);
        </script>
        <?php endif; ?>
        <div class="hero-content">
            <h1>Festival Makanan Ngawi</h1>
            <p>Rayakan kelezatan autentik dari Restoran Mas Jakobi. Didukung oleh Jendral Ladesh untuk digitalisasi Ngawi.</p>
            <a href="#products" class="cta-button">Lihat Menu Spesial</a>
        </div>
    </header>

    <section class="container" id="products">
        <div class="section-title">
            <h2>Menu Unggulan</h2>
            <p>Pilihan terbaik dari dapur Mas Jakobi untuk memanjakan lidah Anda.</p>
            <div style="margin-top: 2rem;">
                <a href="<?php echo e(route('products.create')); ?>" class="cta-button" style="background: var(--secondary); color: white; padding: 0.8rem 1.5rem; font-size: 1rem;">+ Tambah Produk Baru</a>
            </div>
        </div>

        <div class="product-grid">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card">
                <img src="<?php echo e(asset('images/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="product-image">
                <div class="product-info">
                    <span class="product-category"><?php echo e($product->category); ?></span>
                    <h3 class="product-name"><?php echo e($product->name); ?></h3>
                    <p class="product-description"><?php echo e($product->description); ?></p>
                    <div class="product-footer">
                        <span class="product-price">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
                        <a href="#" class="buy-btn">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section class="container" id="about" style="background: #f7f7f7; border-radius: 50px; margin-bottom: 6rem;">
        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 4rem;">
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-size: 3rem; font-weight: 800; color: var(--secondary); margin-bottom: 1.5rem;">Digitalisasi Ngawi</h2>
                <p style="font-size: 1.2rem; color: #555; margin-bottom: 2rem;">
                    Inisiatif ini merupakan bagian dari program kerja Ngawi Barat untuk menciptakan 19.000 lapangan pekerjaan baru. Melalui digitalisasi restoran Mas Jakobi, kami membawa kearifan lokal ke kancah global.
                </p>
                <p style="font-weight: 600; color: var(--primary);">Didanai oleh Jendral Ladesh</p>
            </div>
            <div style="flex: 1; min-width: 300px; display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div style="background: white; padding: 2rem; border-radius: 24px; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
                    <h4 style="font-size: 2rem; color: var(--primary);">19K</h4>
                    <p style="font-size: 0.8rem; font-weight: 600; color: #888;">LAPANGAN KERJA</p>
                </div>
                <div style="background: white; padding: 2rem; border-radius: 24px; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
                    <h4 style="font-size: 2rem; color: var(--primary);">100%</h4>
                    <p style="font-size: 0.8rem; font-weight: 600; color: #888;">BAHAN LOKAL</p>
                </div>
                <div style="grid-column: span 2; background: var(--primary); color: white; padding: 2rem; border-radius: 24px; text-align: center;">
                    <p style="font-style: italic; font-size: 1.1rem;">"Kita majukan Ngawi bersama melalui teknologi."</p>
                    <p style="margin-top: 1rem; font-weight: 700;">- Mas Jakobi</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <span class="footer-logo">NGWI FOOD FEST</span>
        <p class="footer-text">Membawa cita rasa Ngawi Timur ke dunia digital melalui inovasi dan tradisi.</p>
        <div class="social-links">
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
            <a href="#">Facebook</a>
        </div>
        <p class="copyright">&copy; 2026 Ngawi Food Festival. All rights reserved by Mas Jakobi.</p>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.product-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease-out';
            observer.observe(card);
        });
    </script>
</body>
</html>
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Wildan\Modul11-13\resources\views/welcome.blade.php ENDPATH**/ ?>