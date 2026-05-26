<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\HomePage;
use App\Models\Service;
use App\Models\Portfolio;

class Home extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.home', [
            // 1. Ambil Data Homepage (Hero, Stats)
            'page' => HomePage::settings(),

            // 2. Ambil 3 Layanan Unggulan
            'services' => Service::where('is_active', true)->take(3)->get(),

            // 3. Ambil Portfolio Terbaru
            'portfolios' => Portfolio::latest()->take(4)->get(),

            // 4. Testimonials
            'testimonials' => \App\Models\Testimonial::latest()->take(6)->get(),
        ]);
    }
}
