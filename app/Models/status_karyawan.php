<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_karyawan extends Model
{
    protected $table = 'status_karyawans';
    use HasFactory;
    public function Karyawan()
    {
        return $this->hasMany('App\Models\Karyawan', 'id', 'status_karyawan_id');
    }
}
