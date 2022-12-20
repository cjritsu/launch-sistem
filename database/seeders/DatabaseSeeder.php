<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusKaryawanSeeder::class,
            JenisCutiSeeder::class,
            Jenis_Izin::class,
            UnitKerjaSeeder::class,
            DepartemenSeeder::class,
            RoleAndPermissionSeeder::class,
            UsersTableSeeder::class,
            StatusCutiSeeder::class,
            KaryawanSeeder::class
        ]);
    }
}
