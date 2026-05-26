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
        // Pastikan role 'admin' ada
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }

        // 1. Buat User Admin
        // Menggunakan firstOrCreate agar aman dijalankan berulang kali (tidak duplikat error)
        $user = User::firstOrCreate(
            ['email' => 'gustitriprayoga18@gmail.com'], // Ganti dengan email login Anda
            [
                'name' => 'Admin TMD 1', // Nama Tampilan
                'password' => Hash::make('Tiaku11!'), // Ganti password saat production
                'email_verified_at' => now(),
            ]
        );

        // 2. Assign Role Admin ke User
        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
            $this->command->info("User {$user->email} berhasil diberi akses Admin.");
        } else {
            $this->command->info("User {$user->email} sudah memiliki akses Admin.");
        }
    }
}
