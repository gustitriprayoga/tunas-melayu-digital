<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
    ];

    public function categoryRelation()
    {
        return $this->belongsTo(PackageCategory::class, 'package_category_id');
    }
}
