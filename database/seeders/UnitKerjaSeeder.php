<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit_Kerja;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_kerja = new Unit_Kerja(['name'=>'Admin']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'BSTI']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'SDM']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'BAA']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Rektorat']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'BAK']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'BPH']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Fakultas Bisnis']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Fakultas Humaniora']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Fakultas Sains']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'OB']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'LP3KM']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'LPM']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Marketing']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Perpustakaan']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'PDPT']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Satpam']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Training center']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Umum']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Warek III']);$unit_kerja->save();
        $unit_kerja = new Unit_Kerja(['name'=>'Digital Creative']);$unit_kerja->save();
    }
}
