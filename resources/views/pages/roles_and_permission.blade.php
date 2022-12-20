@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'roles_permission'
])


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Roles dan Permission</h5>
                    </div>
                    <div class="card-body" id="main">
                        {{ Form::open(['url' => route('store_rp'),'class'=>'form-horizontal', 'method'=>'POST']) }}
                        <div class="form-group">
                            {{ Form::label('roles_name', 'Nama Roles & Permission', ['class'=>'control-label col-md-4']) }}
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::text('roles_name', $role->name ?? null, ['placeholder'=>'Nama Roles','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::text('permit_name', $permission->name ?? null, ['placeholder'=>'Nama Permission','class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row col-sm-offset-2 col-sm-10">
                                {{ Form::submit('Tambah',['class'=>'btn btn-success']) }}
                                {!! Form::close() !!}
                                <a href="#linking" class="btn btn-primary active" role="button" aria-pressed="true" onclick="showHide()">Set Permission</a>
                                {!! Form::open(['url' => route('rp_destroy'), 'method'=>'POST']) !!}
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                {!! Form::submit('Hapus', ['class'=>'btn btn-danger']) !!}
                            </div>
                        </div>

                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h6>Roles</h6>
                                    </div>
                                    @foreach ($Roles as $Roless)
                                        <ul class="list-group list-group-flush" id="list_item">
                                            <li class="list-group-item">
                                                <div class="col-md-4">
                                                    {!! Form::checkbox('roles[]', $Roless->id, null, ['class'=>'form-check-input chck_item']) !!}
                                                    {{$Roless->name}}
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h6>Permission</h6>
                                    </div>
                                    @foreach ($Permission as $Permissions)
                                        <ul class="list-group list-group-flush" id="list_item">
                                            <li class="list-group-item">
                                                <div class="col-md-4">
                                                    {!! Form::checkbox('permissions[]', $Permissions->id, null, ['class'=>'form-check-input chck_item']) !!}
                                                    {{$Permissions->name}}
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    {{-- Linking --}}
                    <div class="card-body" id="linking" hidden>
                        {{ Form::open(['url' => route('update_rp'),'class'=>'form-horizontal', 'method'=>'POST']) }}
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <div class="form-row col-sm-offset-2 col-sm-10">
                                <a href="#main" class="btn btn-primary active" role="button" aria-pressed="true" onclick="hideShow()">Kembali</a>
                                {{ Form::submit('Kasih Permission',['class'=>'btn btn-success']) }}
                            </div>
                        </div>

                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h6>Roles</h6>
                                    </div>
                                    @foreach ($Roles as $Roless)
                                        <ul class="list-group list-group-flush" id="list_item">
                                            <li class="list-group-item">
                                                <div class="col-md-4">
                                                    {!! Form::radio('roles[]', $Roless->id, false, array('class'=>'name'), ['class'=>'form-check-input']) !!}
                                                    {{$Roless->name}}
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h6>Permission</h6>
                                    </div>
                                    @foreach ($Permission as $Permissions)
                                        <ul class="list-group list-group-flush" id="list_item">
                                            <li class="list-group-item">
                                                <div class="col-md-4">
                                                    {!! Form::checkbox('permissions[]', $Permissions->id, false, array('class'=>'name'), ['class'=>'form-check-input']) !!}
                                                    {{$Permissions->name}}
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showHide() {
            var main = document.getElementById('main');
            var linking = document.getElementById('linking');
            linking.hidden = false;
            main.hidden = true;
        }

        function hideShow() {
            var main = document.getElementById('main');
            var linking = document.getElementById('linking');
            linking.hidden = true;
            main.hidden = false;
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
