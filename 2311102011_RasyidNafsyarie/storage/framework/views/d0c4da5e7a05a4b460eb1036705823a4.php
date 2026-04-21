<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Beranda — <?php echo e(config('app.name')); ?></title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-amber-50 text-stone-900 min-h-screen flex flex-col">
    <header class="sticky top-0 z-40 border-b border-amber-200/80 bg-amber-50/95 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 shrink-0">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-600 text-white text-sm font-bold">FK</span>
                    <span class="font-semibold text-stone-900 hidden sm:inline">Festival Kuliner</span>
                </a>
                <nav class="flex flex-wrap items-center gap-1 sm:gap-4 text-sm font-medium">
                    <a href="<?php echo e(route('home')); ?>" class="px-2 py-1 rounded-md <?php echo e(request()->routeIs('home') ? 'text-amber-800 bg-amber-100' : 'text-stone-700 hover:text-amber-800'); ?>">Beranda</a>
                    <a href="<?php echo e(route('products.index')); ?>" class="px-2 py-1 rounded-md <?php echo e(request()->routeIs('products.*') ? 'text-amber-800 bg-amber-100' : 'text-stone-700 hover:text-amber-800'); ?>">Katalog</a>
                    <a href="<?php echo e(route('about')); ?>" class="px-2 py-1 rounded-md <?php echo e(request()->routeIs('about') ? 'text-amber-800 bg-amber-100' : 'text-stone-700 hover:text-amber-800'); ?>">Tentang</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-1">
        <section class="relative overflow-hidden bg-gradient-to-br from-amber-600 via-amber-700 to-orange-900 text-white">
            <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
                <p class="text-amber-100 text-sm font-medium tracking-wide uppercase">Ngawi Timur × Ngawi Barat</p>
                <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-bold max-w-3xl leading-tight">Festival Kuliner — cita rasa dari dapur Mas Jakobi</h1>
                <p class="mt-4 text-lg text-amber-100 max-w-2xl">Rayakan festival makanan dengan menu pilihan restoran kami. Data produk disimpan aman di sistem database kami.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center rounded-lg bg-white px-5 py-2.5 text-amber-900 font-semibold shadow hover:bg-amber-50">Lihat katalog</a>
                    <a href="<?php echo e(route('about')); ?>" class="inline-flex items-center rounded-lg border border-white/40 px-5 py-2.5 font-semibold hover:bg-white/10">Cerita festival</a>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-stone-900">Menu pilihan</h2>
                    <p class="mt-1 text-stone-600">Harga, deskripsi, dan informasi lain diambil langsung dari database.</p>
                </div>
                <a href="<?php echo e(route('products.index')); ?>" class="text-amber-800 font-semibold hover:underline">Semua produk →</a>
            </div>

            <?php if($products->isEmpty()): ?>
                <p class="mt-10 text-stone-600">Belum ada produk. Harap tunggu pembaharuan selanjutnya.</p>
            <?php else: ?>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="group rounded-2xl border border-amber-100 bg-white shadow-sm overflow-hidden hover:shadow-md transition">
                            <div class="aspect-[4/3] bg-amber-100 relative">
                                <?php if($product->image_url): ?>
                                    <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover group-hover:scale-[1.02] transition" loading="lazy">
                                <?php else: ?>
                                    <div class="flex h-full w-full items-center justify-center text-amber-700/50 text-sm font-medium">Tanpa gambar</div>
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <p class="text-xs font-medium text-amber-700"><?php echo e($product->category->name); ?></p>
                                <h3 class="mt-1 font-semibold text-stone-900 group-hover:text-amber-800"><?php echo e($product->name); ?></h3>
                                <p class="mt-2 text-sm text-stone-600 line-clamp-2"><?php echo e($product->description); ?></p>
                                <p class="mt-3 font-bold text-amber-900">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer class="bg-stone-900 text-amber-50/90 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-sm">
            <p class="font-semibold text-amber-200"><?php echo e(config('app.name')); ?></p>
            <p class="mt-2 max-w-2xl">Program digitalisasi kuliner Ngawi Timur — kolaborasi restoran Mas Jakobi dengan dukungan dari Ngawi Barat.</p>
            <p class="mt-6 text-stone-500">&copy; <?php echo e(date('Y')); ?> Praktikum ABP Modul 11–13.</p>
        </div>
    </footer>
</body>
</html>
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Modul11-13\2311102011_RasyidNafsyarie\resources\views/home.blade.php ENDPATH**/ ?>