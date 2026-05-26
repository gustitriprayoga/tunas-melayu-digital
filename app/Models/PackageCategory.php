<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    protected $guarded = [];

    public function packages()
    {
        return $this->hasMany(Package::class, 'package_category_id');
    }
}
