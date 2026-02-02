<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AboutPage;
use App\Models\Team;
use Livewire\Attributes\Title;

class About extends Component
{
    #[Title('Tentang Kami - Tunas Melayu Digital')]
    public function render()
    {
        return view('livewire.about', [
            'page' => AboutPage::settings(),
            'teams' => Team::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }
}
