<div class="form-group">
    {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    @if (auth()->user()->HasRole('Admin'))
        <div class="col-md-4">
        {{ Form::select('user_id', $user_id, $Pengajuan_cuti->user_id ?? old('user_id'), ['class'=>'form-control']) }}
        </div>
    @else
        <div class="col-md-4">
            {{ Form::text('user_id', $Pengajuan_cuti->user_id ?? $user, ['readonly','class'=>'form-control', 'hidden']) }}
            {!! Form::text('user_name', auth()->user()->name, ['readonly', 'class' => 'form-control']) !!}
        </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('unit_kerja', 'Unit Kerja &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        @if (auth()->user()->HasRole('Admin'))
            {{ Form::select('unit_kerja', $unit_kerja, $Pengajuan_cuti->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control']) }}
        @else
            @foreach ($karyawan as $karyawans)
                {{ Form::text('unit_kerja', $Pengajuan_cuti->unit_kerja_id ?? $karyawans->unit_kerja_id, ['hidden', 'readonly','class'=>'form-control']) }}
                {!! Form::text('unit', $karyawans->Unit_Kerja->name, ['readonly', 'class' => 'form-control']) !!}
            @endforeach
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('jenis_cuti', 'Jenis Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('jenis_cuti_id', $jenis_cuti_id, $Pengajuan_cuti->jenis_cuti_id ?? old('jenis_cuti_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_mulai', 'Tanggal Mulai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::date('tanggal_mulai', $Pengajuan_Cuti->tanggal_mulai ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_akhir', 'Tanggal Selesai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::date('tanggal_akhir', $Pengajuan_Cuti->tanggal_akhir ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::date('tanggal_masuk', $Pengajuan_Cuti->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::textarea('keterangan', $Pengajuan_Cuti->keterangan ?? null, ['placeholder'=>'Training','class'=>'form-control']) }}
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
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
