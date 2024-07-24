<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['post', 'full' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['post', 'full' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<!-- Post Card -->
<div class="relative bg-white p-6 rounded-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden break-words">
    <!-- Post Content Wrapper -->
    <div class="rounded-xl mb-8 px-6 py-10 bg-white overflow-hidden break-words">
        <!-- Cover Photo -->
        <div class="overflow-hidden">
            <?php if($post->image): ?>
                <img class="rounded-lg mb-6 w-full h-64 object-cover" src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>">
            <?php else: ?>
                <img class="rounded-lg mb-6 w-full h-64 object-cover" src="<?php echo e(asset('storage/posts_images/No image.jpg')); ?>" alt="<?php echo e($post->title); ?>">
            <?php endif; ?>
        </div>
        <!-- Post Title -->
        <h3 class="text-2xl font-bold text-gray-900 font-varelaRound""><?php echo e($post->title); ?></h3>
        <!-- Post Metadata -->
        <div class="text-xs text-gray-500 mb-4 font-pacifico">
            <span class="font-shadowsIntoLight">Posted <?php echo e($post->created_at->diffForHumans()); ?> by </span>
            <a class="text-blue-700 hover:underline" href="<?php echo e(route('posts.users', $post->user)); ?>"><?php echo e($post->user->name); ?></a>
        </div>
        <!-- Post Body -->
        <?php if($full): ?>
            <div>
                <span class="text-gray-700 font-arvo"><?php echo e($post->body); ?></span>
            </div>
        <?php else: ?>
            <div>
                <span class="text-gray-700 font-poppins"><?php echo e(Str::words($post->body, 20)); ?></span>
                <a class="text-blue-400 hover:underline font-workSans" href="<?php echo e(route('posts.show', $post)); ?>">Read more &rarr;</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Slot for additional content -->
    <div class="absolute bottom-4 right-4">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/components/postCard.blade.php ENDPATH**/ ?>