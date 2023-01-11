@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('header/' . $karyawans->User->header ) }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <img class="avatar border-gray" src="{{ asset('avatar/' . $karyawans->User->avatar) }}" alt="{{ $karyawans->User->avatar }}">
                            <h5 class="title">{{ __($karyawans->User->name)}}</h5>
                        </div>
                            <div class="descriptiion text-center">
                                <a href="{{ route('karyawan.index') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Return</a>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 text-center">
                <form class="col-md-12" action="{{route('karyawan.edit', $karyawans->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Edit Profile') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('NIP') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" value="{{ $karyawans->User->nip }}">
                                    </div>
                                    @if ($errors->has('nip'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Name') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $karyawans->User->name }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $karyawans->User->email }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Agama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{ $karyawans->agama }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Tempat, Tanggal Lahir') }}</label>
                                <div class="form-row col-md-9">
                                    <div class="col-md-4">
                                        <input type="text" name="tmpt_l" class="form-control" placeholder="Tempat Lahir" value="{{ $karyawans->tempat_lahir }}">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="date" name="tgl_l" class="form-control" placeholder="Tanggal Lahir" value="{{ $karyawans->tanggal_lahir }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('No. Telepon') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="no_hp" class="form-control" placeholder="No.Telp/No.HP" value="{{ $karyawans->no_telp }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Alamat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $karyawans->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Unit Kerja') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {{ Form::select('unit_kerja_id', $unit_kerja_id, $karyawans->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control']) }}

                                        @if ($errors->has('unit_kerja_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('unit_kerja_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Jabatan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {!! Form::select('jabatan_id', $jabatan_id, $karyawans->jabatan_id ?? old('jabatan_id'), ['class'=>'form-control jabatan_id']) !!}

                                        @if ($errors->has('jabatan_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('jabatan_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Jatah Cuti') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="jatah_cuti" class="form-control" placeholder="Jatah Cuti" value="{{ $user->jatah_cuti }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Status Karyawan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {{ Form::select('status_karyawan', $status_karyawan, $karyawans->status_karyawan_id ?? old('status_karyawan'), ['class'=>'form-control']) }}

                                        @if ($errors->has('status_karyawan'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('status_karyawan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Change Password') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $(".jabatan_id").select2({
                width: 'resolve'
            });
        });
    </script>
@endpush
