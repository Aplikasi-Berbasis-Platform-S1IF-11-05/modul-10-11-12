<?php echo csrf_field(); ?>
<div class="space-y-5">
    <div>
        <label class="block text-sm mb-1 font-semibold">Nama Produk</label>
        <input type="text" name="name" value="<?php echo e(old('name', $product->name ?? '')); ?>" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-xs text-red-600 mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label class="block text-sm mb-1 font-semibold">Kategori</label>
        <select name="category_id" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php if(old('category_id', $product->category_id ?? '') == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label class="block text-sm mb-1 font-semibold">Harga</label>
            <input type="number" name="price" step="0.01" value="<?php echo e(old('price', $product->price ?? '')); ?>" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-xs text-red-600 mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block text-sm mb-1 font-semibold">Stok</label>
            <input type="number" name="stock" value="<?php echo e(old('stock', $product->stock ?? 0)); ?>" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
            <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-xs text-red-600 mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div>
        <label class="block text-sm mb-1 font-semibold">Deskripsi</label>
        <div class="rounded-xl border border-slate-300 dark:border-slate-600 overflow-hidden">
            <div class="flex gap-2 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 p-2">
                <button type="button" data-editor-command="bold" class="rounded-md border border-slate-300 dark:border-slate-600 px-2 py-1 text-xs">Bold</button>
                <button type="button" data-editor-command="insertUnorderedList" class="rounded-md border border-slate-300 dark:border-slate-600 px-2 py-1 text-xs">Bullet</button>
            </div>
            <div id="description-editor" contenteditable="true" class="min-h-36 bg-white dark:bg-slate-900 p-3 text-sm leading-relaxed"><?php echo old('description', $product->description ?? ''); ?></div>
        </div>
        <textarea id="description-input" name="description" rows="4" class="hidden"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-xs text-red-600 mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label class="block text-sm mb-1 font-semibold">Gambar Produk</label>
        <input id="image-input" type="file" name="image" accept="image/*" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
        <div class="mt-3">
            <img
                id="image-preview"
                src="<?php echo e(isset($product) && $product->image ? asset('storage/' . $product->image) : ''); ?>"
                alt="Preview gambar produk"
                class="h-36 w-full max-w-xs rounded-xl border border-slate-200 object-cover <?php echo e(isset($product) && $product->image ? '' : 'hidden'); ?>"
            >
            <p id="image-placeholder" class="text-xs text-slate-500 mt-2 <?php echo e(isset($product) && $product->image ? 'hidden' : ''); ?>">
                Preview gambar akan muncul di sini.
            </p>
        </div>
    </div>

    <label class="inline-flex items-center gap-2 text-sm">
        <input type="checkbox" name="is_published" value="1" <?php if(old('is_published', $product->is_published ?? true)): echo 'checked'; endif; ?>>
        Tampilkan di halaman depan
    </label>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700"><?php echo e($submitLabel); ?></button>
</div>

<script>
    (() => {
        const form = document.currentScript.closest('form');
        const descriptionEditor = form.querySelector('#description-editor');
        const descriptionInput = form.querySelector('#description-input');
        const imageInput = form.querySelector('#image-input');
        const imagePreview = form.querySelector('#image-preview');
        const imagePlaceholder = form.querySelector('#image-placeholder');

        form.querySelectorAll('[data-editor-command]').forEach((button) => {
            button.addEventListener('click', () => {
                document.execCommand(button.dataset.editorCommand, false, null);
                descriptionEditor.focus();
            });
        });

        form.addEventListener('submit', () => {
            descriptionInput.value = descriptionEditor.innerHTML.trim();
        });

        imageInput?.addEventListener('change', (event) => {
            const file = event.target.files?.[0];
            if (!file) {
                return;
            }

            const reader = new FileReader();
            reader.onload = ({ target }) => {
                imagePreview.src = target.result;
                imagePreview.classList.remove('hidden');
                imagePlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    })();
</script>
<?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/admin/products/_form.blade.php ENDPATH**/ ?>