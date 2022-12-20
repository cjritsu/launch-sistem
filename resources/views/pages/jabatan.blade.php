@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'jabatan'
])


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Jabatan Karyawan</h5>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => route('store_jabatan'),'class'=>'form-horizontal', 'method'=>'POST']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Nama', ['class'=>'control-label col-md-4']) }}
                            <div class="col-lg-5">
                                {{ Form::text('name', $Departemen->name ?? null, ['placeholder'=>'Nama Jabatan','class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row col-sm-offset-2 col-sm-10">
                                {{ Form::submit('Tambah',['class'=>'btn btn-success']) }}
                                {!! Form::close() !!}
                                {!! Form::open(['url' => route('jabatan_destroy'), 'method'=>'POST']) !!}
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                {!! Form::submit('Hapus', ['class'=>'btn btn-danger']) !!}
                            </div>
                        </div>

                        <br/>
                        @foreach ($Jabatan as $Jabatans)
                            <ul class="list-group list-group-flush" id="list_item">
                                <li class="list-group-item">
                                    <div class="col-md-2">
                                        {!! Form::checkbox('jabatan[]', $Jabatans->id, null, ['class'=>'form-check-input']) !!}
                                        {{$Jabatans->name}}
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        {!! Form::close() !!}
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $Jabatan->links() }}
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
