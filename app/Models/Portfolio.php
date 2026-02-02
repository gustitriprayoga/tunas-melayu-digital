<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Portfolio extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'tech_stack' => 'array', // Wajib agar otomatis jadi Array saat dipanggil
    ];
}
