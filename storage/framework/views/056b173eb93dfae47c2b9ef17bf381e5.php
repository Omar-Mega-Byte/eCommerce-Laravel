<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['post']));

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

foreach (array_filter((['post']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="bg-white shadow-md rounded-lg mb-6 transition-transform transform hover:scale-105 hover:shadow-lg px-6 py-4">
    <h3 class="text-xl font-semibold text-gray-900 font-sans"><?php echo e($post->title); ?></h3>
    <div class="text-xs text-gray-500 mb-4 font-roboto">
        <span>Posted <?php echo e($post->created_at->diffForHumans()); ?> by </span>
        <a class="text-blue-600 hover:underline" href="<?php echo e(Route('posts.users',$post->user)); ?>"><?php echo e($post->user->name); ?></a>
    </div>
    <p class="text-gray-600 font-roboto"><?php echo e(Str::words($post->body, 20, '...')); ?></p>
</div>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/components/postCard.blade.php ENDPATH**/ ?>