<?php $__env->startSection('content'); ?>
    <div class="max-w-3xl border border-slate-200 dark:border-slate-700 bg-white/90 dark:bg-slate-800/80 rounded-2xl shadow-soft p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>
        <form action="<?php echo e(route('admin.products.update', $product)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.products._form', ['submitLabel' => 'Update Produk'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>