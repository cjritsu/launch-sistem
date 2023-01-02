<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ route('profile.edit') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small-ubd.png">
            </div>
        </a>
        <a href="{{ route('profile.edit') }}" class="logo-normal simple-text">
            {{ __(auth()->user()->name) }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#DataPegawai">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                            {{ __('Data Pegawai') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="DataPegawai">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        @can('create-users')
                            <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'user') }}">
                                    <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                    <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('create-profile')
                            <li class="{{ $elementActive == 'karyawan' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'karyawan') }}">
                                    <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                    <span class="sidebar-normal">{{ __(' Profile Management ') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'cuti' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#PengajuanSurat">
                    <i class="nc-icon nc-email-85"></i>
                    <p>
                            {{ __('Pengajuan Surat') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="PengajuanSurat">
                    <ul class="nav">
                        @can('validasi-surat')
                            <li class="{{ $elementActive == 'history' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'history') }}">
                                    <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                    <span class="sidebar-normal">{{ __(' Riwayat Surat ') }}</span>
                                </a>
                            </li>
                        @endcan
                        <li class="{{ $elementActive == 'cuti' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'surat_cuti') }}">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal">{{ __(' Surat Cuti ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'izin' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'surat_izin') }}">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal">{{ __(' Surat Izin ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'absen' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'surat_absen') }}">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal">{{ __(' Surat Absen ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @can('full-access')
                <li class="{{ $elementActive == 'admin' ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="false" href="#SistemAdmin">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>{{ __('Sistem Admin') }}</p>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="SistemAdmin">
                        <ul class="nav">
                            <li class="{{ $elementActive == 'jenis_cuti' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'jenis_cuti') }}">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal">{{ __(' Jenis Cuti ') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'jenis_izin' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'jenis_izin') }}">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal">{{ __(' Jenis Izin ') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'unit_kerja' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'unit') }}">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal">{{ __(' Unit Kerja ') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'jabatan' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'jabatan') }}">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal">{{ __(' Jabatan ') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'status_karyawan' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'status_karyawan') }}">
                                    <span class="sidebar-mini-icon nc-icon nc-settings-gear-65"></span>
                                    <span class="sidebar-normal">{{ __(' Status Karyawan ') }}</span>
                                </a>
                            </li>
                            <li class="{{ $elementActive == 'roles_permission' ? 'active' : '' }}">
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
