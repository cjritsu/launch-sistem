<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StatusKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_karyawans')->insert([
            'name'=>'Karyawan Kontrak'
        ]);

        DB::table('status_karyawans')->insert([
            'name'=>'Karyawan Tetap'
        ]);

        DB::table('status_karyawans')->insert([
            'name'=>'Keluar'
        ]);
    }
}
