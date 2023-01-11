@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-users text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    @if (auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin'))
                                        <p class="card-category">Total Pegawai</p>
                                        <p class="card-title">
                                            {{ $User_Count }}
                                        </p>
                                    @else
                                        <p class="card-category">Jatah Cuti</p>
                                        <p class="card-title"> {{ auth()->user()->jatah_cuti }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            @if (auth()->user()->HasRole('Admin'))
                                <i class="fa fa-refresh"></i> <a href="{{ route('page.index', 'user') }}">{{'Updated '}}{{ Carbon\Carbon::parse($updated_user->created_at)->diffForHumans() }}</a>
                            @elseif (auth()->user()->HasRole('HRD'))
                                <i class="fa fa-refresh"></i> <a href="{{ route('karyawan.index') }}">{{'Updated '}}{{ Carbon\Carbon::parse($updated_user->created_at)->diffForHumans() }}</a>
                            @else
                                <i class="fa fa-refresh"></i> <a href="{{ route('profile.edit') }}">{{'Updated '}}{{ Carbon\Carbon::parse(auth()->user()->updated_at)->diffForHumans() }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-envelope text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    @if (auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin'))
                                        <p class="card-category">Pengajuan Surat</p>
                                        <p class="card-title">{{ $Surat_Count }}</p>
                                    @else
                                        <p class="card-category">Hari Cuti Terpakai</p>
                                        <p class="card-title">{{ $jumlah_hari }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>{{'Updated Timeless'}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-check text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Surat Diterima</p>
                                    @if (auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin'))
                                        {{ $Terima_Count }}
                                    @else
                                        {{ $self_terima }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> {{'Updated Timeless'}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-times text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Surat Ditolak</p>
                                    @if (auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin'))
                                        {{ $Tolak_Count }}
                                    @else
                                        {{ $self_tolak }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> {{'Updated Timeless'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    @if (auth()->user()->HasRole('HRD') || auth()->user()->HasRole('Admin'))
                        <div class="card-header ">
                            <h5 class="card-title">Rekapitulasi Jumlah Karyawan Cuti</h5>
                            <div class="form-group">
                                {!! Form::label('periode_tahun', 'Periode Tahun : ', ['class'=>'card-category']) !!}
                                {!! Form::select('tahun', $bulan, '2022', ['class'=>'card-category']) !!}
                            </div>
                        </div>
                        <div class="card-body ">
                            <table class="table table-hover" id="filterTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahunan</th>
                                    <th scope="col">Khusus</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($report as $month => $values)
                                            <td>{{ \Carbon\Carbon::parse($month)->format ('F Y') }}</td>
                                            @foreach ($jenis_cuti_id as $jenis_cuti)
                                                <td>{{ $report[$month][$jenis_cuti]['count'] ?? '0' }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i>{{'Updated Timeless'}}
                            </div>
                        </div>
                    @else
                        <div class="card-header ">
                            <h5 class="card-title">Rekapitulasi Pengajuan Surat</h5>
                            <div class="form-group">
                                {!! Form::label('periode_tahun', 'Periode Tahun : ', ['class'=>'card-category']) !!}
                                {!! Form::select('tahun', $bulan, '2022', ['class'=>'card-category']) !!}
                            </div>
                        </div>
                        <div class="card-body ">
                            <table class="table table-hover" id="filterTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($rekap_cuti as $cutis)
                                            @if (auth()->user()->id == $cutis->user_id)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($cutis->created_at)->isoFormat('D MMMM Y') }}</td>
                                                    @if ($cutis->jenis_cuti_id)
                                                        <td>{{$cutis->Jenis_cuti->name}}</td>
                                                    @endif
                                                    @if ($cutis->status_rek == '2')
                                                        <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                                    @elseif ($cutis->status_kp == '3' || $cutis->status_rek == '3' || $cutis->status_hrd == '3')
                                                        <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                                    @else
                                                        <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <a href="{{ route('surat_cuti.show', $cutis->id )}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($rekap_izin as $izins)
                                            @if (auth()->user()->id == $izins->user_id)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($izins->created_at)->isoFormat('D MMMM Y') }}</td>
                                                    @if ($izins->jenis_izin_id)
                                                        <td>{{ 'Izin ' }} {{$izins->Jenis_Izin->name}}</td>
                                                    @endif
                                                    @if ($izins->status_rek == '2')
                                                        <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                                    @elseif ($izins->status_kp == '3' || $izins->status_rek == '3' || $izins->status_hrd == '3')
                                                        <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                                    @else
                                                        <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <a href="{{ route('surat_izin.show', $izins->id )}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($rekap_absen as $absens)
                                            @if (auth()->user()->id == $absens->user_id)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($absens->created_at)->isoFormat('D MMMM Y') }}</td>
                                                    <td>{{ 'Tidak Masuk' }}
                                                    @if ($absens->status_rek == '2')
                                                        <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                                    @elseif ($absens->status_kp == '3' || $absens->status_rek == '3' || $absens->status_hrd == '3')
                                                        <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                                    @else
                                                        <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <a href="{{ route('surat_absen.show', $absens->id )}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i>{{'Updated Timeless'}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
