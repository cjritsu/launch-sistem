<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departemens')->insert([
            'name' => 'BSTI',
        ]);
        DB::table('departemens')->insert([
            'name' => 'Marketing',
        ]);
        DB::table('departemens')->insert([
            'name' => 'HRD',
        ]);
    }
}
