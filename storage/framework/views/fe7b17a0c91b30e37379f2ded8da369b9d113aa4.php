<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(Session::has('error_message')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(Session::get('error_message')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/validation_error.blade.php ENDPATH**/ ?>