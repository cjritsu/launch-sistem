<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Cuti extends Model
{
    protected $table = 'pengajuan__cutis';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenis_cuti_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'keterangan',
        'status_id',
    ];

    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Karyawan(){
        return $this->belongsTo('App\Models\Karyawan');
    }

    public function Jenis_cuti(){
        return $this->belongsTo('App\Models\Jenis_cuti', 'jenis_cuti_id', 'id');
    }

    public function status_cuti(){
        return $this->belongsTo('App\Models\status_cuti', 'status_id', 'id');
    }
}
