<div class="form-group">
    {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    @if (auth()->user()->HasRole('Admin'))
        <div class="col-md-4">
        {{ Form::select('user_id', $user_id, $SuratIzin->user_id ?? old('user_id'), ['class'=>'form-control']) }}
        </div>
    @else
        <div class="col-md-4">
            {{ Form::text('user_id', $SuratIzin->user_id ?? $user, ['readonly','class'=>'form-control', 'hidden']) }}
            {!! Form::text('user_name', auth()->user()->name, ['readonly', 'class' => 'form-control']) !!}
        </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('unit_kerja', 'Unit Kerja &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        @if (auth()->user()->HasRole('Admin'))
            {{ Form::select('unit_kerja', $unit_kerja, $SuratIzin->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control']) }}
        @else
            @foreach ($karyawan as $karyawans)
                {{ Form::text('unit_kerja', $SuratIzin->unit_kerja_id ?? $karyawans->unit_kerja_id, ['readonly','class'=>'form-control', 'hidden']) }}
                {!! Form::text('unit', $karyawans->Unit_Kerja->name, ['readonly', 'class' => 'form-control']) !!}
            @endforeach
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('jenis_izin', 'Jenis Izin &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('jenis_izin_id', $jenis_izin_id, $SuratIzin->jenis_izin_id ?? old('jenis_izin_id'), ['class'=>'form-control']) }}
        @if ($errors->has('jenis_izin_id'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('jenis_izin_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <div class="form-group col-md-2">
        {{ Form::label('tanggal_mulai', 'Tanggal Izin &nbsp;', ['class'=>'control-label']) }}
        {{ Form::date('tanggal_izin_awal', $SuratIzin->tanggal_izin_awal ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
        @if ($errors->has('tanggal_izin_awal'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('tanggal_izin_awal') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('tanggal_akhir', '&nbsp;', ['class'=>'control-label']) }}
        {{ Form::date('tanggal_izin_akhir', $SuratIzin->tanggal_izin_akhir ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
        @if ($errors->has('tanggal_izin_akhir'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('tanggal_izin_akhir') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::date('tanggal_masuk', $SuratIzin->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
        @if ($errors->has('tanggal_masuk'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('tanggal_masuk') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="form-group">
    {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {!! Form::textarea('keterangan', $SuratIzin->keterangan ?? null, ['placeholder'=>'Training','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
