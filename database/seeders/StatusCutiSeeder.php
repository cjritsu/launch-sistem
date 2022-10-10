<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StatusCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_cutis')->insert([
            'name' => 'Pending',
        ]);
        DB::table('status_cutis')->insert([
            'name' => 'Diterima',
        ]);
        DB::table('status_cutis')->insert([
            'name' => 'Ditolak',
        ]);
    }
}
