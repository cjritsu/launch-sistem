<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="<?php echo e(route('profile.edit')); ?>" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="<?php echo e(asset('paper')); ?>/img/logo-small-ubd.png">
            </div>
        </a>
        <a href="<?php echo e(route('profile.edit')); ?>" class="logo-normal simple-text font-weight-bold">
            <?php echo e(__(auth()->user()->name)); ?>

        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="<?php echo e($elementActive == 'dashboard' ? 'active' : ''); ?> font-weight-bold">
                <a href="<?php echo e(route('page.index', 'dashboard')); ?>">
                    <i class="nc-icon nc-bank"></i>
                    <p><?php echo e(__('Dashboard')); ?></p>
                </a>
            </li>
            <li class="<?php echo e($elementActive == 'user' || $elementActive == 'profile' ? 'active' : ''); ?> font-weight-bold">
                <a data-toggle="collapse" aria-expanded="false" href="#DataPegawai">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                            <?php echo e(__('Data Pegawai')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="DataPegawai">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'profile' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profile.edit')); ?>">
                                <span class="sidebar-mini-icon"><?php echo e(__('UP')); ?></span>
                                <span class="sidebar-normal"><?php echo e(__(' User Profile ')); ?></span>
                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-users')): ?>
                            <li class="<?php echo e($elementActive == 'user' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'user')); ?>">
                                    <span class="sidebar-mini-icon"><?php echo e(__('U')); ?></span>
                                    <span class="sidebar-normal"><?php echo e(__(' User Management ')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-profile')): ?>
                            <li class="<?php echo e($elementActive == 'karyawan' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'karyawan')); ?>">
                                    <span class="sidebar-mini-icon"><?php echo e(__('P')); ?></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Profile Management ')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
            <li class="<?php echo e($elementActive == 'cuti' ? 'active' : ''); ?> font-weight-bold">
                <a data-toggle="collapse" aria-expanded="false" href="#PengajuanSurat">
                    <i class="nc-icon nc-email-85"></i>
                    <p>
                            <?php echo e(__('Pengajuan Surat')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="PengajuanSurat">
                    <ul class="nav">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('validasi-surat')): ?>
                            <li class="<?php echo e($elementActive == 'history' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'history')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Riwayat Surat ')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="<?php echo e($elementActive == 'cuti' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('page.index', 'surat_cuti')); ?>">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal"><?php echo e(__(' Surat Cuti ')); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo e($elementActive == 'izin' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('page.index', 'surat_izin')); ?>">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal"><?php echo e(__(' Surat Izin ')); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo e($elementActive == 'absen' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('page.index', 'surat_absen')); ?>">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal"><?php echo e(__(' Surat Sakit ')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('full-access')): ?>
                <li class="<?php echo e($elementActive == 'admin' ? 'active' : ''); ?> font-weight-bold">
                    <a data-toggle="collapse" aria-expanded="false" href="#SistemAdmin">
                        <i class="nc-icon nc-bell-55"></i>
                        <p><?php echo e(__('Sistem Admin')); ?></p>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="SistemAdmin">
                        <ul class="nav">
                            <li class="<?php echo e($elementActive == 'jenis_cuti' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'jenis_cuti')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Jenis Cuti ')); ?></span>
                                </a>
                            </li>
                            <li class="<?php echo e($elementActive == 'jenis_izin' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'jenis_izin')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Jenis Izin ')); ?></span>
                                </a>
                            </li>
                            <li class="<?php echo e($elementActive == 'unit_kerja' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'unit')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Unit Kerja ')); ?></span>
                                </a>
                            </li>
                            <li class="<?php echo e($elementActive == 'jabatan' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'jabatan')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Jabatan ')); ?></span>
                                </a>
                            </li>
                            <li class="<?php echo e($elementActive == 'status_karyawan' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'status_karyawan')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Status Karyawan ')); ?></span>
                                </a>
                            </li>
                            <li class="<?php echo e($elementActive == 'roles_permission' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('page.index', 'roles_and_permission')); ?>">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal"><?php echo e(__(' Roles and Permission ')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/layouts/navbars/auth.blade.php ENDPATH**/ ?>