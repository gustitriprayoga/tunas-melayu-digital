<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,      // Wajib dijalankan duluan (bikin Role)
            AdminUserSeeder::class,   // Dijalankan kedua (bikin User + Assign Role)

            HomePageSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            AboutSeeder::class,
            SocialLinkSeeder::class,
            PackageSeeder::class,
            MusicSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
