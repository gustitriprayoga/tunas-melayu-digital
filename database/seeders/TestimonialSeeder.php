<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::truncate();

        $reviews = [
            [
                'name' => 'Eka Pratama',
                'role' => 'CTO at TechNusa',
                'text' => 'Gila! Sistem yang dibangun Tunas Melayu Digital benar-benar beyond expectation. Performanya sangat cepat dan desain UI-nya futuristik abis.',
                'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1000'
            ],
            [
                'name' => 'Jessica Tan',
                'role' => 'Founder KopiKini',
                'text' => 'Website kafe saya jadi viral berkat desain yang mereka buat. Animasi scroll-nya bikin pelanggan betah lama-lama di website.',
                'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1000'
            ],
            [
                'name' => 'David Hakim',
                'role' => 'Director GlobalCorp',
                'text' => 'Profesionalisme tingkat tinggi. Mereka mengerti kebutuhan enterprise dan security. Sangat merekomendasikan layanan Enterprise mereka.',
                'img' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1000'
            ],
            [
                'name' => 'Siti Aminah',
                'role' => 'Marketing Manager',
                'text' => 'Tim supportnya juara! Balas chat WA hitungan detik, dan solusinya selalu tepat. Terima kasih Tunas Digital!',
                'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1000'
            ],
            [
                'name' => 'Reza Rahardian',
                'role' => 'Indie Game Dev',
                'text' => 'Saya minta dibuatkan landing page untuk game saya dengan style Cyberpunk, dan hasilnya... Mind blowing! Efek neon-nya kerasa banget.',
                'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=1000'
            ],
        ];

        foreach ($reviews as $r) {
            $t = Testimonial::create([
                'name' => $r['name'],
                'position' => $r['role'],
                'company' => 'Startup',
                'content' => $r['text'],
                'rating' => 5,
                'is_featured' => true,
            ]);
            try {
                $t->addMediaFromUrl($r['img'])->toMediaCollection('avatar');
            } catch (\Exception $e) {
            }
        }
    }
}
