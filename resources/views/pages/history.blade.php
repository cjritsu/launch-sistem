@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'history'
])


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Riwayat Surat</h5>
                        <p class="card-category">Surat yang sudah pernah diajukan</p>
                    </div>
                    <div class="card-body">
                        <br/>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal (Yang Akan) Digunakan</th>
                                    <th>Tanggal Masuk Kembali</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- History Cuti --}}
                                @foreach ($pengajuanCutis as $pengajuanCutis)
                                    @if (auth()->user()->id == $pengajuanCutis->user_id)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanCutis->created_at)->isoFormat('D MMMM Y') }}</td>
                                            @if ($pengajuanCutis->jenis_cuti_id)
                                                <td>{{ 'Surat ' }} {{$pengajuanCutis->Jenis_cuti->name}}</td>
                                            @endif
                                            <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_mulai)->isoFormat('D MMMM Y') }} {{ '—' }} {{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_akhir)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanCutis->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ $pengajuanCutis->keterangan }}</td>
                                            @if ($pengajuanCutis->status_kp == '2' && $pengajuanCutis->status_hrd == '2' && $pengajuanCutis->status_rek == '2')
                                                <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                            @elseif ($pengajuanCutis->status_kp == '3' || $pengajuanCutis->status_rek == '3' || $pengajuanCutis->status_hrd == '3')
                                                <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                            @else
                                                <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                            @endif
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="surat_cuti/{{ $pengajuanCutis->id }}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                    <a href="surat_cuti/{{ $pengajuanCutis->id }}/edit" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                {{-- History Izin --}}
                                @foreach ($pengajuanSurat as $pengajuanSurats)
                                    @if (auth()->user()->id == $pengajuanSurats->user_id)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanSurats->created_at)->isoFormat('D MMMM Y') }}</td>
                                            @if ($pengajuanSurats->jenis_izin_id)
                                                <td>{{ 'Surat Izin ' }} {{$pengajuanSurats->Jenis_Izin->name}}</td>
                                            @endif
                                            <td>{{ \Carbon\Carbon::parse($pengajuanSurats->tanggal_izin_awal)->isoFormat('D MMMM Y') }} {{ '—' }} {{ \Carbon\Carbon::parse($pengajuanSurats->tanggal_izin_akhir)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanSurats->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ $pengajuanSurats->keterangan }}</td>
                                            @if ($pengajuanSurats->status_kp == '2' && $pengajuanSurats->status_hrd == '2' && $pengajuanSurats->status_rek == '2')
                                                <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                            @elseif ($pengajuanSurats->status_kp == '3' || $pengajuanSurats->status_rek == '3' || $pengajuanSurats->status_hrd == '3')
                                                <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                            @else
                                                <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                            @endif
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="surat_izin/{{ $pengajuanSurats->id }}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                    @if ($pengajuanSurats->status_hrd !== 1 || $pengajuanSurats->status_rek !== 1)

                                                    @else
                                                        <a href="surat_izin/{{ $pengajuanSurats->id }}/edit" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                {{-- History Tidak Masuk --}}
                                @foreach ($pengajuanAbsen as $pengajuanAbsens)
                                    @if (auth()->user()->id == $pengajuanAbsens->user_id)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->created_at)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{'Surat Tidak Masuk'}}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_absen_awal)->isoFormat('D MMMM Y') }} {{ '—' }} {{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_absen_akhir)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengajuanAbsens->tanggal_masuk)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ $pengajuanAbsens->keterangan }}</td>
                                            @if ($pengajuanAbsens->status_kp == '2' && $pengajuanAbsens->status_hrd == '2' && $pengajuanAbsens->status_rek == '2')
                                                <td><span class="badge badge-success">{{ 'Diterima' }}</span></td>
                                            @elseif ($pengajuanAbsens->status_kp == '3' || $pengajuanAbsens->status_rek == '3' || $pengajuanAbsens->status_hrd == '3')
                                                <td><span class="badge badge-danger">{{ 'Ditolak' }}</span></td>
                                            @else
                                                <td><span class="badge badge-warning">{{ 'Pending' }}</span></td>
                                            @endif
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="surat_absen/{{ $pengajuanAbsens->id }}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a> &nbsp;
                                                    <a href="surat_absen/{{ $pengajuanAbsens->id }}/edit" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
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
