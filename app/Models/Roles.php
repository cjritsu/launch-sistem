<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    use HasFactory;
    public function User() {
        return $this->hasMany('App\Models\User', 'id', 'roles_id');
    }
}
