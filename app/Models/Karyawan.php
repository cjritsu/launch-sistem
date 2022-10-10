<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawans';
    use HasFactory;
    public function User()
    {
        return $this->hasMany('App\Models\User');
    }

    public function Pengajuan_Cuti()
    {
        return $this->hasMany('App\Models\Pengajuan_Cuti');
    }

    public function Departemen()
    {
        return $this->belongsTo('App\Models\Departemen', 'departemen_id', 'id');
    }

    public function Unit_Kerja()
    {
        return $this->belongsTo('App\Models\Unit_Kerja', 'unit_kerja_id', 'id');
    }

    public function status_karyawan()
    {
        return $this->belongsTo('App\Models\status_karyawan', 'status_karyawan_id', 'id');
    }
}
