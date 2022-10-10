<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_kerjas')->insert([
            'name' => 'BSTI',
        ]);
        DB::table('unit_kerjas')->insert([
            'name' => 'Assistant Lab',
        ]);
        DB::table('unit_kerjas')->insert([
            'name' => 'Admin',
        ]);
    }
}
