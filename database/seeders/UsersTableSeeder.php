<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'nip' => 'admin',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Staff San',
            'email' => 'staff@email.com',
            'email_verified_at' => now(),
            'nip' => 'staff',
            'password' => Hash::make('staff'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'HRD Sama',
            'email' => 'hrd@email.com',
            'email_verified_at' => now(),
            'nip' => 'hrd',
            'password' => Hash::make('hrd'),
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
