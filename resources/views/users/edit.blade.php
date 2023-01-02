@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Users Management</h5>
                        <p class="card-category">Perhatikan kembali pada bagian role</p>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="/user/{{ $user->id }}" class="form-horizontal">
                        @method('put')
                        @csrf
                            <div class="input-group{{ $errors->has('nip') ? ' has-danger' : '' }} col-md-4">
                                <input name="nip" type="text" class="form-control" placeholder="NIP" value="{{ $user->nip }}">
                                @if ($errors->has('nip'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $user->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-4">
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-4">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group col-md-4">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group col-md-4">
                                {!! Form::select('roles', $roles, $user->roles ?? old('roles'), ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-check text-left">
                                <div class="card-footer col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
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
