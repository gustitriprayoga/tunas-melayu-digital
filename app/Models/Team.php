<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Team extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];
    protected $casts = [
        'social_links' => 'array',
        'is_active' => 'boolean',
    ];
}
