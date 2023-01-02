<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_Kerja extends Model
{
    protected $table = 'unit_kerjas';
    use HasFactory;
    public function Karyawan() {
        return $this->hasMany('App\Models\Karyawan', 'id', 'unit_kerja_id');
    }

    public function Pengajuan_Cuti() {
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'unit_kerja_id');
    }

    public function SuratIzin() {
        return $this->hasMany('App\Models\SuratIzin', 'id', 'unit_kerja_id');
    }

    public function Pengajuan_Absen() {
        return $this->hasMany('App\Models\Pengajuan_Absen', 'id', 'unit_kerja_id');
    }
}
