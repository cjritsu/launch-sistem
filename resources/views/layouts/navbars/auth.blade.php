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
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'karyawan' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'karyawan') }}">
                                <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                <span class="sidebar-normal">{{ __(' Profile Management ') }}</span>
                            </a>
                        </li>
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
                        <li class="{{ $elementActive == 'cuti' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'surat_cuti') }}">
                                <span class="sidebar-mini-icon nc-icon nc-paper"></span>
                                <span class="sidebar-normal">{{ __(' Surat Cuti ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="{{ $elementActive == 'history' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'history') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('History') }}</p>
                </a>
            </li> --}}
            {{-- <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'upgrade') }}" class="bg-danger">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
