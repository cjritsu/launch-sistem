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
                        <h5 class="card-title">Edit Surat Cuti</h5>
                        <p class="card-category">Silakan mengubah bagian yang dibutuhkan!</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/surat_cuti/{{ $pengajuan_cuti[0]->id }}" class="form-horizontal">
                            @method('put')
                            @csrf
                            @if (auth()->user()->HasRole('Admin'))
                            <div class="form-group">
                                {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                        {!! Form::select('user_id', $user_id, $pengajuan_cuti[0]->user_id ?? old('user_id'), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                {{ Form::label('jenis_cuti', 'Jenis Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {!! Form::select('jenis_cuti_id', $jenis_cuti_id, $pengajuan_cuti[0]->jenis_cuti_id ?? old('jenis_cuti_id'), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_mulai', 'Tanggal Mulai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::date('tanggal_mulai', $pengajuan_cuti[0]->tanggal_mulai ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_akhir', 'Tanggal Selesai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::date('tanggal_akhir', $pengajuan_cuti[0]->tanggal_akhir ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::text('keterangan', $pengajuan_cuti[0]->keterangan ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            @can('validasi-surat')
                                <div class="form-group">
                                    <label class="form-check-label col-md-2" style="font-size: 15px;">
                                        <span class="form-check-sign"></span>
                                            {{ __('Kepala Unit') }}
                                    </label>
                                    <input class="form-check-input col-md-2" name="valid_kp" type="checkbox" id="valid_kp" onclick="checkBoxEvent()">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label col-md-2" style="font-size: 15px;">
                                        <span class="form-check-sign"></span>
                                            {{ __('HRD') }}
                                    </label>
                                    <input class="form-check-input col-md-2" name="valid_hrd" type="checkbox" id="valid_hrd" onclick="checkBoxEvent()">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label col-md-2" style="font-size: 15px;">
                                        <span class="form-check-sign"></span>
                                            {{ __('Rektorat') }}
                                    </label>
                                    <input class="form-check-input col-md-2" name="valid_rektorat" type="checkbox" id="valid_rektorat" onclick="checkBoxEvent()">
                                </div>
                                <div class="form-group">
                                    {{ Form::label('status_cuti', 'Status Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
                                    @if ($pengajuan_cuti[0]->valid_kp == 1 && $pengajuan_cuti[0]->valid_hrd == 1 && $pengajuan_cuti[0]->valid_rek == 1)

                                    @elseif ()
                                    <div class="col-md-4">
                                        {!! Form::select('status_id', $status_id, $pengajuan_cuti[0]->status_id ?? old('status_id'), ['class'=>'form-control', 'disabled', 'id'=>'status_id']) !!}
                                    </div>

                                </div>
                            @endcan
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
        function checkBoxEvent() {
            document.getElementById('status_id').setAttribute('disabled', 'disabled');
            var kp = document.getElementById('valid_kp');
            var hrd = document.getElementById('valid_hrd');
            var rektor = document.getElementById('valid_rektorat');
            if (kp.checked == true && hrd.checked == true && rektor.checked == true) {
                document.getElementById('status_id').removeAttribute('disabled');
            } else {

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
