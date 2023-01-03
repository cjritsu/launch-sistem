<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-users text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <?php if(auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin')): ?>
                                        <p class="card-category">Total Pegawai</p>
                                        <p class="card-title">
                                            <?php echo e($User_Count); ?>

                                        </p>
                                    <?php else: ?>
                                        <p class="card-category">Jatah Cuti</p>
                                        <p class="card-title"> <?php echo e(auth()->user()->jatah_cuti); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <?php if(auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin')): ?>
                                <i class="fa fa-refresh"></i> <a href="<?php echo e(route('page.index', 'user')); ?>"><?php echo e('Updated '); ?><?php echo e(Carbon\Carbon::parse($updated_user->created_at)->diffForHumans()); ?></a>
                            <?php else: ?>
                                <i class="fa fa-refresh"></i> <a href="<?php echo e(route('page.index', 'user')); ?>"><?php echo e('Updated '); ?><?php echo e(Carbon\Carbon::parse(auth()->user()->updated_at)->diffForHumans()); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-envelope text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <?php if(auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin')): ?>
                                        <p class="card-category">Pengajuan Surat</p>
                                        <p class="card-title"><?php echo e($Surat_Count); ?></p>
                                    <?php else: ?>
                                        <p class="card-category">Hari Cuti Terpakai</p>
                                        <p class="card-title"><?php echo e($jumlah_hari); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i><?php echo e('Updated '); ?><?php echo e(Carbon\Carbon::parse($created_At)->diffForHumans()); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-check text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Surat Diterima</p>
                                    <?php if(auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin')): ?>
                                        <?php echo e($Terima_Count); ?>

                                    <?php else: ?>
                                        <?php echo e($self_terima); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> <?php echo e('Updated Timeless'); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-times text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Surat Ditolak</p>
                                    <?php if(auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin')): ?>
                                        <?php echo e($Tolak_Count); ?>

                                    <?php else: ?>
                                        <?php echo e($self_tolak); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> <?php echo e('Updated Timeless'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <?php if(auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin')): ?>
                        <div class="card-header ">
                            <h5 class="card-title">Rekapitulasi Jumlah Karyawan Cuti</h5>
                            <div class="form-group">
                                <?php echo Form::label('periode_tahun', 'Periode Tahun : ', ['class'=>'card-category']); ?>

                                <?php echo Form::select('tahun', $bulan, '2022', ['class'=>'card-category']); ?>

                            </div>
                        </div>
                        <div class="card-body ">
                            <table class="table table-hover" id="filterTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahunan</th>
                                    <th scope="col">Khusus</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(\Carbon\Carbon::parse($month)->format('F Y')); ?></td>
                                        <?php $__currentLoopData = $jenis_cuti_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_cuti_ide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($report[$month][$jenis_cuti_ide]['count'] ?? '0'); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i><?php echo e('Updated '); ?><?php echo e(Carbon\Carbon::parse($created_At)->diffForHumans()); ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card-header ">
                            <h5 class="card-title">Rekapitulasi Pengajuan Surat</h5>
                            <div class="form-group">
                                <?php echo Form::label('periode_tahun', 'Periode Tahun : ', ['class'=>'card-category']); ?>

                                <?php echo Form::select('tahun', $bulan, '2022', ['class'=>'card-category']); ?>

                            </div>
                        </div>
                        <div class="card-body ">
                            <table class="table table-hover" id="filterTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $__currentLoopData = $rekap_cuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($cuti->user_id == auth()->user()->id): ?>
                                                <td><?php echo e(Carbon\Carbon::parse($cuti->created_at)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e($cuti->Jenis_cuti->name); ?></td>
                                                <td>
                                                    <?php if($cuti->status_rek == '2'): ?>
                                                        <span class="badge badge-success"><?php echo e('Diterima'); ?></span>
                                                    <?php elseif($cuti->status_kp == '3' || $cuti->status_rek == '3' || $cuti->status_hrd == '3'): ?>
                                                        <span class="badge badge-danger"><?php echo e('Ditolak'); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning"><?php echo e('Pending'); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="surat_cuti/<?php echo e($cuti->id); ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> &nbsp;
                                                </td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <?php $__currentLoopData = $rekap_izin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $izin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($izin->user_id == auth()->user()->id): ?>
                                                <td><?php echo e(Carbon\Carbon::parse($izin->created_at)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e('Izin '); ?><?php echo e($izin->Jenis_Izin->name); ?></td>
                                                <td>
                                                    <?php if($izin->status_rek == '2'): ?>
                                                        <span class="badge badge-success"><?php echo e('Diterima'); ?></span>
                                                    <?php elseif($izin->status_kp == '3' || $izin->status_rek == '3' || $izin->status_hrd == '3'): ?>
                                                        <span class="badge badge-danger"><?php echo e('Ditolak'); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning"><?php echo e('Pending'); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="surat_cuti/<?php echo e($izin->id); ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> &nbsp;
                                                </td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <tr>
                                        <?php $__currentLoopData = $rekap_absen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($absen->user_id == auth()->user()->id): ?>
                                                <td><?php echo e(Carbon\Carbon::parse($absen->created_at)->isoFormat('D MMMM Y')); ?></td>
                                                <td><?php echo e('Tidak Masuk'); ?></td>
                                                <td>
                                                    <?php if($absen->status_rek == '2'): ?>
                                                        <span class="badge badge-success"><?php echo e('Diterima'); ?></span>
                                                    <?php elseif($absen->status_kp == '3' || $absen->status_rek == '3' || $absen->status_hrd == '3'): ?>
                                                        <span class="badge badge-danger"><?php echo e('Ditolak'); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning"><?php echo e('Pending'); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="surat_cuti/<?php echo e($absen->id); ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> &nbsp;
                                                </td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i><?php echo e('Updated Timeless'); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('plugins/DataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables.js')); ?>"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>