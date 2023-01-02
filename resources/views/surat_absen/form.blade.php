<div class="form-group">
    {{ Form::label('user_id', 'Nama Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    @if (auth()->user()->HasRole('Admin'))
        <div class="col-md-4">
        {{ Form::select('user_id', $user_id, $Pengajuan_Absen->user_id ?? old('user_id'), ['class'=>'form-control']) }}
        </div>
    @else
        <div class="col-md-4">
            {{ Form::text('user_id', $Pengajuan_Absen->user_id ?? $user, ['readonly','class'=>'form-control', 'hidden']) }}
            {!! Form::text('user_name', auth()->user()->name, ['readonly', 'class' => 'form-control']) !!}
        </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('unit_kerja', 'Unit Kerja &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        @if (auth()->user()->HasRole('Admin'))
            {{ Form::select('unit_kerja', $unit_kerja, $Pengajuan_Absen->unit_kerja_id ?? old('unit_kerja_id'), ['class'=>'form-control']) }}
        @else
            @foreach ($karyawan as $karyawans)
                {{ Form::text('unit_kerja', $Pengajuan_Absen->unit_kerja_id ?? $karyawans->unit_kerja_id, ['readonly','class'=>'form-control', 'hidden']) }}
                {!! Form::text('unit', $karyawans->Unit_Kerja->name, ['readonly', 'class' => 'form-control']) !!}
            @endforeach
        @endif
    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <div class="form-group col-md-2">
        {{ Form::label('tanggal_mulai', 'Tanggal Tidak Masuk Kerja &nbsp;', ['class'=>'control-label']) }}
        {{ Form::date('tanggal_absen_awal', $Pengajuan_Absen->tanggal_absen_awal ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('tanggal_akhir', '&nbsp;', ['class'=>'control-label']) }}
        {{ Form::date('tanggal_absen_akhir', $Pengajuan_Absen->tanggal_absen_akhir ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-row" style="padding-left: 15px">
    <div class="form-group col-md-2">
        {{ Form::label('tanggal_berita', 'Pemberitahuan Tidak Masuk &nbsp;', ['class'=>'control-label']) }}
        {{ Form::date('tanggal_berita', $Pengajuan_Absen->tanggal_berita ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
        @if ($errors->has('tanggal_berita'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('tanggal_berita') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('kepada_id', 'Kepada/Melalui &nbsp;', ['class'=>'control-label']) }}
        {!! Form::text('kepada_id', $Pengajuan_Absen->tinggalin_absen ?? null, ['placeholder'=>'Nama Orang','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_masuk', 'Tanggal Masuk Kembali &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::date('tanggal_masuk', $Pengajuan_Absen->tanggal_masuk ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
        @if ($errors->has('tanggal_masuk'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('tanggal_masuk') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('keterangan', 'Alasan Tidak Masuk &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {!! Form::textarea('keterangan', $Pengajuan_Absen->keterangan ?? null, ['placeholder'=>'Sakit','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {{ Form::label('surat_dokter', 'Jika Sakit, Surat Dokter &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4" onchange="showHide()">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="surat_dokter" id="radio_ada" value="Tersedia Surat Dokter">
            <label class="form-check-label" for="radio_ada">Ada</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="surat_dokter" id="radio_tdkada" value="Tidak Ada Surat Dokter">
            <label class="form-check-label" for="radio_tidakada">Tidak Ada</label>
        </div>
    </div>
    <div class="custom-file col-md-4" style="margin-left: 15px; display: none;" id="surat_bukti">
        {!! Form::file('surat_bukti', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
        {!! Form::label('customFile', 'Lampirkan Surat Dokter', ['class' => 'custom-file-label']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>

@push('scripts')
    <script>
        function showHide() {
            var surat_ada = document.getElementById('radio_ada');
            var bukti = document.getElementById('surat_bukti');
            if (surat_ada.checked == true) {
                bukti.style.display='block';
            }
            else {
                bukti.style.display='none';
            }
        }
    </script>
@endpush
