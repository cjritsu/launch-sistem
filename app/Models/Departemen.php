<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemens';
    use HasFactory;

    public function User() {
        return $this->hasMany('App\Models\User', 'id', 'departemen_id');
    }
}
