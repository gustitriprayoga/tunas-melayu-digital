<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia; // 1. Pastikan ini di-import
use Spatie\MediaLibrary\InteractsWithMedia;

// 2. Tambahkan 'implements HasMedia' di sini
class Service extends Model implements HasMedia
{
    use InteractsWithMedia; // 3. Trait ini isinya fungsi-fungsi hasMedia tadi

    protected $guarded = [];

    protected $casts = [
        'faqs' => 'array',
        'tech_stack' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    // Biar Filament tau mau ambil gambar dari koleksi mana
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('service_images')->singleFile();
    }
}
