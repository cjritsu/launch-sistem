<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">
                <img src="<?php echo e(asset('paper')); ?>/img/logo-small-ubd.png" width="83" height="84" class="d-inline-block" alt="">
                <?php echo e(__('Sistem Informasi Surat UBD')); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                
                <li class="nav-item  active ">
                    <a href="<?php echo e(route('login')); ?>" class="nav-link">
                    <i class="nc-icon nc-tap-01"></i><?php echo e(__('Login')); ?>

                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/layouts/navbars/navs/guest.blade.php ENDPATH**/ ?>