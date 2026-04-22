<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:border-indigo-300 hover:text-indigo-700">
        &larr; Kembali ke daftar menu
    </a>

    <section class="mt-5 grid gap-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-soft md:grid-cols-2 md:p-8">
        <div class="overflow-hidden rounded-2xl border border-slate-100 bg-slate-50">
            <?php if($product->image): ?>
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="h-full min-h-[320px] w-full object-cover">
            <?php else: ?>
                <div class="flex min-h-[320px] items-center justify-center text-sm text-slate-500">
                    Gambar produk belum tersedia
                </div>
            <?php endif; ?>
        </div>

        <div class="flex flex-col">
            <p class="inline-flex w-fit rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700"><?php echo e($product->category->name); ?></p>
            <h1 class="mt-3 text-3xl font-extrabold leading-tight text-slate-900"><?php echo e($product->name); ?></h1>
            <p class="mt-3 text-2xl font-bold text-emerald-700">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
            <p class="mt-4 leading-relaxed text-slate-600"><?php echo e($product->description); ?></p>

            <div class="mt-6 rounded-2xl bg-slate-50 p-4">
                <p class="text-xs uppercase tracking-wide text-slate-500">Ketersediaan</p>
                <p class="mt-1 text-sm font-semibold text-slate-700">Stok tersedia: <?php echo e($product->stock); ?></p>
            </div>
        </div>
    </section>

    <section class="mt-6 rounded-2xl border border-slate-200 bg-gradient-to-r from-indigo-600 to-fuchsia-600 px-6 py-5 text-white shadow-soft">
        <p class="text-sm font-semibold uppercase tracking-wider">Festival Promo</p>
        <p class="mt-1 text-lg font-bold">Produk ini bisa ditampilkan sebagai menu unggulan festival minggu depan.</p>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/products/show.blade.php ENDPATH**/ ?>