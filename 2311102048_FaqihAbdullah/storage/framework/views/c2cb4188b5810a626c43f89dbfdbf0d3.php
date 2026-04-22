<?php $__env->startSection('content'); ?>
    <div class="max-w-md mx-auto border border-slate-200 dark:border-slate-700 bg-white/90 dark:bg-slate-800/80 shadow-soft rounded-2xl p-6">
        <h1 class="text-2xl font-bold mb-6">Login Admin</h1>

        <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label for="email" class="block text-sm mb-1">Email</label>
                <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
                <?php $__errorArgs = ['email'];
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
                <label for="password" class="block text-sm mb-1">Password</label>
                <input id="password" name="password" type="password" class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-800 rounded-xl px-3 py-2">
            </div>

            <label class="inline-flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-xl font-semibold hover:bg-indigo-700">Masuk</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>