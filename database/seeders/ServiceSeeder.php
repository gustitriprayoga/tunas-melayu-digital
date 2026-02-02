<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        $services = [
            [
                'title' => 'Web App Development',
                'icon' => 'heroicon-o-code-bracket-square', // Icon coding
                'short_description' => 'Membangun aplikasi web skala enterprise dengan Laravel & React yang cepat, aman, dan scalable.',
            ],
            [
                'title' => 'Mobile Applications',
                'icon' => 'heroicon-o-device-phone-mobile', // Icon HP
                'short_description' => 'Aplikasi Android & iOS native menggunakan Flutter dengan performa tinggi dan animasi halus.',
            ],
            [
                'title' => 'UI/UX Design',
                'icon' => 'heroicon-o-paint-brush', // Icon Design
                'short_description' => 'Perancangan antarmuka futuristik yang memanjakan mata user dan meningkatkan konversi penjualan.',
            ],
            [
                'title' => 'Cloud Infrastructure',
                'icon' => 'heroicon-o-cloud', // Icon Cloud
                'short_description' => 'Setup server AWS/DigitalOcean yang tangguh, auto-scaling, dan siap menangani jutaan request.',
            ],
            [
                'title' => 'Cyber Security',
                'icon' => 'heroicon-o-shield-check', // Icon Shield
                'short_description' => 'Audit keamanan sistem dan implementasi proteksi berlapis untuk data sensitif perusahaan Anda.',
            ],
            [
                'title' => 'AI & Machine Learning',
                'icon' => 'heroicon-o-cpu-chip', // Icon Chip
                'short_description' => 'Integrasi kecerdasan buatan untuk automasi bisnis dan analisis data yang mendalam.',
            ],
        ];

        foreach ($services as $data) {
            Service::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'icon' => $data['icon'],
                'short_description' => $data['short_description'],
                'full_content' => '<h1>Detail Layanan</h1><p>Ini adalah konten lengkap untuk layanan ' . $data['title'] . '.</p>',
                'is_active' => true,
            ]);
        }
    }
}
