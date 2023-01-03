<div class="form-group">
    <?php echo e(Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <?php if(auth()->user()->HasRole('Admin')): ?>
        <div class="col-md-4">
        <?php echo e(Form::select('user_id', $user_id, $Pengajuan_cuti->user_id ?? old('user_id'), ['class'=>'form-control'])); ?>

        </div>
    <?php else: ?>
        <div class="col-md-4">
            <?php echo e(Form::text('user_id', $Pengajuan_cuti->user_id ?? $user, ['readonly','class'=>'form-control', 'hidden'])); ?>

            <?php echo Form::text('user_name', auth()->user()->name, ['readonly', 'class' => 'form-control']); ?>

        </div>
    <?php endif; ?>
</div>
<div class="form-group">
    <?php echo e(Form::label('unit_kerja', 'Unit Kerja &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php if(auth()->user()->HasRole('Admin')): ?>
            <?php echo e(Form::select('unit_kerja', $unit_kerja, $Pengajuan_cuti->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control'])); ?>

        <?php else: ?>
            <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(Form::text('unit_kerja', $Pengajuan_cuti->unit_kerja_id ?? $karyawans->unit_kerja_id, ['hidden', 'readonly','class'=>'form-control'])); ?>

                <?php echo Form::text('unit', $karyawans->Unit_Kerja->name, ['readonly', 'class' => 'form-control']); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('jenis_cuti', 'Jenis Cuti &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::select('jenis_cuti_id', $jenis_cuti_id, $Pengajuan_cuti->jenis_cuti_id ?? old('jenis_cuti_id'), ['class'=>'form-control'])); ?>

    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('tanggal_mulai', 'Tanggal Mulai &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::date('tanggal_mulai', $Pengajuan_Cuti->tanggal_mulai ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('tanggal_akhir', 'Tanggal Selesai &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::date('tanggal_akhir', $Pengajuan_Cuti->tanggal_akhir ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::date('tanggal_masuk', $Pengajuan_Cuti->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::textarea('keterangan', $Pengajuan_Cuti->keterangan ?? null, ['placeholder'=>'Training','class'=>'form-control'])); ?>

    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('validasi-kp')): ?>
        <div class="form-group col-md-2">
            <?php echo e(Form::label('status_kp', 'Validasi Kepala Unit &nbsp;', ['class'=>'control-label'])); ?>

            <?php echo Form::select('status_kp', $status_id, $pengajuan_cuti->status_kp ?? old('status_kp'), ['class'=>'form-control']); ?>

        </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('validasi-hrd')): ?>
        <div class="form-group col-md-2">
            <?php echo e(Form::label('status_hrd', 'Validasi HRD &nbsp;', ['class'=>'control-label'])); ?>

            <?php echo Form::select('status_hrd', $status_id, $pengajuan_cuti->status_hrd ?? old('status_hrd'), ['class'=>'form-control']); ?>


        </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('validasi-rek')): ?>
        <div class="form-group col-md-2">
            <?php echo e(Form::label('status_rek', 'Validasi Rektorat &nbsp;', ['class'=>'control-label'])); ?>

            <?php echo Form::select('status_rek', $status_id, $pengajuan_cuti->status_rek ?? old('status_rek'), ['class'=>'form-control']); ?>

        </div>
    <?php endif; ?>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo e(Form::submit('Save Data',['class'=>'btn btn-success'])); ?>

    </div>
</div>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_cuti/form.blade.php ENDPATH**/ ?>