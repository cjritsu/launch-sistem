<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Absen extends Model
{
    protected $table = 'pengajuan__absens';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'unit_kerja_id',
        'tanggal_absen_awal',
        'tanggal_absen_akhir',
        'tanggal_berita',
        'tinggalin_absen',
        'tanggal_masuk',
        'keterangan',
        'image',
        'surat_dokter',
    ];

    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Karyawan(){
        return $this->belongsTo('App\Models\Karyawan');
    }

    public function Unit_Kerja(){
        return $this->belongsTo('App\Models\Unit_Kerja', 'unit_kerja_id', 'id');
    }

    public function status_cuti(){
        return $this->belongsTo('App\Models\status_cuti', 'status_hrd', 'id');
        return $this->belongsTo('App\Models\status_cuti', 'status_rek', 'id');
        return $this->belongsTo('App\Models\status_cuti', 'status_kp', 'id');
    }
}
