<?php

namespace App\Livewire\Services;

use Livewire\Component;
use App\Models\Service;
use Livewire\Attributes\Title;

class Index extends Component
{
    #[Title('Layanan & Keahlian - Tunas Melayu Digital')]
    public function render()
    {
        return view('livewire.services.index', [
            // Mengambil semua layanan aktif
            'services' => Service::where('is_active', true)->get()
        ]);
    }
}
