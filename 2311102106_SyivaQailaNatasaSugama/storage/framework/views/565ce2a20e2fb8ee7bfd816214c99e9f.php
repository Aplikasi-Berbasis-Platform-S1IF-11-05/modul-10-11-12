<?php $__env->startSection('title', 'Kelola Produk'); ?>

<?php $__env->startSection('content'); ?>
    <section class="card">
        <div class="topbar" style="margin-bottom: 10px;">
            <div>
                <h1 style="margin: 0 0 6px;">Kelola Produk Restoran</h1>
                <p class="help" style="margin: 0;">Data ini dipakai untuk halaman depan Festival Kuliner.</p>
            </div>
            <a class="btn primary" href="<?php echo e(route('products.create')); ?>">Tambah Produk</a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <strong><?php echo e($product->name); ?></strong>
                            <div class="help"><?php echo e(\Illuminate\Support\Str::limit($product->description, 80)); ?></div>
                        </td>
                        <td><?php echo e($product->category); ?></td>
                        <td>Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                        <td><?php echo e($product->is_available ? 'Tampil' : 'Disembunyikan'); ?></td>
                        <td>
                            <a class="btn" href="<?php echo e(route('products.edit', $product)); ?>">Edit</a>
                            <form class="inline-form" action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="help">Belum ada produk. Tambahkan produk pertama Anda.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 14px;">
            <?php echo e($products->links()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Kayla\Modul11-13\resources\views/products/index.blade.php ENDPATH**/ ?>