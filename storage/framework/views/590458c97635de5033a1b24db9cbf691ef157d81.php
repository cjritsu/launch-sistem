<?php echo e(link_to('', 'Delete', ['class'=>'btn btn-danger', 'onclick'=>"event.preventDefault();document.getElementById('delete-form-$id').submit();"])); ?>

<form id="delete-form-<?php echo e($id); ?>" action="<?php echo e($route); ?>" method="POST" style="display: none;">
    <?php echo method_field('DELETE'); ?>
    <?php echo csrf_field(); ?>
</form>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/partials/delete_form.blade.php ENDPATH**/ ?>