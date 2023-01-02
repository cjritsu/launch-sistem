<div class="form-group">
    <?php echo e(Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <?php if(auth()->user()->HasRole('Admin')): ?>
        <div class="col-md-4">
        <?php echo e(Form::select('user_id', $user_id, $SuratIzin->user_id ?? old('user_id'), ['class'=>'form-control'])); ?>

        </div>
    <?php else: ?>
        <div class="col-md-4">
            <?php echo e(Form::text('user_id', $SuratIzin->user_id ?? $user, ['readonly','class'=>'form-control', 'hidden'])); ?>

            <?php echo Form::text('user_name', auth()->user()->name, ['readonly', 'class' => 'form-control']); ?>

        </div>
    <?php endif; ?>
</div>
<div class="form-group">
    <?php echo e(Form::label('unit_kerja', 'Unit Kerja &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php if(auth()->user()->HasRole('Admin')): ?>
            <?php echo e(Form::select('unit_kerja', $unit_kerja, $SuratIzin->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control'])); ?>

        <?php else: ?>
            <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(Form::text('unit_kerja', $SuratIzin->unit_kerja_id ?? $karyawans->unit_kerja_id, ['readonly','class'=>'form-control', 'hidden'])); ?>

                <?php echo Form::text('unit', $karyawans->Unit_Kerja->name, ['readonly', 'class' => 'form-control']); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('jenis_izin', 'Jenis Izin &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::select('jenis_izin_id', $jenis_izin_id, $SuratIzin->jenis_izin_id ?? old('jenis_izin_id'), ['class'=>'form-control'])); ?>

        <?php if($errors->has('jenis_izin_id')): ?>
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong><?php echo e($errors->first('jenis_izin_id')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <div class="form-group col-md-2">
        <?php echo e(Form::label('tanggal_mulai', 'Tanggal Izin &nbsp;', ['class'=>'control-label'])); ?>

        <?php echo e(Form::date('tanggal_izin_awal', $SuratIzin->tanggal_izin_awal ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

        <?php if($errors->has('tanggal_izin_awal')): ?>
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong><?php echo e($errors->first('tanggal_izin_awal')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-2">
        <?php echo e(Form::label('tanggal_akhir', '&nbsp;', ['class'=>'control-label'])); ?>

        <?php echo e(Form::date('tanggal_izin_akhir', $SuratIzin->tanggal_izin_akhir ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

        <?php if($errors->has('tanggal_izin_akhir')): ?>
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong><?php echo e($errors->first('tanggal_izin_akhir')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::date('tanggal_masuk', $SuratIzin->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

        <?php if($errors->has('tanggal_masuk')): ?>
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong><?php echo e($errors->first('tanggal_masuk')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

</div>
<div class="form-group">
    <?php echo e(Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo Form::textarea('keterangan', $SuratIzin->keterangan ?? null, ['placeholder'=>'Training','class'=>'form-control']); ?>

    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo e(Form::submit('Save Data',['class'=>'btn btn-success'])); ?>

    </div>
</div>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_izin/form.blade.php ENDPATH**/ ?>