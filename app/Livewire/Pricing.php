<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\PackageCategory;
use Livewire\Attributes\Title;

class Pricing extends Component
{
    #[Title('Paket Harga - Tunas Melayu Digital')]
    public function render()
    {
        return view('livewire.pricing', [
            'categories' => PackageCategory::where('is_active', true)->orderBy('sort_order', 'asc')->get(),
            'packages' => Package::all()
        ]);
    }
}
