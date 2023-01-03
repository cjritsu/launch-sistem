<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('password_status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('password_status')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?php echo e(asset('paper/img/damir-bosnjak.jpg')); ?>" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="<?php echo e(asset('paper/img/default-avatar.png')); ?>" alt="...">
                                <h5 class="title"><?php echo e(__($karyawans->User->name)); ?></h5>
                            </a>
                        </div>
                            <div class="descriptiion text-center">
                                <a href="<?php echo e(route('karyawan.index')); ?>" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Return</a>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 text-center">
                <form class="col-md-12" action="<?php echo e(route('karyawan.edit', $karyawans->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title"><?php echo e(__('Edit Profile')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('NIP')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo e($karyawans->User->nip); ?>">
                                    </div>
                                    <?php if($errors->has('nip')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('nip')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Name')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e($karyawans->User->name); ?>">
                                    </div>
                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Email')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e($karyawans->User->email); ?>">
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Agama')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?php echo e($karyawans->agama); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Tempat, Tanggal Lahir')); ?></label>
                                <div class="form-row col-md-9">
                                    <div class="col-md-4">
                                        <input type="text" name="tmpt_l" class="form-control" placeholder="Tempat Lahir" value="<?php echo e($karyawans->tempat_lahir); ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="date" name="tgl_l" class="form-control" placeholder="Tanggal Lahir" value="<?php echo e($karyawans->tanggal_lahir); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('No. Telepon')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="no_hp" class="form-control" placeholder="No.Telp/No.HP" value="<?php echo e($karyawans->no_telp); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Alamat')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo e($karyawans->alamat); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Unit Kerja')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?php echo e(Form::select('unit_kerja_id', $unit_kerja_id, $karyawans->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control'])); ?>


                                        <?php if($errors->has('unit_kerja_id')): ?>
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong><?php echo e($errors->first('unit_kerja_id')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Jabatan')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?php echo Form::select('jabatan_id', $jabatan_id, $karyawans->jabatan_id ?? old('jabatan_id'), ['class'=>'form-control jabatan_id']); ?>


                                        <?php if($errors->has('jabatan_id')): ?>
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Jatah Cuti')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="jatah_cuti" class="form-control" placeholder="Jatah Cuti" value="<?php echo e($user->jatah_cuti); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Status Karyawan')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?php echo e(Form::select('status_karyawan', $status_karyawan, $karyawans->status_karyawan_id ?? old('status_karyawan'), ['class'=>'form-control'])); ?>


                                        <?php if($errors->has('status_karyawan')): ?>
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong><?php echo e($errors->first('status_karyawan')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="col-md-12" action="<?php echo e(route('profile.password')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title"><?php echo e(__('Change Password')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Old Password')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    <?php if($errors->has('old_password')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('old_password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('New Password')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Password Confirmation')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $(".jabatan_id").select2({
                width: 'resolve'
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/karyawan/edit.blade.php ENDPATH**/ ?>