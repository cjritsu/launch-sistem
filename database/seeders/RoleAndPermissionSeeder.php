<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $staffRole = Role::create(['name' => 'Staff']);
        $headRole = Role::create(['name' => 'Kepala Unit']);
        $rektorRole = Role::create(['name' => 'Rektorat']);
        $hrdRole = Role::create(['name' => 'HRD']);

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-profile']);
        Permission::create(['name' => 'edit-profile']);
        Permission::create(['name' => 'delete-profile']);

        Permission::create(['name' => 'create-surat']);
        Permission::create(['name' => 'edit-surat']);
        Permission::create(['name' => 'delete-surat']);
        Permission::create(['name' => 'validasi-surat']);
        Permission::create(['name' => 'validasi-kp']);
        Permission::create(['name' => 'validasi-hrd']);
        Permission::create(['name' => 'validasi-rek']);

        Permission::create(['name' => 'full-access']);
        Permission::create(['name' => 'reset_jatah_cuti']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-profile',
            'edit-profile',
            'delete-profile',
            'create-surat',
            'edit-surat',
            'delete-surat',
            'validasi-surat',
            'validasi-kp',
            'validasi-hrd',
            'validasi-rek',
            'full-access',
            'reset_jatah_cuti'
        ]);

        $staffRole->givePermissionTo([
            'edit-profile',
            'create-surat',
            'edit-surat',
        ]);

        $headRole->givePermissionTo([
            'create-surat',
            'edit-surat',
            'validasi-kp',
            'validasi-surat',
        ]);

        $rektorRole->givePermissionTo([
            'create-surat',
            'edit-surat',
            'validasi-rek',
            'validasi-surat',
        ]);

        $hrdRole->givePermissionTo([
            'create-profile',
            'edit-profile',
            'create-surat',
            'edit-surat',
            'validasi-hrd',
            'validasi-surat',
            'reset_jatah_cuti'
        ]);
    }
}
