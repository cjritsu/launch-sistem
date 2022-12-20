@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cuti'
])


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Pengajuan Surat Cuti</h5>
                        <p class="card-category">Surat cuti yang telah diterima/ditolak, tidak dapat diubah lagi</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                @if (auth()->user()->jatah_cuti == 0 || auth()->user()->jatah_cuti <= 0)

                                @else
                                    <a href="{{ route('surat_cuti.create') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Cuti</a>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <table class="table table-striped table-hover">
                            @if (auth()->user()->HasRole('Staff'))
                                <thead>
                                    <tr>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Pengambilan Cuti</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Hari Terpakai</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanCuti as $pengajuanCutis)
                                        @if (auth()->user()->id == $pengajuanCutis->user_id)
                                            <tr>
                                                <td>{{ $pengajuanCutis->created_at }}</td>
                                                <td>{{ $pengajuanCutis->Jenis_cuti->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_mulai)->isoFormat('D MMMM Y') }} {{' — '}} {{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_akhir)->isoFormat('D MMMM Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                                <td>{{ $pengajuanCutis->keterangan }}</td>
                                                <td class="text-center">{{ $pengajuanCutis->num_days }}</td>
                                                @if ($pengajuanCutis->status_kp == '2' && $pengajuanCutis->status_hrd == '2' && $pengajuanCutis->status_rek == '2')
                                                    <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                                @elseif ($pengajuanCutis->status_kp == '3' || $pengajuanCutis->status_hrd == '3' || $pengajuanCutis->status_rek == '3')
                                                    <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                                @else
                                                    <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                                @endif
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="surat_cuti/{{ $pengajuanCutis->id }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> &nbsp;
                                                        @can('edit-surat')
                                                            @if ($pengajuanCutis->status_kp != '1')

                                                            @else
                                                                <a href="surat_cuti/{{ $pengajuanCutis->id }}/edit" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
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
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tanggal Masuk Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Days</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanCuti as $pengajuanCutis)
                                        <tr>
                                            <td>{{ $pengajuanCutis->User->nip }}</td>
                                            <td>{{ $pengajuanCutis->User->name }}</td>
                                            <td>{{ $pengajuanCutis->Unit_Kerja->name }}</td>
                                            <td>{{ $pengajuanCutis->Jenis_cuti->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_mulai)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_akhir)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ $pengajuanCutis->keterangan }}</td>
                                            <td>{{ $pengajuanCutis->num_days }}</td>
                                            @if ($pengajuanCutis->status_kp == '2' && $pengajuanCutis->status_hrd == '2' && $pengajuanCutis->status_rek == '2')
                                                    <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                            @elseif ($pengajuanCutis->status_kp == '3' || $pengajuanCutis->status_hrd == '3' || $pengajuanCutis->status_rek == '3')
                                                <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                            @else
                                                <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                            @endif
                                            <td>
                                                <div class="dropdown text-center">
                                                    <a class="dropdown-button" id="dropdown-menu-{{ $pengajuanCutis->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $pengajuanCutis->id }}">
                                                        <a href="surat_cuti/{{ $pengajuanCutis->id }}" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>View</a>
                                                        <a href="surat_cuti/{{ $pengajuanCutis->id }}/edit" class="dropdown-item"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                        {{ link_to('', 'Delete', ['class'=>'dropdown-item', 'onclick'=>"event.preventDefault();document.getElementById('delete-form-$pengajuanCutis->id').submit();"]) }}
                                                        <form id="delete-form-{{ $pengajuanCutis->id }}" action="{{ route('surat_cuti.destroy', $pengajuanCutis,  ['id' => $pengajuanCutis->id]) }}" method="POST" style="display: none;">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
