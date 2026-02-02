<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use Livewire\Attributes\Title;

class Pricing extends Component
{
    #[Title('Paket Harga - Tunas Melayu Digital')]
    public function render()
    {
        return view('livewire.pricing', [
            'packages' => Package::all()
        ]);
    }
}
