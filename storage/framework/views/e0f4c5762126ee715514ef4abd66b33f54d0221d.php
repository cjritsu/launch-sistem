<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profile Management</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?php echo e(route('karyawan_search')); ?>" method="GET">
                                    <?php echo csrf_field(); ?>
                                        <div class="input-group no-border">
                                            <input type="text" value="<?php echo e(old('search')); ?>" class="form-control" placeholder="Search..." name="search">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="nc-icon nc-zoom-split"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reset_jatah_cuti')): ?>
                                    <div class="col-3">
                                        <form action="<?php echo e(route('karyawan_reset')); ?>" method="POST">
                                            <?php echo method_field('PUT'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-warning">Reset Jatah Cuti</button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Agama</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Unit Kerja</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo e($karyawans->User->nip); ?></td>
                                                <td><?php echo e($karyawans->User->name); ?></td>
                                                <td><?php echo e($karyawans->agama); ?></td>
                                                <td><?php echo e($karyawans->tempat_lahir); ?><?php echo e(', '); ?><?php echo e(\Carbon\Carbon::parse($karyawans->tanggal_lahir)->format('d/m/Y')); ?></td>
                                                <td><?php echo e($karyawans->no_telp); ?></td>
                                                <td><?php echo e($karyawans->alamat); ?></td>
                                                <td><?php echo e($karyawans->Unit_Kerja->name); ?></td>
                                                <td><?php echo e($karyawans->Departemen->name); ?></td>
                                                <?php if($karyawans->status_karyawan_id == '1'): ?>
                                                    <td><span class="badge badge-primary"><?php echo e($karyawans->status_karyawan->name); ?></span></td>
                                                <?php elseif($karyawans->status_karyawan_id == '2'): ?>
                                                    <td><span class="badge badge-dark"><?php echo e($karyawans->status_karyawan->name); ?></span></td>
                                                <?php else: ?>
                                                    <td><span class="badge badge-danger"><?php echo e($karyawans->status_karyawan->name); ?></span></td>
                                                <?php endif; ?>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="karyawan/<?php echo e($karyawans->id); ?>/edit" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <?php echo e($karyawan->links()); ?>

                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="..."></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/karyawan/index.blade.php ENDPATH**/ ?>