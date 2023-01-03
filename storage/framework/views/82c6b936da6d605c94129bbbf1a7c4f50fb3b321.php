<div class="card-body ">
    <form>
        <div class="input-group<?php echo e($errors->has('nip') ? ' has-danger' : ''); ?> col-md-4">
            <input name="nip" type="text" class="form-control" placeholder="NIP" required value="<?php echo e(old('nip')); ?>" required autofocus>
            <?php if($errors->has('nip')): ?>
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong><?php echo e($errors->first('nip')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="input-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?> col-md-4">
            <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo e(old('name')); ?>">
            <?php if($errors->has('name')): ?>
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="input-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?> col-md-4">
            <input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>">
            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="input-group col-md-4">
            <?php echo Form::select('unit_kerja_id', $unit_kerja, $karyawan->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control']); ?>

        </div>
        <div class="input-group col-md-4">
            <?php echo Form::select('jabatan_id', $jabatan, $karyawan->jabatan_id ?? old('jabatan_id'), ['class'=>'form-control jabatan_id']); ?>

        </div>
        <div class="input-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?> col-md-4">
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="input-group col-md-4">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation" required>
            <?php if($errors->has('password_confirmation')): ?>
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="input-group col-md-4">
            <?php echo Form::select('status_karyawan_id', $status_karyawan, $karyawan->status_karyawan ?? old('status_karyawan'), ['class'=>'form-control']); ?>

        </div>
        <div class="input-group col-md-4">
            <?php echo Form::select('roles_id', $roles, $user->roles ?? old('roles'), ['class'=>'form-control']); ?>

        </div>
        <div class="form-check text-left">
            <label class="form-check-label">
                <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox">
                <span class="form-check-sign"></span>
                    <?php echo e(__('I agree to the')); ?>

                <a href="#something"><?php echo e(__('terms and conditions')); ?></a>.
            </label>
            <?php if($errors->has('agree_terms_and_conditions')): ?>
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong><?php echo e($errors->first('agree_terms_and_conditions')); ?></strong>
                </span>
            <?php endif; ?>
            <div class="card-footer col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-round"><?php echo e(__('Save')); ?></button>
            </div>
        </div>
    </form>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $(".jabatan_id").select2({
                width: 'resolve'
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/users/form.blade.php ENDPATH**/ ?>