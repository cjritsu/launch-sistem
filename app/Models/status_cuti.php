<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_cuti extends Model
{
    protected $table = 'status_surat';
    use HasFactory;
    public function Pengajuan_Cuti()
    {
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_rek');
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_kp');
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_hrd');
    }

    public function SuratIzin()
    {
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_rek');
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_kp');
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_hrd');
    }

    public function Pengajuan_Absen()
    {
        return $this->hasMany('App\Models\Pengajuan_Absen', 'id', 'status_rek');
        return $this->hasMany('App\Models\Pengajuan_Absen', 'id', 'status_kp');
        return $this->hasMany('App\Models\Pengajuan_Absen', 'id', 'status_hrd');
    }
}
