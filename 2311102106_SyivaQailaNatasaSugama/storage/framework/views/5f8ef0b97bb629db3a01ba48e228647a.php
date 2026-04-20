<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>
    <section class="card">
        <h1 style="margin-top: 0;">Edit Produk</h1>
        <p class="help">Perbarui data produk agar informasi di halaman depan selalu akurat.</p>

        <form action="<?php echo e(route('products.update', $product)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('products._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Kayla\Modul11-13\resources\views/products/edit.blade.php ENDPATH**/ ?>