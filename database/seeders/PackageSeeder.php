<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        Package::truncate();

        $features = ['Responsive Design', 'SEO Optimization', 'CMS Admin Panel', 'Free Domain & Hosting', '24/7 Support'];

        Package::create([
            'name' => 'Starter',
            'price' => 3000000,
            'features' => array_slice($features, 0, 3),
            'is_popular' => false,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20mau%20paket%20Starter',
        ]);

        Package::create([
            'name' => 'Professional',
            'price' => 7500000,
            'features' => $features,
            'is_popular' => true, // Ini akan menyala
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20mau%20paket%20Pro',
        ]);

        Package::create([
            'name' => 'Enterprise',
            'price' => 15000000,
            'features' => array_merge($features, ['Custom API Integration', 'Mobile App']),
            'is_popular' => false,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20mau%20paket%20Enterprise',
        ]);
    }
}
