<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function deletePortfolio($id)
    {
        Portfolio::find($id)->delete();
        $this->dispatch('notify', ['message' => 'Portfolio deleted successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.portfolio.index', [
            'portfolios' => Portfolio::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('client_name', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ])
            ->layout('layouts.admin.app', ['title' => 'Portfolios']);
    }
}
