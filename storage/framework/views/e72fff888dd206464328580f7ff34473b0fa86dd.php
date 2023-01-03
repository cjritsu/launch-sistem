<?php $__env->startSection('content'); ?>
    <div class="content col-md-12 ml-auto mr-auto">
        <div class="header py-5 pb-7 pt-lg-9">
            <div class="container col-md-10">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 pt-5">
                            <h1 class="<?php if(Auth::guest()): ?> text-white <?php endif; ?>"><?php echo e(__('Selamat Datang di Sistem Informasi Pegawai Buddhi Dharma')); ?></h1>

                            <p class="<?php if(Auth::guest()): ?> text-white <?php endif; ?> text-lead mt-3 mb-0">
                                <?php echo e(__('Silakan bisa dimulai dengan klik bagian ( DASHBOARD ) untuk melihat informasi surat yang telah terkirim.')); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'class' => 'login-page',
    'elementActive' => ''
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/welcome.blade.php ENDPATH**/ ?>