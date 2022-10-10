<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_cutis')->insert([
            'name' => 'Cuti Tahunan',
        ]);
        DB::table('jenis_cutis')->insert([
            'name' => 'Cuti Khusus',
        ]);
    }
}
