<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function deletePackage($id)
    {
        Package::find($id)->delete();
        $this->dispatch('notify', ['message' => 'Package deleted successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.packages.index', [
            'packages' => Package::where('name', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ])
            ->layout('layouts.admin.app', ['title' => 'Pricing Packages']);
    }
}
