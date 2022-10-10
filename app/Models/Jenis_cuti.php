<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_cuti extends Model
{
    protected $table = 'jenis_cutis';
    use HasFactory;
    public function Pengajuan_Cuti()
    {
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'jenis_cuti_id');
    }
}
