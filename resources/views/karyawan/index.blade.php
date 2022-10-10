@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profile Management</h3>
                                </div>
                                @can('create-users')
                                    <div class="col-4 text-right">
                                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Departemen</th>
                                        <th>Unit Kerja</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        {{-- @foreach ($users as $users)
                                            <tr>
                                                <td></td>
                                                <td>{{ $users->nip }}</td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>
                                                    @if(!empty($users->getRoleNames()))
                                                    @foreach($users->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="user/{{ $users->id }}/edit" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Edit</a>
                                                    @component('partials.delete_form')
                                                        @slot('route')
                                                            {{ route('user.destroy', $users,  ['id' => $users->id]) }}
                                                        @endslot
                                                        @slot('id')
                                                            {{ $users->id }}
                                                        @endslot
                                                    @endcomponent
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
