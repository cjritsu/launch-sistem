<div class="form-group">
    {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    @if (auth()->user()->roles_id == 1)
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
    {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('keterangan', $Pengajuan_Cuti->keterangan ?? null, ['placeholder'=>'Training','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('status_cuti', 'Status Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('status_id', $status_id, $Pengajuan_cuti->status_id ?? old('status_id'), ['class'=>'form-control', 'disabled' => 'true']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
