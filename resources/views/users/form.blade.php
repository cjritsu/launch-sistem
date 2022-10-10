<div class="card-body ">
    <form>
        <div class="input-group{{ $errors->has('nip') ? ' has-danger' : '' }} col-md-4">
            <input name="nip" type="text" class="form-control" placeholder="NIP" required value="{{ old('nip') }}">
            @if ($errors->has('nip'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('nip') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-4">
            <input name="email" type="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-4">
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group col-md-4">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation" required>
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
            <label class="form-check-label">
                <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox">
                <span class="form-check-sign"></span>
                    {{ __('I agree to the') }}
                <a href="#something">{{ __('terms and conditions') }}</a>.
            </label>
            @if ($errors->has('agree_terms_and_conditions'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('agree_terms_and_conditions') }}</strong>
                </span>
            @endif
            <div class="card-footer col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
            </div>
        </div>
    </form>
</div>
