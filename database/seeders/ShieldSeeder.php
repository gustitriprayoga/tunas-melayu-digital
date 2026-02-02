<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Reset Cache agar tidak error
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Definisikan Role Super Admin
        $superAdminName = config('filament-shield.super_admin.name', 'super_admin');

        $superAdminRole = Role::firstOrCreate([
            'name' => $superAdminName,
            'guard_name' => 'web'
        ]);

        // 3. Definisikan Permission Dasar Filament (Wajib ada agar panel bisa diakses)
        // Shield biasanya men-generate ini otomatis, tapi kita buat manual saja
        $permissions = [
            // Permission dasar untuk akses panel
            'page_View_GeneralSettings', // Untuk plugin setting Anda
            'page_View_Roles',           // Untuk melihat halaman Roles

            // Resource Permissions (Format Shield: view_any, create, update, delete, dll)
            // Tambahkan permission untuk resource User, Role, dll
            'view_any_user',
            'create_user',
            'update_user',
            'delete_user',

            'view_any_role',
            'create_role',
            'update_role',
            'delete_role',

            // Tambahkan permission resource lain jika sudah ada modelnya (misal: Service, Portfolio)
            // 'view_any_service', 'create_service', ...
        ];

        // 4. Insert Permission ke Database
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // 5. Berikan SEMUA Permission ke Super Admin
        // Cara cepat: Ambil semua permission yang ada di DB dan pasang ke Super Admin
        $allPermissions = Permission::all();
        $superAdminRole->syncPermissions($allPermissions);

        $this->command->info('Role & Permission manual berhasil dibuat tanpa stuck!');
    }
}
