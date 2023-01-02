<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">UBD/SDM/FM-012-<?php echo e($pengajuan_cuti->id); ?></h5>
                        <p class="card-category">Keterangan Validasi Surat Cuti</p>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('surat_cuti.index')); ?>" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Return</a>
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
                                        <p class="category">Klik Tombol Detail Untuk Melihat Detail Surat Cuti</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SuratDetail">
                                            Details
                                        </button>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-surat')): ?>
                                            <?php if(auth()->user()->HasRole('Staff') && $pengajuan_cuti->status_kp != '1'): ?>

                                            <?php elseif($pengajuan_cuti->status_kp == 3 || $pengajuan_cuti->status_hrd == 3 || $pengajuan_cuti->status_rek == 3): ?>

                                            <?php else: ?>
                                            <a href="<?php echo e($pengajuan_cuti->id); ?>/edit" type="button" class="btn btn-success">Edit</a>
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
                                                <?php if($pengajuan_cuti->status_rek == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($pengajuan_cuti->status_rek == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastRek->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                            <td>
                                                <?php if($pengajuan_cuti->status_hrd == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($pengajuan_cuti->status_hrd == '3'): ?>
                                                    <h4><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                                <?php else: ?>
                                                    <h4><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                                <?php endif; ?>
                                                <p class="text-muted"><small><b><?php echo e($lastHRD->updated_at ?? ''); ?></b></small></p>
                                            </td>
                                            <td>
                                                <?php if($pengajuan_cuti->status_kp == '2'): ?>
                                                    <h4><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                                <?php elseif($pengajuan_cuti->status_kp == '3'): ?>
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
                        <h5 class="modal-title" id="JudulDetail">Surat Cuti - UBD/SDM/FM-012-<?php echo e($pengajuan_cuti->id); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIP</th>
                                <td>
                                    <?php $__currentLoopData = $pengajuanCuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanCutis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($pengajuanCutis->User->nip); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <?php echo e($pengajuanCutis->User->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Unit</th>
                                <td>
                                    <?php echo e($pengajuanCutis->Unit_Kerja->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Cuti</th>
                                <td>
                                    <?php echo e($pengajuanCutis->Jenis_cuti->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Permintaan Cuti</th>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($pengajuan_cuti->tanggal_mulai)->isoFormat('D MMMM Y')); ?> <?php echo e(' sampai '); ?> <?php echo e(\Carbon\Carbon::parse($pengajuan_cuti->tanggal_akhir)->isoFormat('D MMMM Y')); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk Kembali</th>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($pengajuan_cuti->tanggal_masuk)->isoFormat('D MMMM Y')); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Alasan Permohonan Cuti</th>
                                <td>
                                    <?php echo e($pengajuan_cuti->keterangan); ?>

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
                                        <?php if($pengajuan_cuti->status_rek == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span>
                                        <?php elseif($pengajuan_cuti->status_rek == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($pengajuan_cuti->status_hrd == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                        <?php elseif($pengajuan_cuti->status_hrd == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($pengajuan_cuti->status_kp == '2'): ?>
                                            <h4 class="text-center"><span class="badge badge-success"><?php echo e('Diterima'); ?></span></h4>
                                        <?php elseif($pengajuan_cuti->status_kp == '3'): ?>
                                            <h4 class="text-center"><span class="badge badge-danger"><?php echo e('Ditolak'); ?></span></h4>
                                        <?php else: ?>
                                            <h4 class="text-center"><span class="badge badge-warning"><?php echo e('Pending'); ?></span></h4>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <h4 class="text-center"><span class="badge badge-primary"><?php echo e('Terkirim'); ?></span></h4>
                                        <?php $__currentLoopData = $pengajuanCuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanCutis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-muted text-center"><small><b><?php echo e($pengajuanCutis->created_at ?? ''); ?></b></small></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $pengajuanCuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanCutis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($pengajuanCutis->User->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </th>
                            </tr>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <th><?php echo e('Keterangan dari SDM Admin'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo e('Hak Cuti Tahun'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(':'); ?>

                                    </td>
                                    <td>
                                        <?php echo e('12 Hari Kerja'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo e('Cuti yang diambil'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(':'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($pengajuan_cuti->num_days); ?><?php echo e(' Hari Kerja'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo e('Tanggal Periksa'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(':'); ?>

                                    </td>
                                    <td>
                                        <?php echo e($pengajuan_cuti->updated_at); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo e($pengajuan_cuti->id); ?>/edit" type="button" class="btn btn-primary">Edit</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'cuti'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/surat_cuti/show.blade.php ENDPATH**/ ?>