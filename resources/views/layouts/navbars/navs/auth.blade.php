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
                {{ __('Sistem Informasi Pegawai UBD') }}</a>
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
                        <i class="nc-icon nc-bell-55"></i><span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2" style="left: inherit; right: 0px;">
                        <span class="dropdown-item dropdown-header text-center badge-light">{{ auth()->user()->unreadNotifications->count() }} {{'Notifications'}}</span>
                        @foreach (auth()->user()->unreadNotifications as $notification)
                        <div class="dropdown-divider"></div>
                        @if ($notification->data['surat'] == 'Tidak Masuk')
                            <a class="dropdown-item" href="surat_izin/{{ $notification->data['id'] }}"><i class="fa fa-envelope mr-2>"></i>{{ ' Ada Surat ' }}<b class="text-uppercase">{{ $notification->data['surat'] }}</b> {{ ' Baru!'}}</a>
                        @endif
                        @if ($notification->data['surat'] == 'Absen')
                            <a class="dropdown-item" href="surat_absen/{{ $notification->data['id'] }}"><i class="fa fa-envelope mr-2>"></i>{{ ' Ada Surat ' }}<b class="text-uppercase">{{ $notification->data['surat'] }}</b> {{ ' Baru!'}}</a>
                        @endif
                        @endforeach
                    </div>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2"
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
                        <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
