@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
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
                        <img src="{{ asset('header/' . auth()->user()->header) }}" alt="{{ auth()->user()->header }}" class="header">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <img class="avatar border-gray" src="{{ asset('avatar/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->avatar }}">
                            <h5 class="title text-primary">{{ __(auth()->user()->name)}}</h5>
                        </div>
                        <p class="description text-center">
                            NIP : {{ __(auth()->user()->nip) }}
                            @foreach ($karyawans as $karyawans)
                                <br>Unit Kerja : {{ __($karyawans->Unit_Kerja->name)}}
                                <br>Sisa Jatah Cuti : {{ __(auth()->user()->jatah_cuti)}}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 text-center">
                <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Edit Profile') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="file" name="avatar" class="form-control" value="old({{auth()->user()->avatar}})" id="avatar" hidden>
                                        <input type="file" name="header" class="form-control" value="{{ auth()->user()->header }}" id="header" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('NIP') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" value="{{ auth()->user()->nip }}" disabled>
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
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ auth()->user()->name }}" disabled>
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
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">
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
        var cropper;
        var reader;
        var file;
        var url;

        $('.avatar').click(function(){
            $('#avatar').trigger('click');
        });

        $('#avatar').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#Croppable').on('shown.bs.modal', function(){
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function(){
            cropper.destroy();
            cropper = null;
        });

        $('.header').click(function(){
            $('#header').trigger('click');
        });

        $('#header').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.header').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    </script>
@endpush
