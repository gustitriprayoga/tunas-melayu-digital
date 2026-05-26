<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks for clean truncation
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\PackageCategory::truncate();
        Package::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // Seed Categories
        $webCategory = \App\Models\PackageCategory::create([
            'name' => 'Website Development',
            'slug' => 'website',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $jasaCategory = \App\Models\PackageCategory::create([
            'name' => 'IT Support & Jasa',
            'slug' => 'jasa',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $features = ['Responsive Design', 'SEO Optimization', 'CMS Admin Panel', 'Free Domain & Hosting', '24/7 Support'];

        Package::create([
            'package_category_id' => $webCategory->id,
            'name' => 'Starter',
            'category' => 'website',
            'price' => 3000000,
            'features' => array_slice($features, 0, 3),
            'is_popular' => false,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20mau%20paket%20Starter',
        ]);

        Package::create([
            'package_category_id' => $webCategory->id,
            'name' => 'Professional',
            'category' => 'website',
            'price' => 7500000,
            'features' => $features,
            'is_popular' => true,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20mau%20paket%20Pro',
        ]);

        Package::create([
            'package_category_id' => $webCategory->id,
            'name' => 'Enterprise',
            'category' => 'website',
            'price' => 15000000,
            'features' => array_merge($features, ['Custom API Integration', 'Mobile App']),
            'is_popular' => false,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20mau%20paket%20Enterprise',
        ]);

        // Jasa / IT Support Services
        Package::create([
            'package_category_id' => $jasaCategory->id,
            'name' => 'Install OS & Software',
            'category' => 'jasa',
            'price' => 150000,
            'period' => '/ unit',
            'features' => [
                'Windows 10/11 Pro Activation',
                'Essential Drivers & Hardware setup',
                'Standard Apps (Office, PDF, Browser)',
                'Full System Security & Antivirus',
                '1-Week Guarantee Support'
            ],
            'is_popular' => false,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20Jasa%20Install%20OS%20dan%20Software',
        ]);

        Package::create([
            'package_category_id' => $jasaCategory->id,
            'name' => 'Rakit Komputer (PC)',
            'category' => 'jasa',
            'price' => 250000,
            'period' => '/ PC',
            'features' => [
                'Professional Assembly & Cable Management',
                'High-Quality Thermal Paste Application',
                'BIOS Configuration & Tuning',
                '2-Hour Stress & Stability Testing',
                'Component Compatibility Consultation'
            ],
            'is_popular' => true,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20Jasa%20Rakit%20Komputer',
        ]);

        Package::create([
            'package_category_id' => $jasaCategory->id,
            'name' => 'Maintenance & Cleaning',
            'category' => 'jasa',
            'price' => 350000,
            'period' => '/ device',
            'features' => [
                'Deep Dust Cleaning (Physical Parts)',
                'Premium Thermal Paste Replacement',
                'OS & Disk Cleanup / Optimization',
                'Full Hardware Health Check',
                'Data Backup Consultation'
            ],
            'is_popular' => false,
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20Jasa%20Maintenance%20dan%20Cleaning',
        ]);
    }
}
