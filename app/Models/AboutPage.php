<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];
    protected $casts = [
        'core_values' => 'array',
    ];

    // Singleton Pattern
    public static function settings(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'hero_title' => 'We Are The Future',
            'hero_subtitle' => 'Membangun teknologi yang memanusiakan manusia.',
            'vision' => 'Menjadi pemimpin ekosistem digital global.',
            'mission' => 'Menciptakan solusi inovatif yang berdampak nyata.',
            'core_values' => ['Innovation', 'Trust', 'Excellence'],
        ]);
    }
}
