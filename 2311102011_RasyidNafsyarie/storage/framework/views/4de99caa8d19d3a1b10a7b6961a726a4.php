<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Katalog — <?php echo e(config('app.name')); ?></title>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h1 class="text-3xl font-bold text-stone-900">Katalog produk</h1>
            <p class="mt-2 text-stone-600">Filter berdasarkan kategori atau jelajahi semua hidangan Mas Jakobi.</p>

            <form method="get" action="<?php echo e(route('products.index')); ?>" class="mt-8 flex flex-wrap items-end gap-4">
                <div>
                    <label for="kategori" class="block text-sm font-medium text-stone-700">Kategori</label>
                    <select name="kategori" id="kategori" class="mt-1 rounded-lg border-amber-200 shadow-sm focus:border-amber-500 focus:ring-amber-500 text-stone-900">
                        <option value="">Semua</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->slug); ?>" <?php if(request('kategori') === $cat->slug): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="rounded-lg bg-amber-600 px-4 py-2 text-white font-medium hover:bg-amber-700">Terapkan</button>
                <?php if(request('kategori')): ?>
                    <a href="<?php echo e(route('products.index')); ?>" class="text-sm text-amber-800 underline">Reset</a>
                <?php endif; ?>
            </form>

            <?php if($products->isEmpty()): ?>
                <p class="mt-12 text-stone-600">Tidak ada produk untuk filter ini.</p>
            <?php else: ?>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="group rounded-2xl border border-amber-100 bg-white shadow-sm overflow-hidden hover:shadow-md transition">
                            <div class="aspect-[4/3] bg-amber-100">
                                <?php if($product->image_url): ?>
                                    <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover" loading="lazy">
                                <?php else: ?>
                                    <div class="flex h-full w-full items-center justify-center text-amber-700/50 text-sm">Tanpa gambar</div>
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <p class="text-xs font-medium text-amber-700"><?php echo e($product->category->name); ?></p>
                                <h2 class="mt-1 text-lg font-semibold text-stone-900"><?php echo e($product->name); ?></h2>
                                <p class="mt-2 text-sm text-stone-600 line-clamp-2"><?php echo e($product->description); ?></p>
                                <p class="mt-3 font-bold text-amber-900">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-10">
                    <?php echo e($products->links()); ?>

                </div>
            <?php endif; ?>
        </div>
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
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Modul11-13\2311102011_RasyidNafsyarie\resources\views/products/index.blade.php ENDPATH**/ ?>