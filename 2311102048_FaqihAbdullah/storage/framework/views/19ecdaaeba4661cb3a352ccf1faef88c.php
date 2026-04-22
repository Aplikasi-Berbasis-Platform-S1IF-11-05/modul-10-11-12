<?php $__env->startSection('content'); ?>
    <div class="flex flex-col gap-3 sm:flex-row sm:justify-between sm:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Manajemen Produk</h1>
            <p class="text-sm text-slate-500 dark:text-slate-300">Kelola katalog festival langsung dari dashboard.</p>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="inline-flex justify-center bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700">Tambah Produk</a>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white/90 dark:border-slate-700 dark:bg-slate-800/80 shadow-soft overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 dark:bg-slate-900/70">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-left">Stok</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t border-slate-100 dark:border-slate-700">
                        <td class="p-3"><?php echo e($product->name); ?></td>
                        <td class="p-3"><?php echo e($product->category->name); ?></td>
                        <td class="p-3">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                        <td class="p-3"><?php echo e($product->stock); ?></td>
                        <td class="p-3">
                            <span class="rounded-full px-2 py-1 text-xs font-semibold <?php echo e($product->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'); ?>">
                                <?php echo e($product->is_published ? 'Tampil' : 'Draft'); ?>

                            </span>
                        </td>
                        <td class="p-3 space-x-2">
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="text-indigo-600 font-semibold">Edit</a>
                            <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-rose-600 font-semibold" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="p-3" colspan="6">Belum ada produk.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($products->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/admin/products/index.blade.php ENDPATH**/ ?>