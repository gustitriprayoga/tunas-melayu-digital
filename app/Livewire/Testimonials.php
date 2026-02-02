<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Title;

class Testimonials extends Component
{
    #[Title('Apa Kata Mereka - Tunas Melayu Digital')]
    public function render()
    {
        return view('livewire.testimonials', [
            'testimonials' => Testimonial::latest()->get()
        ]);
    }
}
