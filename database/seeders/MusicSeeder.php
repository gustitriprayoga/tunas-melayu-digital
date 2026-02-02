<?php

namespace Database\Seeders;

use App\Models\BackgroundMusic;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        BackgroundMusic::truncate();

        // OPSI 2: Sci-Fi Ambient (Lebih tenang, misterius)
        BackgroundMusic::create([
            'title' => 'Space Technology',
            'artist' => 'Lexin Music',
            'file_url' => 'https://cdn.pixabay.com/download/audio/2022/01/18/audio_d0a13f69d2.mp3?filename=space-technology-15822.mp3',
            'is_active' => true,
        ]);

        // OPSI 3: Future Bass (Modern, Energik)
        BackgroundMusic::create([
            'title' => 'Future Artificial',
            'artist' => 'Oneten',
            'file_url' => 'https://cdn.pixabay.com/download/audio/2021/09/06/audio_2718e31288.mp3?filename=future-artificial-intelligence-11091.mp3',
            'is_active' => false,
        ]);
    }
}
