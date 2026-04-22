<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Festival Makanan'); ?></title>
    <script>
        if (localStorage.getItem('festival-dark-mode') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui'],
                    },
                    boxShadow: {
                        soft: '0 10px 40px rgba(2, 6, 23, 0.08)',
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased dark:bg-slate-900 dark:text-slate-100">
    <?php
        $isAdminArea = request()->routeIs('admin.*');
    ?>
    <div class="fixed inset-0 -z-10">
        <div class="absolute -top-16 left-10 h-44 w-44 rounded-full bg-fuchsia-200/50 blur-3xl"></div>
        <div class="absolute top-28 right-10 h-56 w-56 rounded-full bg-cyan-200/50 blur-3xl"></div>
    </div>

    <nav class="sticky top-0 z-20 border-b border-slate-200/70 bg-white/60 backdrop-blur-md dark:border-slate-700 dark:bg-slate-900/60">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="<?php echo e(route('home')); ?>" class="text-lg font-extrabold tracking-tight">
                Festival Makanan Jakobi
            </a>
            <button id="menu-toggle" class="md:hidden inline-flex items-center justify-center rounded-lg border border-slate-300 dark:border-slate-600 px-3 py-2 text-sm">
                Menu
            </button>

            <div class="hidden md:flex items-center gap-6">
                <?php if (! ($isAdminArea)): ?>
                    <a href="<?php echo e(route('home')); ?>#beranda" class="relative text-sm font-semibold text-slate-700 hover:text-indigo-700 dark:text-slate-200 dark:hover:text-indigo-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-0 after:bg-indigo-600 after:transition-all hover:after:w-full">Beranda</a>
                    <a href="<?php echo e(route('home')); ?>#katalog" class="relative text-sm font-semibold text-slate-700 hover:text-indigo-700 dark:text-slate-200 dark:hover:text-indigo-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-0 after:bg-indigo-600 after:transition-all hover:after:w-full">Katalog Produk</a>
                    <a href="<?php echo e(route('home')); ?>#jadwal" class="relative text-sm font-semibold text-slate-700 hover:text-indigo-700 dark:text-slate-200 dark:hover:text-indigo-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-0 after:bg-indigo-600 after:transition-all hover:after:w-full">Jadwal Festival</a>
                    <a href="<?php echo e(route('home')); ?>#tentang" class="relative text-sm font-semibold text-slate-700 hover:text-indigo-700 dark:text-slate-200 dark:hover:text-indigo-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-0 after:bg-indigo-600 after:transition-all hover:after:w-full">Tentang Kami</a>
                <?php endif; ?>
                <button id="dark-mode-toggle" type="button" class="rounded-full border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-indigo-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">
                    Dark Mode
                </button>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Dashboard</a>
                    <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-sm font-semibold text-rose-600 hover:text-rose-700">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('admin.login')); ?>" class="inline-flex items-center rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Login Admin</a>
                <?php endif; ?>
            </div>
        </div>

        <div id="mobile-menu" class="hidden border-t border-slate-200/70 dark:border-slate-700 px-4 py-4 md:hidden space-y-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md">
            <?php if (! ($isAdminArea)): ?>
                <a href="<?php echo e(route('home')); ?>#beranda" class="block text-sm font-semibold">Beranda</a>
                <a href="<?php echo e(route('home')); ?>#katalog" class="block text-sm font-semibold">Katalog Produk</a>
                <a href="<?php echo e(route('home')); ?>#jadwal" class="block text-sm font-semibold">Jadwal Festival</a>
                <a href="<?php echo e(route('home')); ?>#tentang" class="block text-sm font-semibold">Tentang Kami</a>
            <?php endif; ?>
            <button id="dark-mode-toggle-mobile" type="button" class="rounded-full border border-slate-300 dark:border-slate-600 px-3 py-1.5 text-xs font-semibold">
                Dark Mode
            </button>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8 md:py-10">
        <?php if(session('success')): ?>
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700 shadow-soft">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script>
        const desktopDarkModeButton = document.getElementById('dark-mode-toggle');
        const mobileDarkModeButton = document.getElementById('dark-mode-toggle-mobile');

        const syncDarkModeButtonLabel = () => {
            const label = document.documentElement.classList.contains('dark') ? 'Light Mode' : 'Dark Mode';
            if (desktopDarkModeButton) {
                desktopDarkModeButton.textContent = label;
            }
            if (mobileDarkModeButton) {
                mobileDarkModeButton.textContent = label;
            }
        };

        const toggleDarkMode = () => {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('festival-dark-mode', isDark ? 'true' : 'false');
            syncDarkModeButtonLabel();
        };

        desktopDarkModeButton?.addEventListener('click', toggleDarkMode);
        mobileDarkModeButton?.addEventListener('click', toggleDarkMode);
        syncDarkModeButtonLabel();

        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle?.addEventListener('click', () => {
            mobileMenu?.classList.toggle('hidden');
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/layouts/app.blade.php ENDPATH**/ ?>