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
                                <a href="{{ route('surat_cuti.create') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Cuti</a>
                            </div>
                        </div>
                        <br/>
                        <table class="table table-striped table-hover">
                            @if (auth()->user()->HasRole('Admin'))
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanCutis as $pengajuanCutis)
                                        <tr>
                                            <td>{{ $pengajuanCutis->User->nip }}</td>
                                            <td>{{ $pengajuanCutis->User->name }}</td>
                                            <td>{{ $pengajuanCutis->Jenis_cuti->name }}</td>
                                            <td>{{ $pengajuanCutis->tanggal_mulai }}</td>
                                            <td>{{ $pengajuanCutis->tanggal_akhir }}</td>
                                            <td>{{ $pengajuanCutis->keterangan }}</td>
                                            <td>{{ $pengajuanCutis->status_cuti->name}}</td>
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
                            @else
                                <thead>
                                    <tr>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanCutis as $pengajuanCutis)
                                        <tr>
                                            <td>{{ $pengajuanCutis->created_at }}</td>
                                            <td>{{ $pengajuanCutis->Jenis_cuti->name }}</td>
                                            <td>{{ $pengajuanCutis->tanggal_mulai }}</td>
                                            <td>{{ $pengajuanCutis->tanggal_akhir }}</td>
                                            <td>{{ $pengajuanCutis->keterangan }}</td>
                                            <td>{{ $pengajuanCutis->status_cuti->name}}</td>
                                            <td>
                                                <a href="surat_cuti/{{ $pengajuanCutis->id }}" type="button" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>View</a> &nbsp;
                                                @can('edit-surat')
                                                    <a href="surat_cuti/{{ $pengajuanCutis->id }}/edit" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Edit</a> &nbsp;
                                                @endcan
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
        $('#tanggal_mulai').datepicker({
            uiLibrary: 'bootstrap4'
        });
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
