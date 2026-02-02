<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomePage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    // Trik agar model ini selalu mengambil ID 1 (Singleton)
    public static function settings(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'hero_title' => 'Transformasi Ide Menjadi Realitas Digital',
            'hero_subtitle' => 'Kami membantu bisnis Anda berkembang dengan teknologi web dan mobile terkini.',
        ]);
    }
}
