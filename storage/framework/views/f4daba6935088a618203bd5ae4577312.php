

<?php $__env->startSection('title', 'Kata Mutiara'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto animate-fadeIn">
    <!-- Header Section -->
    <div class="text-center mb-12 animate-fadeInUp">
        <div class="inline-block mb-4">
            <i class="fas fa-book-open text-6xl text-pink-500 animate-float"></i>
        </div>
        <h2 class="text-5xl font-bold gradient-text mb-3">Kata-Kata Mutiara</h2>
        <p class="text-gray-600 text-lg">Inspirasi untuk mencerahkan harimu</p>
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-20 h-1 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full"></div>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="glass rounded-2xl p-6 text-center card-hover">
            <i class="fas fa-quote-left text-4xl text-pink-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text"><?php echo e($kataMutiaras->count()); ?></p>
            <p class="text-gray-600">Kata Mutiara</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover">
            <i class="fas fa-users text-4xl text-blue-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text"><?php echo e($kataMutiaras->where('created_by', '!=', null)->pluck('created_by')->unique()->count()); ?></p>
            <p class="text-gray-600">Kontributor</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover">
            <i class="fas fa-star text-4xl text-yellow-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text">Eksklusif</p>
            <p class="text-gray-600">Hanya untuk kamu</p>
        </div>
    </div>

    <!-- Form Tambah Kata Mutiara -->
    <div class="glass rounded-3xl shadow-2xl p-8 mb-12 card-hover animate-fadeInUp relative overflow-hidden">
        <div class="absolute top-0 right-0 text-pink-100 text-9xl opacity-10">
            <i class="fas fa-pen-fancy"></i>
        </div>

        <div class="relative z-10">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold gradient-text">Tambah Kata Mutiara Baru</h3>
                    <p class="text-gray-500 text-sm">Bagikan inspirasi untuk semua orang</p>
                </div>
            </div>

            <form action="<?php echo e(route('mutiara.store')); ?>" method="POST" id="mutiaraForm">
                <?php echo csrf_field(); ?>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <i class="fas fa-quote-right text-pink-500"></i>
                        Kutipan / Quote
                    </label>
                    <textarea
                        name="quote"
                        id="quote"
                        placeholder="✍️ Tulis kata-kata mutiara yang menginspirasi..."
                        rows="4"
                        class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all resize-none text-lg <?php $__errorArgs = ['quote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        required
                        maxlength="500"
                    ><?php echo e(old('quote')); ?></textarea>
                    <div class="flex justify-between items-center mt-2">
                        <?php $__errorArgs = ['quote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-500"><?php echo e($message); ?></p>
                        <?php else: ?>
                        <p class="text-xs text-gray-400">Minimal 10 karakter</p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p id="quote-counter" class="text-xs text-gray-400">0 / 500</p>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <i class="fas fa-user-edit text-purple-500"></i>
                        Nama Penulis / Sumber
                    </label>
                    <input
                        type="text"
                        name="author"
                        id="author"
                        placeholder="Contoh: Albert Einstein, Anonim, Pepatah Bijak"
                        value="<?php echo e(old('author')); ?>"
                        class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition-all text-lg <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        required
                        maxlength="100"
                    />
                    <div class="flex justify-between items-center mt-2">
                        <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-500"><?php echo e($message); ?></p>
                        <?php else: ?>
                        <p class="text-xs text-gray-400">Minimal 3 karakter</p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p id="author-counter" class="text-xs text-gray-400">0 / 100</p>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-4 mb-6">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                        <div class="text-sm text-gray-600">
                            <p class="font-semibold mb-1">Tips Membuat Kata Mutiara:</p>
                            <ul class="list-disc list-inside text-xs space-y-1">
                                <li>Gunakan bahasa yang sederhana dan mudah dipahami</li>
                                <li>Pastikan kata-kata bersifat positif dan inspiratif</li>
                                <li>Cantumkan sumber yang jelas jika mengutip dari tokoh terkenal</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white py-4 rounded-2xl font-bold text-lg hover:from-pink-600 hover:via-purple-600 hover:to-blue-600 transition-all transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3"
                >
                    <i class="fas fa-paper-plane"></i>
                    Tambahkan Kata Mutiara
                    <i class="fas fa-sparkles animate-pulse-slow"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Filter & Sort -->
    <div class="flex justify-between items-center mb-6 animate-fadeInUp">
        <div class="flex items-center gap-3">
            <i class="fas fa-list text-2xl text-pink-500"></i>
            <h3 class="text-2xl font-bold text-gray-800">Semua Kata Mutiara</h3>
        </div>
        <div class="glass px-6 py-3 rounded-full">
            <span class="text-sm text-gray-600 font-semibold">✨ <?php echo e($kataMutiaras->count()); ?> quotes tersedia</span>
        </div>
    </div>

    <!-- Quotes Grid -->
    <div class="grid gap-8">
        <?php $__currentLoopData = $kataMutiaras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="glass rounded-3xl shadow-xl p-8 border-l-8 border-pink-500 card-hover animate-fadeInUp relative overflow-hidden group" style="animation-delay: <?php echo e($index * 0.05); ?>s;" id="quote-<?php echo e($item->id); ?>">
            <!-- Background decoration -->
            <div class="absolute top-0 right-0 text-pink-100 text-9xl opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="fas fa-quote-right"></i>
            </div>

            <!-- Edit Mode (Hidden by default) -->
            <form action="<?php echo e(route('mutiara.update', $item)); ?>" method="POST" id="edit-form-<?php echo e($item->id); ?>" class="hidden relative z-10">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Kutipan</label>
                    <textarea
                        name="quote"
                        rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-pink-500 transition-all resize-none"
                        required
                    ><?php echo e($item->quote); ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Penulis</label>
                    <input
                        type="text"
                        name="author"
                        value="<?php echo e($item->author); ?>"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 transition-all"
                        required
                    />
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-xl hover:bg-green-600 transition-all flex items-center gap-2">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="button" onclick="cancelEdit(<?php echo e($item->id); ?>)" class="bg-gray-400 text-white px-6 py-2 rounded-xl hover:bg-gray-500 transition-all flex items-center gap-2">
                        <i class="fas fa-times"></i> Batal
                    </button>
                </div>
            </form>

            <!-- Display Mode -->
            <div id="display-<?php echo e($item->id); ?>" class="relative z-10">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-start gap-4 flex-1">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-2xl text-gray-800 italic leading-relaxed font-serif mb-4 group-hover:text-pink-600 transition-colors">
                                "<?php echo e($item->quote); ?>"
                            </p>
                        </div>
                    </div>

                    <!-- Action buttons (hanya untuk owner) -->
                    <?php if($item->created_by && $item->isOwnedBy(session('username'))): ?>
                    <div class="flex gap-2 ml-4">
                        <button onclick="editQuote(<?php echo e($item->id); ?>)" class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl hover:bg-blue-200 transition-all flex items-center justify-center transform hover:scale-110">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="<?php echo e(route('mutiara.destroy', $item)); ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kata mutiara ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="w-10 h-10 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 transition-all flex items-center justify-center transform hover:scale-110">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="h-px flex-1 bg-gradient-to-r from-transparent to-pink-300"></div>
                    <div class="flex items-center gap-3 ml-4">
                        <div class="flex items-center gap-2 bg-gradient-to-r from-pink-100 to-purple-100 px-5 py-2 rounded-full">
                            <i class="fas fa-user-circle text-pink-500"></i>
                            <p class="font-bold text-gray-700"><?php echo e($item->author); ?></p>
                        </div>
                        <?php if($item->created_by): ?>
                        <div class="flex items-center gap-2 bg-blue-100 px-4 py-2 rounded-full">
                            <i class="fas fa-user-plus text-blue-600 text-sm"></i>
                            <p class="text-xs text-blue-600 font-semibold"><?php echo e($item->created_by); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Hover effect overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-pink-500/0 to-purple-500/0 group-hover:from-pink-500/5 group-hover:to-purple-500/5 transition-all pointer-events-none"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Bottom decoration -->
    <div class="text-center mt-16 animate-fadeInUp">
        <div class="inline-flex items-center gap-3 glass px-8 py-4 rounded-full">
            <i class="fas fa-heart text-pink-500 animate-pulse-slow"></i>
            <span class="text-gray-600 font-semibold">Semoga menginspirasi harimu</span>
            <i class="fas fa-heart text-pink-500 animate-pulse-slow"></i>
        </div>
    </div>
</div>

<script>
// Character counter for quote
const quoteInput = document.getElementById('quote');
const quoteCounter = document.getElementById('quote-counter');

if (quoteInput) {
    quoteInput.addEventListener('input', function() {
        const length = this.value.length;
        quoteCounter.textContent = `${length} / 500`;
        
        if (length >= 450) {
            quoteCounter.classList.add('text-red-500');
            quoteCounter.classList.remove('text-gray-400');
        } else {
            quoteCounter.classList.add('text-gray-400');
            quoteCounter.classList.remove('text-red-500');
        }
    });
}

// Character counter for author
const authorInput = document.getElementById('author');
const authorCounter = document.getElementById('author-counter');

if (authorInput) {
    authorInput.addEventListener('input', function() {
        const length = this.value.length;
        authorCounter.textContent = `${length} / 100`;
        
        if (length >= 90) {
            authorCounter.classList.add('text-red-500');
            authorCounter.classList.remove('text-gray-400');
        } else {
            authorCounter.classList.add('text-gray-400');
            authorCounter.classList.remove('text-red-500');
        }
    });
}

// Edit quote
function editQuote(id) {
    document.getElementById(`display-${id}`).classList.add('hidden');
    document.getElementById(`edit-form-${id}`).classList.remove('hidden');
}

// Cancel edit
function cancelEdit(id) {
    document.getElementById(`display-${id}`).classList.remove('hidden');
    document.getElementById(`edit-form-${id}`).classList.add('hidden');
}

// Auto-dismiss alerts
setTimeout(() => {
    const alerts = document.querySelectorAll('.alert-auto-dismiss');
    alerts.forEach(alert => {
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 300);
    });
}, 5000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\putri deviyanti\ceritakita\resources\views/kata-mutiara.blade.php ENDPATH**/ ?>