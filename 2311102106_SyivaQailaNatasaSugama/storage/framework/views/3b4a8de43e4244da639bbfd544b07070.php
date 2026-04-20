<?php echo csrf_field(); ?>

<div class="grid cols-2">
    <div class="field">
        <label for="name">Nama Produk</label>
        <input id="name" type="text" name="name" value="<?php echo e(old('name', $product->name ?? '')); ?>" required>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="field">
        <label for="category">Kategori</label>
        <input id="category" type="text" name="category" value="<?php echo e(old('category', $product->category ?? 'Menu Utama')); ?>" required>
        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="grid cols-2">
    <div class="field">
        <label for="price">Harga (Rp)</label>
        <input id="price" type="number" step="0.01" min="0" name="price" value="<?php echo e(old('price', $product->price ?? '')); ?>" required>
        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="field">
        <label for="image_url">URL Gambar (opsional)</label>
        <input id="image_url" type="url" name="image_url" value="<?php echo e(old('image_url', $product->image_url ?? '')); ?>" placeholder="https://...">
        <?php $__errorArgs = ['image_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="field">
    <label for="description">Deskripsi Produk</label>
    <textarea id="description" name="description" required><?php echo e(old('description', $product->description ?? '')); ?></textarea>
    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="field">
    <label>
        <input type="checkbox" name="is_available" value="1" <?php echo e(old('is_available', $product->is_available ?? true) ? 'checked' : ''); ?>>
        Produk tersedia untuk ditampilkan di halaman depan
    </label>
</div>

<div class="nav">
    <button type="submit" class="btn primary">Simpan Produk</button>
    <a class="btn" href="<?php echo e(route('products.index')); ?>">Batal</a>
</div>
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Kayla\Modul11-13\resources\views/products/_form.blade.php ENDPATH**/ ?>