<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">UBD/SDM/FM-020-<?php echo e($suratizin->id); ?></h5>
                        <p class="card-category">Keterangan Validasi Surat Izin</p>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('surat_izin.index')); ?>" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Return</a>
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
                                        <p class="category">Klik Tombol Detail Untuk Melihat Detail Surat Izin</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SuratDetail">
                                            Details
                                        </button>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-surat')): ?>
                                            <?php if(auth()->user()->HasRole('Staff') && $suratizin->status_kp != '1'): ?>

                                            <?php elseif($suratizin->status_kp == 3 || $suratizin->status_hrd == 3 || $suratizin->status_rek == 3): ?>

                                            <?php else: ?>
                                            <a href="<?php echo e($suratizin->id); ?>/edit" type="button" class="btn btn-success">Edit</a>
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
                                                <?php if($suratizin->status_rek == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($suratizin->status_rek == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastRek->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                            <td>
                                                <?php if($suratizin->status_hrd == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($suratizin->status_hrd == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastHRD->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                            <td>
                                                <?php if($suratizin->status_kp == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($suratizin->status_kp == '3'): ?>
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
                        <h5 class="modal-title" id="JudulDetail">Surat Izin - UBD/SDM/FM-020-<?php echo e($suratizin->id); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIP</th>
                                <td>
                                    <?php $__currentLoopData = $pengajuanIzin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanIzins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($pengajuanIzins->User->nip); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <?php echo e($pengajuanIzins->User->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Unit</th>
                                <td>
                                    <?php echo e($pengajuanIzins->Unit_Kerja->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Izin</th>
                                <td>
                                        <?php echo e($pengajuanIzins->Jenis_Izin->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Izin</th>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($suratizin->tanggal_izin_awal)->isoFormat('D MMMM Y')); ?> <?php echo e(' sampai '); ?> <?php echo e(\Carbon\Carbon::parse($suratizin->tanggal_izin_akhir)->isoFormat('D MMMM Y')); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk Kembali</th>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($suratizin->tanggal_masuk)->isoFormat('D MMMM Y')); ?>

                                </td>
                            </tr>
                            <tr>
                                <?php $__currentLoopData = $pengajuanIzin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanIzins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th>Alasan Permohonan Izin <?php echo e($pengajuanIzins->Jenis_Izin->name); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <?php echo e($suratizin->keterangan); ?>

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
                                        <?php if($suratizin->status_rek == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span>
                                        <?php elseif($suratizin->status_rek == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($suratizin->status_hrd == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                        <?php elseif($suratizin->status_hrd == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($suratizin->status_kp == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                        <?php elseif($suratizin->status_kp == '3'): ?>
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
                                   <?php echo e($lastHRD->causer->name ?? 'Biro SDM'); ?>

                                </th>
                                <th class="text-center">
                                    <?php $__currentLoopData = $pengajuanIzin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanIzins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($pengajuanIzins->User->roles_id == 3): ?>
                                            <?php echo e($pengajuanIzins->User->name); ?>

                                        <?php else: ?>
                                            <?php echo e($lastKP->causer->name ?? 'Atasan Langsung'); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </th>
                                <th class="text-center">
                                    <?php $__currentLoopData = $pengajuanIzin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanIzins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($pengajuanIzins->User->name); ?>

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
    'elementActive' => 'izin'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_izin/show.blade.php ENDPATH**/ ?>