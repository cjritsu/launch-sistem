<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzin extends Model
{
    protected $table = 'pengajuan_izins';
    use HasFactory;

    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Karyawan(){
        return $this->belongsTo('App\Models\Karyawan');
    }

    public function Unit_Kerja(){
        return $this->belongsTo('App\Models\Unit_Kerja', 'unit_kerja_id', 'id');
    }

    public function Jenis_Izin(){
        return $this->belongsTo('App\Models\Jenis_Izin', 'jenis_izin_id', 'id');
    }

    public function status_cuti(){
        return $this->belongsTo('App\Models\status_cuti', 'status_hrd', 'id');
        return $this->belongsTo('App\Models\status_cuti', 'status_rek', 'id');
        return $this->belongsTo('App\Models\status_cuti', 'status_kp', 'id');
    }
}
