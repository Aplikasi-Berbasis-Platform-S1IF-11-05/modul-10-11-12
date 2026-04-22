<?php $__env->startSection('content'); ?>
    <section id="beranda" class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-indigo-900 to-fuchsia-900 p-8 text-white shadow-soft md:p-12">
        <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/20 blur-2xl"></div>
        <div class="absolute -bottom-8 left-14 h-32 w-32 rounded-full bg-cyan-300/30 blur-2xl"></div>

        <p class="text-xs uppercase tracking-[0.25em] text-slate-200">Ngawi Food Celebration</p>
        <h1 class="mt-3 max-w-2xl text-3xl font-extrabold leading-tight md:text-5xl">
            Festival Makanan Restoran Mas Jakobi
        </h1>
        <p class="mt-4 max-w-2xl text-slate-200">
            Jelajahi menu andalan, lihat detail produk, dan temukan cita rasa terbaik dari restoran Mas Jakobi.
        </p>
        <div class="mt-6 inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-medium backdrop-blur">
            <?php echo e($products->count()); ?> produk siap ditampilkan
        </div>
    </section>

    <div id="katalog" class="mt-8 mb-6 flex items-end justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Menu Unggulan</h2>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">Tampilan katalog modern untuk kebutuhan promosi festival.</p>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="h-52 w-full object-cover transition duration-500 group-hover:scale-105">
                <?php else: ?>
                    <div class="flex h-52 items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-sm text-slate-500">
                        Gambar produk belum tersedia
                    </div>
                <?php endif; ?>
                <div class="p-5">
                    <p class="inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                        <?php echo e($product->category->name); ?>

                    </p>
                    <h2 class="mt-3 text-xl font-bold text-slate-900"><?php echo e($product->name); ?></h2>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600"><?php echo e(\Illuminate\Support\Str::limit($product->description, 95)); ?></p>
                    <div class="mt-5 flex items-center justify-between">
                        <span class="text-lg font-extrabold text-emerald-700">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
                        <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="inline-flex items-center rounded-full border border-slate-200 px-3 py-1.5 text-sm font-semibold text-slate-700 hover:border-indigo-300 hover:text-indigo-700">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 rounded-2xl border border-slate-200 bg-white p-6 text-slate-600 shadow-soft">
                Belum ada produk yang ditampilkan.
            </div>
        <?php endif; ?>
    </div>

    <section id="jadwal" class="mt-12 rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-soft backdrop-blur md:p-8 dark:border-slate-700 dark:bg-slate-800/80">
        <h3 class="text-2xl font-bold">Jadwal Festival</h3>
        <p class="mt-2 text-slate-600 dark:text-slate-300">Informasi waktu acara agar pengunjung tidak ketinggalan momen kuliner.</p>
        <div class="mt-5 rounded-2xl border border-indigo-200 bg-indigo-50 p-4 dark:border-indigo-500/40 dark:bg-indigo-500/10">
            <p class="text-xs uppercase tracking-wider text-indigo-700 dark:text-indigo-300">Hitungan Mundur Menuju Puncak Festival</p>
            <div class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-4" id="festival-countdown">
                <div class="rounded-xl bg-white p-3 text-center dark:bg-slate-700/60">
                    <p class="text-2xl font-extrabold text-slate-900 dark:text-white" data-unit="days">00</p>
                    <p class="text-xs text-slate-500 dark:text-slate-300">Hari</p>
                </div>
                <div class="rounded-xl bg-white p-3 text-center dark:bg-slate-700/60">
                    <p class="text-2xl font-extrabold text-slate-900 dark:text-white" data-unit="hours">00</p>
                    <p class="text-xs text-slate-500 dark:text-slate-300">Jam</p>
                </div>
                <div class="rounded-xl bg-white p-3 text-center dark:bg-slate-700/60">
                    <p class="text-2xl font-extrabold text-slate-900 dark:text-white" data-unit="minutes">00</p>
                    <p class="text-xs text-slate-500 dark:text-slate-300">Menit</p>
                </div>
                <div class="rounded-xl bg-white p-3 text-center dark:bg-slate-700/60">
                    <p class="text-2xl font-extrabold text-slate-900 dark:text-white" data-unit="seconds">00</p>
                    <p class="text-xs text-slate-500 dark:text-slate-300">Detik</p>
                </div>
            </div>
            <p class="mt-3 text-xs text-slate-500 dark:text-slate-300">Target waktu: 29 April 2026, 16.00 WIB</p>
        </div>
        <div class="mt-6 grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-700/50">
                <p class="text-xs uppercase text-slate-500 dark:text-slate-300">Hari Pembukaan</p>
                <p class="mt-1 font-bold">Senin, 27 April 2026</p>
                <p class="text-sm text-slate-600 dark:text-slate-300">10.00 - 21.00 WIB</p>
            </div>
            <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-700/50">
                <p class="text-xs uppercase text-slate-500 dark:text-slate-300">Puncak Festival</p>
                <p class="mt-1 font-bold">Rabu, 29 April 2026</p>
                <p class="text-sm text-slate-600 dark:text-slate-300">16.00 - 22.00 WIB</p>
            </div>
            <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-700/50">
                <p class="text-xs uppercase text-slate-500 dark:text-slate-300">Penutupan</p>
                <p class="mt-1 font-bold">Minggu, 3 Mei 2026</p>
                <p class="text-sm text-slate-600 dark:text-slate-300">11.00 - 20.00 WIB</p>
            </div>
        </div>
    </section>

    <section id="tentang" class="mt-8 rounded-3xl border border-indigo-200 bg-gradient-to-r from-indigo-600 to-fuchsia-600 p-6 text-white shadow-soft md:p-8">
        <div class="grid items-center gap-6 md:grid-cols-2">
            <div>
                <h3 class="text-2xl font-bold">Tentang Kami</h3>
                <p class="mt-3 max-w-3xl leading-relaxed text-indigo-50">
                    Festival ini adalah kolaborasi Restoran Mas Jakobi di Ngawi Timur dengan dukungan Jendral Ladesh dari Ngawi Barat untuk mendorong digitalisasi UMKM kuliner dan memperluas lapangan pekerjaan. Melalui website ini, pengunjung bisa melihat produk, harga, serta informasi menu secara cepat dari mana saja.
                </p>
            </div>
            <div>
                <img
                    src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1200&q=80"
                    alt="Suasana restoran untuk festival makanan"
                    class="h-64 w-full rounded-2xl border border-white/30 object-cover shadow-lg"
                    loading="lazy"
                >
            </div>
        </div>
    </section>

    <footer class="mt-12 overflow-hidden rounded-3xl bg-slate-900 text-slate-200">
        <div class="grid gap-8 px-6 py-10 md:grid-cols-3 md:px-8">
            <div>
                <h4 class="text-lg font-bold text-white">Festival Makanan Jakobi</h4>
                <p class="mt-3 text-sm leading-relaxed text-slate-300">
                    Event kuliner kolaborasi Jakobi x Ladesh untuk mendukung digitalisasi UMKM makanan di Ngawi.
                </p>
            </div>
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-white">Navigasi</h4>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><a href="#beranda" class="hover:text-white">Beranda</a></li>
                    <li><a href="#katalog" class="hover:text-white">Katalog Produk</a></li>
                    <li><a href="#jadwal" class="hover:text-white">Jadwal Festival</a></li>
                    <li><a href="#tentang" class="hover:text-white">Tentang Kami</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-white">Kontak</h4>
                <ul class="mt-3 space-y-2 text-sm text-slate-300">
                    <li>Email: info@festivaljakobi.id</li>
                    <li>Telepon: +62 812-3456-7890</li>
                    <li>Instagram: @festivalmakananngawi</li>
                    <li>Lokasi: Ngawi Timur, Jawa Timur</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-700 px-6 py-4 text-center text-xs text-slate-400 md:px-8">
            © <?php echo e(now()->year); ?> Festival Makanan Jakobi x Ladesh. All rights reserved.
        </div>
    </footer>

    <script>
        (() => {
            const countdownContainer = document.getElementById('festival-countdown');
            if (!countdownContainer) {
                return;
            }

            const targetDate = new Date('2026-04-29T16:00:00+07:00').getTime();
            const units = {
                days: countdownContainer.querySelector('[data-unit="days"]'),
                hours: countdownContainer.querySelector('[data-unit="hours"]'),
                minutes: countdownContainer.querySelector('[data-unit="minutes"]'),
                seconds: countdownContainer.querySelector('[data-unit="seconds"]'),
            };

            const renderCountdown = () => {
                const now = Date.now();
                let diff = Math.max(0, targetDate - now);

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                diff -= days * 1000 * 60 * 60 * 24;
                const hours = Math.floor(diff / (1000 * 60 * 60));
                diff -= hours * 1000 * 60 * 60;
                const minutes = Math.floor(diff / (1000 * 60));
                diff -= minutes * 1000 * 60;
                const seconds = Math.floor(diff / 1000);

                units.days.textContent = String(days).padStart(2, '0');
                units.hours.textContent = String(hours).padStart(2, '0');
                units.minutes.textContent = String(minutes).padStart(2, '0');
                units.seconds.textContent = String(seconds).padStart(2, '0');
            };

            renderCountdown();
            setInterval(renderCountdown, 1000);
        })();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\smt 6\ABP\Praktikum\uts\resources\views/products/index.blade.php ENDPATH**/ ?>