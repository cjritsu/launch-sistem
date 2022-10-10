<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            'user_id' => '2',
            'jenis_kelamin' => 'Wanita',
            'tanggal_lahir' => now(),
            'no_telp' => '087181418181',
            'alamat' => 'Villa Melati Mas',
            'departemen_id' => '1',
            'unit_kerja_id' => '2',
            'status_karyawan_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
