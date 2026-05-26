<?php

namespace App\Livewire\Admin;

use App\Models\HomePage;
use App\Models\Service;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'homePageCount' => HomePage::count(),
            'servicesCount' => Service::count(),
        ])
            ->layout('layouts.admin.app', [
                'title' => 'Dashboard'
            ]);
    }
}
