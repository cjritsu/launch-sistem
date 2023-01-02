@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cuti'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">UBD/SDM/FM-012-{{ $pengajuan_cuti->id }}</h5>
                        <p class="card-category">Keterangan Validasi Surat Cuti</p>
                        <div class="col-sm-6">
                            <a href="{{ route('surat_cuti.index') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="places-buttons">
                            <div class="row">
                                <div class="col-md-6 ml-auto mr-auto text-center">
                                    <h4 class="card-title">
                                        VALIDATION
                                        <p class="category">Klik Tombol Detail Untuk Melihat Detail Surat Cuti</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SuratDetail">
                                            Details
                                        </button>
                                        @can('edit-surat')
                                            @if (auth()->user()->HasRole('Staff') && $pengajuan_cuti->status_kp != '1')

                                            @elseif ($pengajuan_cuti->status_kp == 3 || $pengajuan_cuti->status_hrd == 3 || $pengajuan_cuti->status_rek == 3)

                                            @else
                                            <a href="{{ $pengajuan_cuti->id }}/edit" type="button" class="btn btn-success">Edit</a>
                                            @endif
                                        @endcan
                                    </h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th></th>
                                            <th scope="col">Wakil Rektor II</th>
                                            <th scope="col">Kepala Biro SDM</th>
                                            <th scope="col">Pimpinan Unit</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <td>
                                                @if ($pengajuan_cuti->status_rek == '2')
                                                    <h4><span class="badge badge-success">{{ 'Diterima' }}</span></h4>
                                                @elseif ($pengajuan_cuti->status_rek == '3')
                                                    <h4><span class="badge badge-danger">{{ 'Ditolak' }}</span></h4>
                                                @else
                                                    <h4><span class="badge badge-warning">{{ 'Pending' }}</span></h4>
                                                @endif
                                                <p class="text-muted"><small><b>{{$lastRek->updated_at ?? ''}}</b></small></p>
                                            </td>
                                            <td>
                                                @if ($pengajuan_cuti->status_hrd == '2')
                                                    <h4><span class="badge badge-success">{{ 'Diterima' }}</span></h4>
                                                @elseif ($pengajuan_cuti->status_hrd == '3')
                                                    <h4><span class="badge badge-danger">{{ 'Ditolak' }}</span></h4>
                                                @else
                                                    <h4><span class="badge badge-warning">{{ 'Pending' }}</span></h4>
                                                @endif
                                                <p class="text-muted"><small><b>{{$lastHRD->updated_at ?? ''}}</b></small></p>
                                            </td>
                                            <td>
                                                @if ($pengajuan_cuti->status_kp == '2')
                                                    <h4><span class="badge badge-success">{{ 'Diterima' }}</span></h4>
                                                @elseif ($pengajuan_cuti->status_kp == '3')
                                                    <h4><span class="badge badge-danger">{{ 'Ditolak' }}</span></h4>
                                                @else
                                                    <h4><span class="badge badge-warning">{{ 'Pending' }}</span></h4>
                                                @endif
                                                <p class="text-muted"><small><b>{{$lastKP->updated_at ?? ''}}</b></small></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="SuratDetail" tabindex="-1" role="dialog" aria-labelledby="JudulDetail" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="JudulDetail">Surat Cuti - UBD/SDM/FM-012-{{ $pengajuan_cuti->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIP</th>
                                <td>
                                    @foreach ($pengajuanCuti as $pengajuanCutis)
                                    {{ $pengajuanCutis->User->nip }}
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    {{ $pengajuanCutis->User->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>Unit</th>
                                <td>
                                    {{ $pengajuanCutis->Unit_Kerja->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Cuti</th>
                                <td>
                                    {{ $pengajuanCutis->Jenis_cuti->name }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Permintaan Cuti</th>
                                <td>
                                    {{ \Carbon\Carbon::parse($pengajuan_cuti->tanggal_mulai)->isoFormat('D MMMM Y') }} {{' sampai '}} {{ \Carbon\Carbon::parse($pengajuan_cuti->tanggal_akhir)->isoFormat('D MMMM Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk Kembali</th>
                                <td>
                                    {{ \Carbon\Carbon::parse($pengajuan_cuti->tanggal_masuk)->isoFormat('D MMMM Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Alasan Permohonan Cuti</th>
                                <td>
                                    {{ $pengajuan_cuti->keterangan }}
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Persetujuan</th>
                                    <th>Diperiksa</th>
                                    <th>Diketahui</th>
                                    <th>Yang Mengajukan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($pengajuan_cuti->status_rek == '2')
                                            <h4 class="text-center"><span class="badge badge-success">{{ 'Diterima' }}</span>
                                        @elseif ($pengajuan_cuti->status_rek == '3')
                                            <h4 class="text-center"><span class="badge badge-danger">{{ 'Ditolak' }}</span>
                                        @else
                                            <h4 class="text-center"><span class="badge badge-warning">{{ 'Pending' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pengajuan_cuti->status_hrd == '2')
                                            <h4 class="text-center"><span class="badge badge-success">{{ 'Diterima' }}</span></h4>
                                        @elseif ($pengajuan_cuti->status_hrd == '3')
                                            <h4 class="text-center"><span class="badge badge-danger">{{ 'Ditolak' }}</span></h4>
                                        @else
                                            <h4 class="text-center"><span class="badge badge-warning">{{ 'Pending' }}</span></h4>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pengajuan_cuti->status_kp == '2')
                                            <h4 class="text-center"><span class="badge badge-success">{{ 'Diterima' }}</span></h4>
                                        @elseif ($pengajuan_cuti->status_kp == '3')
                                            <h4 class="text-center"><span class="badge badge-danger">{{ 'Ditolak' }}</span></h4>
                                        @else
                                            <h4 class="text-center"><span class="badge badge-warning">{{ 'Pending' }}</span></h4>
                                        @endif
                                    </td>
                                    <td>
                                        <h4 class="text-center"><span class="badge badge-primary">{{ 'Terkirim' }}</span></h4>
                                        @foreach ($pengajuanCuti as $pengajuanCutis)
                                            <p class="text-muted text-center"><small><b>{{$pengajuanCutis->created_at ?? ''}}</b></small></p>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                            <tr>
                                <th class="text-center">
                                    {{ $lastRek->causer->name ?? 'Wakil Rektor II' }}
                                </th>
                                <th class="text-center">
                                   {{ $lastHRD->causer->name ?? 'Kepala Biro SDM' }}
                                </th>
                                <th class="text-center">
                                    {{ $lastKP->causer->name ?? 'Pimpinan Unit' }}
                                </th>
                                <th class="text-center">
                                    @foreach ($pengajuanCuti as $pengajuanCutis)
                                        {{ $pengajuanCutis->User->name }}
                                    @endforeach
                                </th>
                            </tr>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <th>{{'Keterangan dari SDM Admin'}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{'Hak Cuti Tahun'}}
                                    </td>
                                    <td>
                                        {{':'}}
                                    </td>
                                    <td>
                                        {{'12 Hari Kerja'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{'Cuti yang diambil'}}
                                    </td>
                                    <td>
                                        {{':'}}
                                    </td>
                                    <td>
                                        {{$pengajuan_cuti->num_days}}{{' Hari Kerja'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{'Tanggal Periksa'}}
                                    </td>
                                    <td>
                                        {{':'}}
                                    </td>
                                    <td>
                                        {{$pengajuan_cuti->updated_at}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ $pengajuan_cuti->id }}/edit" type="button" class="btn btn-primary">Edit</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
