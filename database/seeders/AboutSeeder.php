<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\Team;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Setup About Page
        AboutPage::truncate();
        $about = AboutPage::create([
            'hero_title' => 'Architects of The Future',
            'hero_subtitle' => 'Kami adalah kumpulan pemimpi, insinyur, dan seniman yang percaya bahwa kode dapat mengubah dunia menjadi tempat yang lebih baik.',
            'story_content' => 'Bermula dari sebuah garasi kecil di Riau, Tunas Melayu Digital tumbuh menjadi kekuatan teknologi yang diperhitungkan. Kami tidak hanya mengikuti tren, kami menciptakannya.',
            'vision' => 'Menjadi katalis utama dalam revolusi industri 4.0 di Asia Tenggara dengan mengedepankan kearifan lokal dan teknologi global.',
            'mission' => "1. Memberikan solusi digital yang user-centric.\n2. Mengembangkan talenta IT lokal berstandar dunia.\n3. Membangun infrastruktur digital yang aman dan scalable.",
            'core_values' => [
                ['icon' => 'heroicon-o-light-bulb', 'title' => 'Innovation', 'desc' => 'Selalu mencari cara baru.'],
                ['icon' => 'heroicon-o-shield-check', 'title' => 'Integrity', 'desc' => 'Jujur dalam setiap baris kode.'],
                ['icon' => 'heroicon-o-rocket-launch', 'title' => 'Speed', 'desc' => 'Bergerak cepat, eksekusi tepat.'],
                ['icon' => 'heroicon-o-users', 'title' => 'Collaboration', 'desc' => 'Kuat karena bersama.'],
            ],
            'founded_year' => '2020',
        ]);

        // Coba attach gambar (opsional, akan skip jika gagal download)
        try {
            $about->addMediaFromUrl('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070')->toMediaCollection('about_hero');
        } catch (\Exception $e) {
        }

        // 2. Setup Teams
        Team::truncate();
        $teams = [
            ['name' => 'Alex Handoko', 'role' => 'Chief Executive Officer', 'img' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974'],
            ['name' => 'Sarah Wijaya', 'role' => 'Chief Technology Officer', 'img' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1976'],
            ['name' => 'Budi Santoso', 'role' => 'Head of Engineering', 'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070'],
            ['name' => 'Linda Kusuma', 'role' => 'Lead UI/UX Designer', 'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=1961'],
        ];

        foreach ($teams as $t) {
            $member = Team::create([
                'name' => $t['name'],
                'position' => $t['role'],
                'bio' => 'Berpengalaman lebih dari 10 tahun di industri teknologi dengan fokus pada skalabilitas sistem.',
                'social_links' => ['linkedin' => '#', 'github' => '#'],
            ]);
            try {
                $member->addMediaFromUrl($t['img'])->toMediaCollection('avatar');
            } catch (\Exception $e) {
            }
        }
    }
}
