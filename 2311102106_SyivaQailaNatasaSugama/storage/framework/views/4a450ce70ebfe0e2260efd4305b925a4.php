<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
    <section class="card">
        <h1 style="margin-top: 0;">Tambah Produk Baru</h1>
        <p class="help">Isi data produk yang akan tampil di festival makanan.</p>

        <form action="<?php echo e(route('products.store')); ?>" method="POST">
            <?php echo $__env->make('products._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Kayla\Modul11-13\resources\views/products/create.blade.php ENDPATH**/ ?>