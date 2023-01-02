<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Izin extends Model
{
    protected $table = 'jenis__izins';
    use HasFactory;
    public function SuratIzin(){
        return $this->hasMany('App\Models\SuratIzin', 'id', 'jenis_izin_id');
    }
}
