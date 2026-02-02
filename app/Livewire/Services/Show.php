<?php

namespace App\Livewire\Services;

use Livewire\Component;
use App\Models\Service;
use Livewire\Attributes\Title;

class Show extends Component
{
    public Service $service;
    public ?Service $nextService = null;
    public ?Service $prevService = null;

    public function mount($slug)
    {
        // 1. Ambil data service utama
        $this->service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // 2. Ambil Next & Prev Service untuk navigasi footer
        $this->nextService = Service::where('is_active', true)
            ->where('id', '>', $this->service->id)
            ->orderBy('id', 'asc')
            ->first();

        // Jika tidak ada next, ambil yang pertama (Looping)
        if (!$this->nextService) {
            $this->nextService = Service::where('is_active', true)->orderBy('id', 'asc')->first();
        }
    }

    public function render()
    {
        return view('livewire.services.show')
            ->title($this->service->title . ' - Tunas Melayu Digital');
    }
}
