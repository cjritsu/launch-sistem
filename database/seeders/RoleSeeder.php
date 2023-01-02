<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);$user->assignRole('Kepala Unit');
        $user = User::find(2);$user->assignRole('Kepala Unit');
        $user = User::find(3);$user->assignRole('Staff');
    }
}
