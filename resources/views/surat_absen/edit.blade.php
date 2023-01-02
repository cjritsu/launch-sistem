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
                        <h5 class="card-title">Edit Formulir Tidak Masuk Kerja</h5>
                        <p class="card-category">Silakan mengubah bagian yang dibutuhkan!</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('surat_absen.edit', $Pengajuan_Absen->id)}}" class="form-horizontal" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @if (auth()->user()->HasRole('Admin'))
                                <div class="form-group">
                                    {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                    <div class="col-md-4">
                                            {!! Form::select('user_id', $user_id, old('user_id', $Pengajuan_Absen->user_id), ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <div class="col-md-4">
                                            {!! Form::select('user_id', $user_id, old('user_id', $Pengajuan_Absen->user_id), ['class'=>'form-control', 'hidden']) !!}
                                    </div>
                                </div>
                            @endif
                            <div class="form-row" style="padding-left: 15px">
                                <div class="form-group col-md-2">
                                    {{ Form::label('tanggal_mulai', 'Tanggal Tidak Masuk Kerja &nbsp;', ['class'=>'control-label']) }}
                                    {{ Form::date('tanggal_absen_awal', old('tanggal_absen_awal', $Pengajuan_Absen->tanggal_absen_awal), ['placeholder'=>now(),'class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-2">
                                    {{ Form::label('tanggal_akhir', '&nbsp;', ['class'=>'control-label']) }}
                                    {{ Form::date('tanggal_absen_akhir', old('tanggal_absen_akhir', $Pengajuan_Absen->tanggal_absen_akhir), ['placeholder'=>now(),'class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-row" style="padding-left: 15px">
                                <div class="form-group col-md-2">
                                    {{ Form::label('tanggal_berita', 'Pemberitahuan Tidak Masuk &nbsp;', ['class'=>'control-label']) }}
                                    {{ Form::date('tanggal_berita', old('tanggal_berita', $Pengajuan_Absen->tanggal_berita), ['placeholder'=>now(),'class'=>'form-control']) }}
                                    @if ($errors->has('tanggal_berita'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('tanggal_berita') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    {{ Form::label('kepada_id', 'Kepada/Melalui &nbsp;', ['class'=>'control-label']) }}
                                    {!! Form::text('kepada_id', old('kepada_id', $Pengajuan_Absen->tinggalin_absen), ['placeholder'=>'Nama Orang','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::date('tanggal_masuk', old('tanggal_masuk', $Pengajuan_Absen->tanggal_masuk), ['placeholder'=>now(),'class'=>'form-control']) }}
                                    @if ($errors->has('tanggal_masuk'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('tanggal_masuk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {!! Form::textarea('keterangan', old('keterangan', $Pengajuan_Absen->keterangan), ['placeholder'=>'Training','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('surat_dokter', 'Jika Sakit, Surat Dokter &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4" onchange="showHide()">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="surat_dokter" id="radio_ada" value="Tersedia Surat Dokter" {{$Pengajuan_Absen->surat_dokter == 'Tersedia Surat Dokter' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="radio_ada">{{'Ada'}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="surat_dokter" id="radio_tdkada" value="Tidak Ada Surat Dokter" {{$Pengajuan_Absen->surat_dokter == 'Tidak Ada Surat Dokter' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="radio_tidakada">{{'Tidak Ada'}}</label>
                                    </div>
                                </div>
                                <div class="custom-file col-md-4" style="margin-left: 15px; display: none;" id="surat_bukti">
                                    {!! Form::file('surat_bukti', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                    {!! Form::label('surat_bukti', old('customFile', $Pengajuan_Absen->image), ['class' => 'custom-file-label']) !!}
                                </div>
                            </div>
                            <div class="form-row" style="padding-left: 15px">
                                @can('validasi-kp')
                                    <div class="form-group col-md-2">
                                        {{ Form::label('status_cuti', 'Validasi Kepala Unit &nbsp;', ['class'=>'control-label']) }}
                                        {!! Form::select('status_kp', $status_id, old('status_kp', $Pengajuan_Absen->status_kp), ['class'=>'form-control', 'id'=>'status_kp']) !!}
                                    </div>
                                @endcan
                                @can('validasi-hrd')
                                    <div class="form-group col-md-2">
                                        {{ Form::label('status_cuti', 'Validasi HRD &nbsp;', ['class'=>'control-label']) }}
                                        {!! Form::select('status_hrd', $status_id, old('status_hrd', $Pengajuan_Absen->status_hrd), ['class'=>'form-control', 'id'=>'status_hrd']) !!}

                                    </div>
                                @endcan
                                @can('validasi-rek')
                                    <div class="form-group col-md-2">
                                        {{ Form::label('status_cuti', 'Validasi Rektorat &nbsp;', ['class'=>'control-label']) }}
                                        {!! Form::select('status_rek', $status_id, old('status_rek', $Pengajuan_Absen->status_rek), ['class'=>'form-control', 'id'=>'status_rek']) !!}
                                    </div>
                                @endcan
                            </div>
                            @include('validation_error')
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showHide() {
            var surat_ada = document.getElementById('radio_ada');
            var bukti = document.getElementById('surat_bukti');
            if (surat_ada.checked == true) {
                bukti.style.display='block';
            }
            else {
                bukti.style.display='none';
            }
        }
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
