<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Reset Data Lama
        HomePage::truncate();

        // 2. Buat Data Baru
        $home = HomePage::create([
            'hero_title' => 'We Build The Future',
            'hero_subtitle' => 'Mitra transformasi digital yang mengubah ide gila menjadi realitas kode. Fokus pada performa, estetika, dan skalabilitas tanpa batas.',
            'cta_text' => 'Mulai Transformasi',
            'cta_link' => '/contact',

            // Statistik untuk Bento Grid
            'stats_clients' => 120,    // 120+ Clients
            'stats_projects' => 250,   // 250+ Projects
            'stats_years' => 5,        // 5 Years
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Dummy
        ]);

        // 3. Tambahkan Gambar Hero (Background) dari URL Publik
        // Kita pakai gambar bernuansa Dark/Cyber dari Unsplash
        try {
            $home->addMediaFromUrl('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070&auto=format&fit=crop')
                ->toMediaCollection('hero');
        } catch (\Exception $e) {
            // Abaikan jika gagal download (misal offline)
        }
    }
}
