@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'absen'
])


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Formulir Tidak Masuk Kerja</h5>
                        <p class="card-category">Tidak masuk kerja tanpa adanya izin sebelumnya</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('surat_absen.create') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Formulir</a>
                            </div>
                            <div class="col-6 text-right">
                                <form action="{{ route('absen_search') }}" method="GET">
                                @csrf
                                    <div class="input-group no-border">
                                        <input type="text" value="{{ old('search') }}" class="form-control" placeholder="Search..." name="search">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="nc-icon nc-zoom-split"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br/>
                        <table class="table table-striped table-hover">
                            @if (auth()->user()->HasRole('Staff'))
                                <thead>
                                    <tr>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Tidak Masuk Kerja</th>
                                        <th colspan="2">Pemberitahuan Tidak Masuk</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Surat Bukti</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanAbsen as $pengajuanAbsens)
                                        @if (auth()->user()->id == $pengajuanAbsens->user_id)
                                            <tr>
                                                <td>{{ $pengajuanAbsens->created_at }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_absen_awal)->isoFormat('D MMMM Y') }} {{ '—' }} {{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_absen_akhir)->isoFormat('D MMMM Y') }}</td>
                                                <td colspan="2"><b>{{'Tgl. '}}</b> {{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_berita)->format('d/m/Y') }}
                                                <br><b>{{'Kepada/Melalui: '}}</b>{{$pengajuanAbsens->tinggalin_absen}}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                                <td>{{ $pengajuanAbsens->keterangan }}</td>
                                                @if ($pengajuanAbsens->image !== null && $pengajuanAbsens->surat_dokter == "Tersedia Surat Dokter")
                                                    <td><i class="nc-icon nc-check-2"></i></td>
                                                @else
                                                    <td>{{'—'}}</td>
                                                @endif
                                                @if ($pengajuanAbsens->status_kp == '2' && $pengajuanAbsens->status_hrd == '2' && $pengajuanAbsens->status_rek == '2')
                                                    <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                                @elseif ($pengajuanAbsens->status_kp == '3' || $pengajuanAbsens->status_hrd == '3' || $pengajuanAbsens->status_rek == '3')
                                                    <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                                @else
                                                    <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                                @endif
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="surat_absen/{{ $pengajuanAbsens->id }}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                        @can('edit-surat')
                                                            @if ($pengajuanAbsens->status_kp != '1')

                                                            @else
                                                                <a href="surat_absen/{{ $pengajuanAbsens->id }}/edit" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
                                                            @endif
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            @else
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Unit</th>
                                        <th>Tanggal Tidak Masuk Kerja</th>
                                        <th colspan="2">Pemberitahuan Tidak Masuk</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Surat Bukti</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanAbsen as $pengajuanAbsens)
                                        <tr>
                                            <td>{{ $pengajuanAbsens->User->nip }}</td>
                                            <td>{{ $pengajuanAbsens->User->name }}</td>
                                            <td>{{ $pengajuanAbsens->Unit_Kerja->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_absen_awal)->isoFormat('D MMMM Y') }} {{ '—' }} {{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_absen_akhir)->isoFormat('D MMMM Y') }}</td>
                                            <td colspan="2"><b>{{'Tgl. '}}</b> {{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_berita)->format('d/m/Y') }}<br>
                                            <b>{{'Kepada/Melalui: '}}</b> {{$pengajuanAbsens->tinggalin_absen}}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ $pengajuanAbsens->keterangan }}</td>
                                            @if ($pengajuanAbsens->image !== null && $pengajuanAbsens->surat_dokter == "Tersedia Surat Dokter")
                                                <td><i class="nc-icon nc-check-2"></i></td>
                                            @else
                                                <td>{{'—'}}</td>
                                            @endif
                                            @if ($pengajuanAbsens->status_kp == '2' && $pengajuanAbsens->status_hrd == '2' && $pengajuanAbsens->status_rek == '2')
                                                    <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                            @elseif ($pengajuanAbsens->status_kp == '3' || $pengajuanAbsens->status_hrd == '3' || $pengajuanAbsens->status_rek == '3')
                                                <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                            @else
                                                <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                            @endif
                                            <td>
                                                <div class="dropdown text-center">
                                                    <a class="dropdown-button" id="dropdown-menu-{{ $pengajuanAbsens->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $pengajuanAbsens->id }}">
                                                        <a href="surat_absen/{{ $pengajuanAbsens->id }}" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>View</a>
                                                        @if ($pengajuanAbsens->status_kp == 3 || $pengajuanAbsens->status_hrd == 3 || $pengajuanAbsens->status_rek == 3)

                                                        @else
                                                            <a href="surat_absen/{{ $pengajuanAbsens->id }}/edit" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                            {{ link_to('', 'Delete', ['class'=>'dropdown-item', 'onclick'=>"event.preventDefault();document.getElementById('delete-form-$pengajuanAbsens->id').submit();"]) }}
                                                            <form id="delete-form-{{ $pengajuanAbsens->id }}" action="{{ route('surat_absen.destroy', $pengajuanAbsens,  ['id' => $pengajuanAbsens->id]) }}" method="POST" style="display: none;">
                                                                @method('DELETE')
                                                                @csrf
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $pengajuanAbsen->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('scripts')
    <style>
        .table>thead>tr>th {
            font-size: 13.3px;
            font-weight: 700;
            padding-bottom: 0;
            text-transform: uppercase;
            border: 0;
        }
    </style>

    <script>
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    </script>
@endpush
