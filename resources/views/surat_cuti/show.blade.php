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
                        <h5 class="card-title">UBD/SDM/FM-012-{{ $pengajuan_cuti[0]->id }}</h5>
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
                                        <p class="category">Scan QR Code Untuk Melihat Detail Surat Cuti</p>
                                    </h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Wakil Rektor II</th>
                                            <th scope="col">Kepala Biro SDM</th>
                                            <th scope="col">Pimpinan Unit</th>
                                            <th scope="col">Karyawan</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>{!! Form::checkbox('Karyawan', null, true) !!}<br>
                                                {!! QrCode::size(150)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}</th>
                                            <th>{!! QrCode::size(150)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}</th>
                                            <th>{!! QrCode::size(150)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}</th>
                                            <th>{!! QrCode::size(150)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}</th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
