<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;
use App\Models\Portfolio;
use Livewire\Attributes\Title;

class Show extends Component
{
    public Portfolio $portfolio;
    public ?Portfolio $nextPortfolio = null;

    public function mount($slug)
    {
        $this->portfolio = Portfolio::where('slug', $slug)->firstOrFail();

        // Logika Next Project (Circular/Looping)
        $this->nextPortfolio = Portfolio::where('id', '>', $this->portfolio->id)
            ->orderBy('id', 'asc')
            ->first();

        if (!$this->nextPortfolio) {
            $this->nextPortfolio = Portfolio::orderBy('id', 'asc')->first();
        }
    }

    public function render()
    {
        return view('livewire.portfolio.show')
            ->title($this->portfolio->title . ' - Case Study');
    }
}
