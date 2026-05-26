<?php

namespace App\Livewire\Admin\Pages;

use App\Models\HomePage;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.index', [
            'page' => HomePage::firstOrCreate(['id' => 1]),
        ])
            ->layout('layouts.admin.app', ['title' => 'Home Page']);
    }
}
