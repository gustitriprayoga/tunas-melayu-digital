<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\BackgroundMusic;

class AudioPlayer extends Component
{
    public function render()
    {
        // Ambil lagu aktif pertama
        $music = BackgroundMusic::where('is_active', true)->first();

        return view('livewire.components.audio-player', [
            'music' => $music
        ]);
    }
}
