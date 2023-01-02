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
                        <form method="POST" action="/surat_cuti/{{ $pengajuan_cuti->id }}" class="form-horizontal">
                            @method('put')
                            @csrf
                            @if (auth()->user()->HasRole('Admin'))
                                <div class="form-group">
                                    {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                    <div class="col-md-4">
                                            {!! Form::select('user_id', $user_id, $pengajuan_cuti->user_id ?? old('user_id'), ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <div class="col-md-4">
                                            {!! Form::select('user_id', $user_id, $pengajuan_cuti->user_id ?? old('user_id'), ['class'=>'form-control', 'hidden']) !!}
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                {{ Form::label('jenis_cuti', 'Jenis Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {!! Form::select('jenis_cuti_id', $jenis_cuti_id, $pengajuan_cuti->jenis_cuti_id ?? old('jenis_cuti_id'), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_mulai', 'Tanggal Mulai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::date('tanggal_mulai', $pengajuan_cuti->tanggal_mulai ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_akhir', 'Tanggal Selesai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::date('tanggal_akhir', $pengajuan_cuti->tanggal_akhir ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::date('tanggal_masuk', $pengajuan_cuti->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::text('keterangan', $pengajuan_cuti->keterangan ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-row" style="padding-left: 15px">
                                @can('validasi-kp')
                                    <div class="form-group col-md-2">
                                        {{ Form::label('status_kp', 'Validasi Kepala Unit &nbsp;', ['class'=>'control-label']) }}
                                        {!! Form::select('status_kp', $status_id, $pengajuan_cuti->status_kp ?? old('status_kp'), ['class'=>'form-control']) !!}
                                    </div>
                                @endcan
                                @can('validasi-hrd')
                                    <div class="form-group col-md-2">
                                        {{ Form::label('status_hrd', 'Validasi HRD &nbsp;', ['class'=>'control-label']) }}
                                        {!! Form::select('status_hrd', $status_id, $pengajuan_cuti->status_hrd ?? old('status_hrd'), ['class'=>'form-control']) !!}

                                    </div>
                                @endcan
                                @can('validasi-rek')
                                    <div class="form-group col-md-2">
                                        {{ Form::label('status_rek', 'Validasi Rektorat &nbsp;', ['class'=>'control-label']) }}
                                        {!! Form::select('status_rek', $status_id, $pengajuan_cuti->status_rek ?? old('status_rek'), ['class'=>'form-control']) !!}
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
