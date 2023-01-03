<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">
                <?php echo e(__('Sistem Informasi Pegawai UBD')); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="#notif" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i><span class="badge badge-warning navbar-badge"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2" style="left: inherit; right: 0px;">
                        <span class="dropdown-item dropdown-header text-center badge-light"><?php echo e(auth()->user()->unreadNotifications->count()); ?> <?php echo e('Notifications'); ?></span>
                        <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-divider"></div>
                        <?php if($notification->data['surat'] == 'Tidak Masuk'): ?>
                            <a class="dropdown-item" href="surat_izin/<?php echo e($notification->data['id']); ?>"><i class="fa fa-envelope mr-2>"></i><?php echo e(' Ada Surat '); ?><b class="text-uppercase"><?php echo e($notification->data['surat']); ?></b> <?php echo e(' Baru!'); ?></a>
                        <?php endif; ?>
                        <?php if($notification->data['surat'] == 'Absen'): ?>
                            <a class="dropdown-item" href="surat_absen/<?php echo e($notification->data['id']); ?>"><i class="fa fa-envelope mr-2>"></i><?php echo e(' Ada Surat '); ?><b class="text-uppercase"><?php echo e($notification->data['surat']); ?></b> <?php echo e(' Baru!'); ?></a>
                        <?php endif; ?>
                        <?php if($notification->data['surat'] == 'Cuti Tahunan'): ?>
                            <a class="dropdown-item" href="surat_cuti/<?php echo e($notification->data['id']); ?>"><i class="fa fa-envelope mr-2>"></i><?php echo e(' Ada Surat '); ?><b class="text-uppercase"><?php echo e($notification->data['surat']); ?></b> <?php echo e(' Baru!'); ?></a>
                        <?php endif; ?>
                        <?php if($notification->data['surat'] == 'Cuti Khusus'): ?>
                            <a class="dropdown-item" href="surat_cuti/<?php echo e($notification->data['id']); ?>"><i class="fa fa-envelope mr-2>"></i><?php echo e(' Ada Surat '); ?><b class="text-uppercase"><?php echo e($notification->data['surat']); ?></b> <?php echo e(' Baru!'); ?></a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block"><?php echo e(__('Account')); ?></span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="<?php echo e(route('logout')); ?>" id="formLogOut" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();"><?php echo e(__('Log out')); ?></a>
                        <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__('My profile')); ?></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>