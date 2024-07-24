<h1> hello <?php echo e($user->name); ?></h1>

<div>
    <h1>You Created <?php echo e($post->title); ?> </h1>
    <p><?php echo e($post->body); ?></p>
    <img width="300" src="<?php echo e($message->embed('storage/'.$post->image)); ?>" alt="">
</div>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/emails/welcome.blade.php ENDPATH**/ ?>