<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">UBD/SDM/FM-015-<?php echo e($Pengajuan_Absen->id); ?></h5>
                        <p class="card-category">Keterangan Formulir Tidak Masuk Kerja</p>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('surat_absen.index')); ?>" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="places-buttons">
                            <div class="row">
                                <div class="col-md-6 ml-auto mr-auto text-center">
                                    <h4 class="card-title">
                                        VALIDATION
                                        <p class="category">Klik Tombol Detail Untuk Melihat Kelengkapan Formulir</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SuratDetail">
                                            Details
                                        </button>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-surat')): ?>
                                            <?php if(auth()->user()->HasRole('Staff') && $Pengajuan_Absen->status_kp != '1'): ?>

                                            <?php elseif($Pengajuan_Absen->status_kp == 3 || $Pengajuan_Absen->status_hrd == 3 || $Pengajuan_Absen->status_rek == 3): ?>

                                            <?php else: ?>
                                            <a href="<?php echo e($Pengajuan_Absen->id); ?>/edit" type="button" class="btn btn-success">Edit</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th></th>
                                            <th scope="col">Wakil Rektor II</th>
                                            <th scope="col">Kepala Biro SDM</th>
                                            <th scope="col">Pimpinan Unit</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <td>
                                                <?php if($Pengajuan_Absen->status_rek == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($Pengajuan_Absen->status_rek == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastRek->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                            <td>
                                                <?php if($Pengajuan_Absen->status_hrd == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($Pengajuan_Absen->status_hrd == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastHRD->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                            <td>
                                                <?php if($Pengajuan_Absen->status_kp == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($Pengajuan_Absen->status_kp == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastKP->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="SuratDetail" tabindex="-1" role="dialog" aria-labelledby="JudulDetail" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="JudulDetail">Surat Izin - UBD/SDM/FM-015-<?php echo e($Pengajuan_Absen->id); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <?php $__currentLoopData = $pengajuanAbsen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Pengajuan_Absens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th>NIP</th>
                                <td colspan="3">
                                    <?php echo e($Pengajuan_Absens->User->nip); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td colspan="3">
                                    <?php echo e($Pengajuan_Absens->User->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Unit</th>
                                <td colspan="3">
                                    <?php echo e($Pengajuan_Absens->Unit_Kerja->name); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th>Bagian</th>
                                <td colspan="3">
                                    <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($karyawans->Departemen->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Tidak Masuk Kerja</th>
                                <td colspan="3">
                                    <?php echo e(\Carbon\Carbon::parse($Pengajuan_Absen->tanggal_absen_awal)->isoFormat('D MMMM Y')); ?> <?php echo e(' sampai '); ?> <?php echo e(\Carbon\Carbon::parse($Pengajuan_Absen->tanggal_absen_akhir)->isoFormat('D MMMM Y')); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Pemberitahuan Tidak Masuk</th>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($Pengajuan_Absen->tanggal_berita)->isoFormat('D MMMM Y')); ?>

                                </td>
                                <th>Kepada/Melalui</th>
                                <td>
                                    <?php echo e($Pengajuan_Absen->tinggalin_absen); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk Kembali</th>
                                <td colspan="3">
                                    <?php echo e(\Carbon\Carbon::parse($Pengajuan_Absen->tanggal_masuk)->isoFormat('D MMMM Y')); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Alasan</th>
                                <td colspan="3">
                                    <?php echo e($Pengajuan_Absen->keterangan); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Jika Sakit, Surat Dokter</th>
                                <?php if($Pengajuan_Absen->image !== null): ?>
                                    <td colspan="3">
                                        <a href="<?php echo e(asset('surat_bukti/' . $Pengajuan_Absen->User->name.'/'.$Pengajuan_Absen->image)); ?>"><?php echo e($Pengajuan_Absen->surat_dokter); ?></a>
                                    </td>
                                <?php else: ?>
                                    <td colspan="3">
                                        <?php echo e($Pengajuan_Absen->surat_dokter); ?>

                                    </td>
                                <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Persetujuan</th>
                                    <th>Diperiksa</th>
                                    <th>Diketahui</th>
                                    <th>Yang Mengajukan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if($Pengajuan_Absen->status_rek == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span>
                                        <?php elseif($Pengajuan_Absen->status_rek == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($Pengajuan_Absen->status_hrd == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                        <?php elseif($Pengajuan_Absen->status_hrd == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($Pengajuan_Absen->status_kp == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                        <?php elseif($Pengajuan_Absen->status_kp == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <h4 class="text-center"><span class="badge badge-primary"><?php echo e('Terkirim'); ?></span></h4>
                                    </td>
                                </tr>
                            </tbody>
                            <tr>
                                <th class="text-center">
                                    <?php echo e($lastRek->causer->name ?? 'Wakil Rektor II'); ?>

                                </th>
                                <th class="text-center">
                                   <?php echo e($lastHRD->causer->name ?? 'Kepala Biro SDM'); ?>

                                </th>
                                <th class="text-center">
                                    <?php echo e($lastKP->causer->name ?? 'Pimpinan Unit'); ?>

                                </th>
                                <th class="text-center">
                                    <?php $__currentLoopData = $pengajuanAbsen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanAbsens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($pengajuanAbsens->User->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'absen'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_absen/show.blade.php ENDPATH**/ ?>