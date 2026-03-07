<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomePage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public static function settings()
    {
        return static::firstOrCreate(['id' => 1], [
            'hero_title' => 'NEXT LEVEL DIGITAL',
            'hero_subtitle' => 'Membangun ekosistem digital masa depan.',
            'cta_text' => 'Hubungi Kami',
            'stats_clients' => 0,
            'stats_projects' => 0,
            'stats_years' => 0,
        ]);
    }

    // WAJIB: Tentukan koleksi media dan disk yang digunakan
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero')
            ->useDisk('public') // Pastikan pakai disk public
            ->singleFile();
    }
}
