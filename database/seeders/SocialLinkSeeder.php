<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        SocialLink::truncate();

        SocialLink::create([
            'name' => 'Discord',
            'url' => 'https://discord.gg/tunasmelayu',
            'icon' => 'heroicon-o-chat-bubble-left-right', // Nanti kita handle icon khusus
            'color' => '#5865F2',
            'username' => 'Join Community',
        ]);

        SocialLink::create([
            'name' => 'GitHub',
            'url' => 'https://github.com/tunasmelayu',
            'icon' => 'heroicon-o-code-bracket',
            'color' => '#ffffff',
            'username' => '@tunasmelayu',
        ]);

        SocialLink::create([
            'name' => 'Instagram',
            'url' => 'https://instagram.com',
            'icon' => 'heroicon-o-camera',
            'color' => '#E1306C',
            'username' => '@tunas.digital',
        ]);

        SocialLink::create([
            'name' => 'LinkedIn',
            'url' => 'https://linkedin.com',
            'icon' => 'heroicon-o-briefcase',
            'color' => '#0077B5',
            'username' => 'Tunas Melayu Digital',
        ]);
    }
}
