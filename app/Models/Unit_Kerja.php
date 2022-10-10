<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_Kerja extends Model
{
    protected $table = 'unit_kerjas';
    use HasFactory;
    public function User() {
        return $this->hasMany('App\Models\User', 'id', 'unit_kerja_id');
    }
}
