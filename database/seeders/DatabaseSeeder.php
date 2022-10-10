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
            DepartemenSeeder::class,
            JenisCutiSeeder::class,
            UnitKerjaSeeder::class,
            UsersTableSeeder::class,
            StatusCutiSeeder::class,
            KaryawanSeeder::class,
            RoleAndPermissionSeeder::class,
        ]);
    }
}
