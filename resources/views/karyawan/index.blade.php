@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profile Management</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Agama</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Unit Kerja</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($karyawan as $karyawans)
                                            <tr>
                                                <td></td>
                                                <td>{{ $karyawans->User->nip }}</td>
                                                <td>{{ $karyawans->User->name }}</td>
                                                <td>{{ $karyawans->agama }}</td>
                                                <td>{{ $karyawans->tempat_lahir }}{{', '}}{{\Carbon\Carbon::parse($karyawans->tanggal_lahir)->format('d/m/Y')}}</td>
                                                <td>{{ $karyawans->no_telp }}</td>
                                                <td>{{ $karyawans->alamat }}</td>
                                                <td>{{ $karyawans->Unit_Kerja->name }}</td>
                                                <td>{{ $karyawans->Departemen->name }}</td>
                                                @if ($karyawans->status_karyawan_id == '1')
                                                    <td><span class="badge badge-primary">{{ $karyawans->status_karyawan->name }}</span></td>
                                                @elseif ($karyawans->status_karyawan_id == '2')
                                                    <td><span class="badge badge-dark">{{ $karyawans->status_karyawan->name }}</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">{{ $karyawans->status_karyawan->name }}</span></td>
                                                @endif
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="karyawan/{{ $karyawans->id }}/edit" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $karyawan->links() }}
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="..."></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
