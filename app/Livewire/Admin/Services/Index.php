<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteService($id)
    {
        Service::find($id)->delete();
        $this->dispatch('notify', ['message' => 'Service deleted successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.services.index', [
            'services' => Service::where('title', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ])
            ->layout('layouts.admin.app', ['title' => 'Services']);
    }
}
