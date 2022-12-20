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
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon-ubd.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/favicon-ubd.png">
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
        {{ __('SIPS') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    {{-- <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css" rel="stylesheet" /> --}}

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
                        <a href="{{ route('profile.edit') }}" class="simple-text logo-mini">
                            <div class="logo-image-small">
                                <img src="{{ asset('paper') }}/img/logo-small-ubd.png">
                            </div>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="simple-text logo-normal">
                            {{ __(auth()->user()->name) }}
                        </a>
                    </div>
                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('page.index', 'dashboard') }}">
                                    <i class="nc-icon nc-bank"></i>
                                    <p>{{ __('Dashboard') }}</p>
                                </a>
                            </li>
                            <li >
                                <a data-toggle="collapse" aria-expanded="false" href="#DataPegawai">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>
                                            {{ __('Data Pegawai') }}
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="DataPegawai">
                                    <ul class="nav">
                                        <li >
                                            <a href="{{ route('profile.edit') }}">
                                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                                            </a>
                                        </li>
                                        @can('create-users')
                                            <li class="active">
                                                <a href="{{ route('page.index', 'user') }}">
                                                    <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                                    <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-profile')
                                            <li>
                                                <a href="{{ route('page.index', 'karyawan') }}">
                                                    <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                                    <span class="sidebar-normal">{{ __(' Profile Management ') }}</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            <li >
                                <a data-toggle="collapse" aria-expanded="false" href="#PengajuanSurat">
                                    <i class="nc-icon nc-email-85"></i>
                                    <p>
                                            {{ __('Pengajuan Surat') }}
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <div class="collapse" id="PengajuanSurat">
                                    <ul class="nav">
                                        <li>
                                            @can('validasi-surat')
                                                <a href="{{ route('page.index', 'history') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                    <span class="sidebar-normal">{{ __(' Riwayat Surat ') }}</span>
                                                </a>
                                            @endcan
                                        </li>
                                        <li >
                                            <a href="{{ route('page.index', 'surat_cuti') }}">
                                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                <span class="sidebar-normal">{{ __(' Surat Cuti ') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('page.index', 'surat_izin') }}">
                                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                <span class="sidebar-normal">{{ __(' Surat Izin ') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('page.index', 'surat_absen') }}">
                                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                                <span class="sidebar-normal">{{ __(' Surat Absen ') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @can('full-access')
                                <li>
                                    <a data-toggle="collapse" aria-expanded="false" href="#SistemAdmin">
                                        <i class="nc-icon nc-bell-55"></i>
                                        <p>{{ __('Sistem Admin') }}</p>
                                        <b class="caret"></b>
                                    </a>
                                    <div class="collapse" id="SistemAdmin">
                                        <ul class="nav">
                                            <li>
                                                <a href="{{ route('page.index', 'jenis_cuti') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal">{{ __(' Jenis Cuti ') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('page.index', 'jenis_izin') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal">{{ __(' Jenis Izin ') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('page.index', 'unit') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal">{{ __(' Unit Kerja ') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('page.index', 'jabatan') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal">{{ __(' Jabatan ') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('page.index', 'status_karyawan') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal">{{ __(' Status Karyawan ') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('page.index', 'roles_and_permission') }}">
                                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                                    <span class="sidebar-normal">{{ __(' Roles and Permission ') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan
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
                    <a class="navbar-brand" href="#pablo">{{ __('User Management') }}</a>
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
                                <i class="nc-icon nc-bell-55"></i><span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="surat_izin/{{ $notification->data['id'] }}">{{ 'Pengajuan izin ' }}<b class="text-uppercase">{{ $notification->data['surat'] }}</b> {{ ' telah diperbarui!'}}</a>
                                @endforeach
                            </div>
                        </li>
                    <ul class="navbar-nav">
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-settings-gear-65"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
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
                                @can('create-users')
                                    <div class="col-4 text-right">
                                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                                    </div>
                                @endcan
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
                                        @foreach ($users as $user)
                                            <tr>
                                                <td></td>
                                                <td>{{ $user->nip }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if(!empty($user->getRoleNames()))
                                                      @foreach($user->getRoleNames() as $v)
                                                         <label class="badge badge-success">{{ $v }}</label>
                                                      @endforeach
                                                    @endif
                                                  </td>
                                                <td>
                                                    <a href="user/{{ $user->id }}/edit" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                    @component('partials.delete_form')
                                                        @slot('route')
                                                            {{ route('user.destroy', $user,  ['id' => $user->id]) }}
                                                        @endslot
                                                        @slot('id')
                                                            {{ $user->id }}
                                                        @endslot
                                                    @endcomponent
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center">
                                {{ $users->links() }}
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
                    </script>{{ __(', made with ') }}<i class="fa fa-heart heart"></i>{{ __(' by BSTI ') }}
                </span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
    <!--   Core JS Files   -->
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    {{-- <script src="{{ asset('paper') }}/js/core/popper.min.js"></script> --}}
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    {{-- <script src="{{ asset('paper') }}/demo/demo.js"></script> --}}
    <!-- Sharrre libray -->
    <script src="{{ asset('paper') }}/demo/jquery.sharrre.js"></script>

    @stack('scripts')

    @include('layouts.navbars.fixed-plugin-js')
</body>

</html>
