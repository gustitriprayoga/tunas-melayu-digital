<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;
use App\Models\Portfolio;
use Livewire\Attributes\Title;

class Index extends Component
{
    public $filter = 'All';

    #[Title('Karya & Studi Kasus - Tunas Melayu Digital')]
    public function render()
    {
        // 1. Ambil semua data
        $allPortfolios = Portfolio::latest()->get();

        // 2. Ambil Unique Tech Stack untuk Filter Menu
        // (Menggabungkan semua array tech_stack menjadi satu list unik)
        $tags = $allPortfolios->pluck('tech_stack')->flatten()->unique()->values()->take(5); // Ambil 5 tag teratas saja agar rapi

        // 3. Filter Data sesuai pilihan user
        $portfolios = $allPortfolios;
        if ($this->filter !== 'All') {
            $portfolios = $allPortfolios->filter(function ($item) {
                return in_array($this->filter, $item->tech_stack ?? []);
            });
        }

        return view('livewire.portfolio.index', [
            'portfolios' => $portfolios,
            'tags' => $tags
        ]);
    }

    public function setFilter($tag)
    {
        $this->filter = $tag;
    }
}
