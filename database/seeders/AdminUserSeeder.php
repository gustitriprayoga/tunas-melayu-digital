<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = config('filament-shield.super_admin.name', 'super_admin');

        // Cek apakah role sudah ada (Safety check)
        if (!Role::where('name', $superAdminRole)->exists()) {
            $this->command->error("Role '{$superAdminRole}' belum ditemukan. Harap jalankan ShieldSeeder terlebih dahulu!");
            return;
        }

        // 1. Buat User Admin
        // Menggunakan firstOrCreate agar aman dijalankan berulang kali (tidak duplikat error)
        $user = User::firstOrCreate(
            ['email' => 'admin@qag-dev.com'], // Ganti dengan email login Anda
            [
                'name' => 'QAG Development', // Nama Tampilan
                'password' => Hash::make('password'), // Ganti password saat production
                'email_verified_at' => now(),
            ]
        );

        // 2. Assign Role Super Admin ke User
        if (!$user->hasRole($superAdminRole)) {
            $user->assignRole($superAdminRole);
            $this->command->info("User {$user->email} berhasil diberi akses Super Admin.");
        } else {
            $this->command->info("User {$user->email} sudah memiliki akses Super Admin.");
        }
    }
}
