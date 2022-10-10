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
                            @if (auth()->user()->roles_id == 1)
                            <div class="form-group">
                                {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                        {!! Form::select('user_id', $user_id, $pengajuan_cuti[0]->user_id ?? old('user_id'), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2', 'hidden']) }}
                                <div class="col-md-4">
                                        {!! Form::text('user_id', $pengajuan_cuti[0]->user_id, ['class' => 'form-control', 'readonly', 'hidden']) !!}
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
                                    {{ Form::text('tanggal_mulai', $pengajuan_cuti[0]->tanggal_mulai ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('tanggal_akhir', 'Tanggal Selesai &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::text('tanggal_akhir', $pengajuan_cuti[0]->tanggal_akhir ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
                                <div class="col-md-4">
                                    {{ Form::text('keterangan', $pengajuan_cuti[0]->keterangan ?? null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('status_cuti', 'Status Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
                                @if (auth()->user()->roles_id == 1 || auth()->user()->roles_id == 3)
                                    <div class="col-md-4">
                                        {!! Form::select('status_id', $status_id, $pengajuan_cuti[0]->status_id ?? old('status_id'), ['class'=>'form-control']) !!}
                                    </div>
                                @else
                                    <div class="col-md-4">
                                        {!! Form::select('status_id', $status_id, $pengajuan_cuti[0]->status_id ?? old('status_id'), ['class'=>'form-control', 'disabled' => 'true']) !!}
                                    </div>
                                @endif
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
