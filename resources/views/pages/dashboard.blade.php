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
                                    <p class="card-category">Total Pegawai</p>
                                    <p class="card-title">
                                        {{ $User_Count }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> <a href="{{ route('page.index', 'user') }}">{{'Updated '}}{{ Carbon\Carbon::parse($updated_user->created_at)->diffForHumans() }}</a>
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
                                    <p class="card-category">Pengajuan Surat</p>
                                    <p class="card-title">{{ $Surat_Count }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>{{'Updated '}}{{ Carbon\Carbon::parse($updated_cuti->created_at)->diffForHumans() }}
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
                                    {{ $Terima_Count }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> {{'Updated '}}{{ Carbon\Carbon::parse($updated_absen)->diffForHumans() }}
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
                                    {{ $Tolak_Count }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> {{'Updated '}}{{ Carbon\Carbon::parse($updated_izin)->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
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
                                @foreach ($report as $month => $values)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($month)->format('F Y')}}</td>
                                    @foreach ($jenis_cuti_id as $jenis_cuti_ide)
                                        <td>{{ $report[$month][$jenis_cuti_ide]['count'] ?? '0' }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i>{{'Updated '}}{{ Carbon\Carbon::parse($updated_cuti->created_at)->diffForHumans() }}
                        </div>
                    </div>
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
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            // $(document).ready( function () {
            //     $('#filterTable').DataTable();
            // } );
            // demo.initChartsPages();
        });
    </script>
@endpush
