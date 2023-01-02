<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('paper')); ?>/img/apple-icon-ubd.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('paper')); ?>/img/favicon-ubd.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Extra details for Live View on GitHub Pages -->

    <title>
        <?php echo e(__('SISP')); ?>

    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo e(asset('paper')); ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('paper')); ?>/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    

</head>

<body class="<?php echo e($class); ?>">

    <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.page_templates.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <?php echo $__env->make('layouts.page_templates.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('paper')); ?>/js/core/jquery.min.js"></script>
    <script src="<?php echo e(asset('paper')); ?>/js/core/popper.min.js"></script>
    <script src="<?php echo e(asset('paper')); ?>/js/core/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(asset('paper')); ?>/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    
    <!-- Sharrre libray -->
    <script src="../assets/demo/jquery.sharrre.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo $__env->make('layouts.navbars.fixed-plugin-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/layouts/app.blade.php ENDPATH**/ ?>