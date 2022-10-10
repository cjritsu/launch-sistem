<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_cuti extends Model
{
    protected $table = 'status_cutis';
    use HasFactory;
    public function Pengajuan_Cuti()
    {
        return $this->hasMany('App\Models\Pengajuan_Cuti', 'id', 'status_id');
    }
}
