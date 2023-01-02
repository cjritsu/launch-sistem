<div class="form-group">
    <?php echo e(Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <?php if(auth()->user()->HasRole('Admin')): ?>
        <div class="col-md-4">
        <?php echo e(Form::select('user_id', $user_id, $Pengajuan_Absen->user_id ?? old('user_id'), ['class'=>'form-control'])); ?>

        </div>
    <?php else: ?>
        <div class="col-md-4">
            <?php echo e(Form::text('user_id', $Pengajuan_Absen->user_id ?? $user, ['readonly','class'=>'form-control', 'hidden'])); ?>

            <?php echo Form::text('user_name', auth()->user()->name, ['readonly', 'class' => 'form-control']); ?>

        </div>
    <?php endif; ?>
</div>
<div class="form-group">
    <?php echo e(Form::label('unit_kerja', 'Unit Kerja &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php if(auth()->user()->HasRole('Admin')): ?>
            <?php echo e(Form::select('unit_kerja', $unit_kerja, $Pengajuan_Absen->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control'])); ?>

        <?php else: ?>
            <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(Form::text('unit_kerja', $Pengajuan_Absen->unit_kerja_id ?? $karyawans->unit_kerja_id, ['readonly','class'=>'form-control', 'hidden'])); ?>

                <?php echo Form::text('unit', $karyawans->Unit_Kerja->name, ['readonly', 'class' => 'form-control']); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <div class="form-group col-md-2">
        <?php echo e(Form::label('tanggal_mulai', 'Tanggal Tidak Masuk Kerja &nbsp;', ['class'=>'control-label'])); ?>

        <?php echo e(Form::date('tanggal_absen_awal', $Pengajuan_Absen->tanggal_absen_awal ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

    </div>
    <div class="form-group col-md-2">
        <?php echo e(Form::label('tanggal_akhir', '&nbsp;', ['class'=>'control-label'])); ?>

        <?php echo e(Form::date('tanggal_absen_akhir', $Pengajuan_Absen->tanggal_absen_akhir ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <div class="form-group col-md-2">
        <?php echo e(Form::label('tanggal_berita', 'Pemberitahuan Tidak Masuk &nbsp;', ['class'=>'control-label'])); ?>

        <?php echo e(Form::date('tanggal_berita', $Pengajuan_Absen->tanggal_berita ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

        <?php if($errors->has('tanggal_berita')): ?>
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong><?php echo e($errors->first('tanggal_berita')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-2">
        <?php echo e(Form::label('kepada_id', 'Kepada/Melalui &nbsp;', ['class'=>'control-label'])); ?>

        <?php echo Form::text('kepada_id', $Pengajuan_Absen->tinggalin_absen ?? null, ['placeholder'=>'Nama Orang','class'=>'form-control']); ?>

    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo e(Form::date('tanggal_masuk', $Pengajuan_Absen->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control'])); ?>

        <?php if($errors->has('tanggal_masuk')): ?>
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong><?php echo e($errors->first('tanggal_masuk')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('keterangan', 'Alasan Tidak Masuk &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4">
        <?php echo Form::textarea('keterangan', $Pengajuan_Absen->keterangan ?? null, ['placeholder'=>'Sakit','class'=>'form-control']); ?>

    </div>
</div>
<div class="form-group">
    <?php echo e(Form::label('surat_dokter', 'Jika Sakit, Surat Dokter &nbsp;', ['class'=>'control-label col-md-2'])); ?>

    <div class="col-md-4" onchange="showHide()">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="surat_dokter" id="radio_ada" value="Tersedia Surat Dokter">
            <label class="form-check-label" for="radio_ada">Ada</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="surat_dokter" id="radio_tdkada" value="Tidak Ada Surat Dokter">
            <label class="form-check-label" for="radio_tidakada">Tidak Ada</label>
        </div>
    </div>
    <div class="custom-file col-md-4" style="margin-left: 15px; display: none;" id="surat_bukti">
        <?php echo Form::file('surat_bukti', ['class' => 'custom-file-input', 'id' => 'customFile']); ?>

        <?php echo Form::label('customFile', 'Lampirkan Surat Dokter', ['class' => 'custom-file-label']); ?>

    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo e(Form::submit('Save Data',['class'=>'btn btn-success'])); ?>

    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function showHide() {
            var surat_ada = document.getElementById('radio_ada');
            var bukti = document.getElementById('surat_bukti');
            if (surat_ada.checked == true) {
                bukti.style.display='block';
            }
            else {
                bukti.style.display='none';
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_absen/form.blade.php ENDPATH**/ ?>