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
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-laravel" />


    <!--  Social tags      -->
    <meta name="keywords" content="design system, dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, paper, paper dashboard, creative tim, updivision, html dashboard, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap dashboard, responsive dashboard, laravel, laravel php, laravel php framework, free laravel admin template, free laravel admin, free laravel admin template + Front End + CRUD, crud laravel php, crud laravel, laravel backend admin dashboard">
    <meta name="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Dashboard Laravel by Creative Tim">
    <meta itemprop="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">

    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg">


    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Dashboard Laravel by Creative Tim">

    <meta name="twitter:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg">


    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Paper Dashboard Laravel by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/paper-dashboard-laravel" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg"/>
    <meta property="og:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up." />
    <meta property="og:site_name" content="Creative Tim" />

    <title>
        <?php echo e(__('SIPS')); ?>

    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo e(asset('paper')); ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('paper')); ?>/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->

    <script>
    // Facebook Pixel Code Don't Delete
        ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
        }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');
        try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");
        } catch (err) {
        console.log('Facebook Track Error:', err);
        }
    </script>
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
</head>


<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

            <div class="wrapper">

                <div class="sidebar" data-color="white" data-active-color="danger">
                    <div class="logo">
                        <a href="<?php echo e(route('profile.edit')); ?>" class="simple-text logo-mini">
                            <div class="logo-image-small">
                                <img src="<?php echo e(asset('paper')); ?>/img/logo-small-ubd.png">
                            </div>
                        </a>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="simple-text logo-normal">
                            <?php echo e(__(auth()->user()->name)); ?>

                        </a>
                    </div>
                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo e(route('page.index', 'dashboard')); ?>">
                                    <i class="nc-icon nc-bank"></i>
                                    <p><?php echo e(__('Dashboard')); ?></p>
                                </a>
                            </li>
                            <li >
                                <a data-toggle="collapse" aria-expanded="false" href="#DataPegawai">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>
                                            <?php echo e(__('Data Pegawai')); ?>

                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="DataPegawai">
                                    <ul class="nav">
                                        <li >
                                            <a href="<?php echo e(route('profile.edit')); ?>">
                                                <span class="sidebar-mini-icon"><?php echo e(__('UP')); ?></span>
                                                <span class="sidebar-normal"><?php echo e(__(' User Profile ')); ?></span>
                                            </a>
                                        </li>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-users')): ?>
                                            <li class="active">
                                                <a href="<?php echo e(route('page.index', 'user')); ?>">
                                                    <span class="sidebar-mini-icon"><?php echo e(__('U')); ?></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' User Management ')); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-profile')): ?>
                                            <li>
                                                <a href="<?php echo e(route('page.index', 'karyawan')); ?>">
                                                    <span class="sidebar-mini-icon"><?php echo e(__('P')); ?></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Profile Management ')); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                            <li >
                                <a data-toggle="collapse" aria-expanded="false" href="#PengajuanSurat">
                                    <i class="nc-icon nc-email-85"></i>
                                    <p>
                                            <?php echo e(__('Pengajuan Surat')); ?>

                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="PengajuanSurat">
                                    <ul class="nav">
                                        <li>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('validasi-surat')): ?>
                                                <a href="<?php echo e(route('page.index', 'history')); ?>">
                                                    <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Riwayat Surat ')); ?></span>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                        <li >
                                            <a href="<?php echo e(route('page.index', 'surat_cuti')); ?>">
                                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                <span class="sidebar-normal"><?php echo e(__(' Surat Cuti ')); ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('page.index', 'surat_izin')); ?>">
                                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                <span class="sidebar-normal"><?php echo e(__(' Surat Izin ')); ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('page.index', 'surat_absen')); ?>">
                                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                <span class="sidebar-normal"><?php echo e(__(' Surat Absen ')); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('full-access')): ?>
                                <li>
                                    <a data-toggle="collapse" aria-expanded="false" href="#SistemAdmin">
                                        <i class="nc-icon nc-bell-55"></i>
                                        <p><?php echo e(__('Sistem Admin')); ?></p>
                                        <b class="caret"></b>
                                    </a>
                                    <div class="collapse" id="SistemAdmin">
                                        <ul class="nav">
                                            <li>
                                                <a href="<?php echo e(route('page.index', 'jenis_cuti')); ?>">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Jenis Cuti ')); ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('page.index', 'jenis_izin')); ?>">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Jenis Izin ')); ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('page.index', 'unit')); ?>">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Unit Kerja ')); ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('page.index', 'jabatan')); ?>">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Jabatan ')); ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('page.index', 'status_karyawan')); ?>">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal"><?php echo e(__(' Status Karyawan ')); ?></span>
                                                </a>
                                            </li>
                                            <li>
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
    <div class="main-panel">
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
                    <a class="navbar-brand" href="#pablo"><?php echo e(__('User Management')); ?></a>
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
                                <i class="nc-icon nc-bell-55"></i><span class="badge badge-light"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="surat_izin/<?php echo e($notification->data['id']); ?>"><?php echo e('Pengajuan izin '); ?><b class="text-uppercase"><?php echo e($notification->data['surat']); ?></b> <?php echo e(' telah diperbarui!'); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    <ul class="navbar-nav">
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
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
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();"><?php echo e(__('Log out')); ?></a>
                                    <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__('My profile')); ?></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                        <!--Content User Management-->
                                <div class="col-8">
                                    <h3 class="mb-0">Users</h3>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-users')): ?>
                                    <div class="col-4 text-right">
                                        <a href="<?php echo e(route('user.create')); ?>" class="btn btn-sm btn-primary">Add user</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?php echo e(route('user_search')); ?>" method="GET">
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
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo e($user->nip); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->email); ?></td>
                                                <td>
                                                    <?php if(!empty($user->getRoleNames())): ?>
                                                      <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <label class="badge badge-success"><?php echo e($v); ?></label>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                  </td>
                                                <td>
                                                    <a href="user/<?php echo e($user->id); ?>/edit" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                    <?php $__env->startComponent('partials.delete_form'); ?>
                                                        <?php $__env->slot('route'); ?>
                                                            <?php echo e(route('user.destroy', $user,  ['id' => $user->id])); ?>

                                                        <?php $__env->endSlot(); ?>
                                                        <?php $__env->slot('id'); ?>
                                                            <?php echo e($user->id); ?>

                                                        <?php $__env->endSlot(); ?>
                                                    <?php echo $__env->renderComponent(); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center">
                                <?php echo e($users->links()); ?>

                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script><?php echo e(__(', made with ')); ?><i class="fa fa-heart heart"></i><?php echo e(__(' by BSTI ')); ?>

                </span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('paper')); ?>/js/core/jquery.min.js"></script>
    
    <script src="<?php echo e(asset('paper')); ?>/js/core/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(asset('paper')); ?>/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    
    <!-- Sharrre libray -->
    <script src="<?php echo e(asset('paper')); ?>/demo/jquery.sharrre.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo $__env->make('layouts.navbars.fixed-plugin-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\jenny\cjritsu\launch-sistem\resources\views/users/index.blade.php ENDPATH**/ ?>