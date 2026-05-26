<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title = '';
    public $slug = '';
    public $client_name = '';
    public $tech_stack = [];
    public $url = '';
    public $description = '';
    public $portfolio_image;
    public $portfolio_image_preview = null;

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|unique:portfolios,title',
            'slug' => 'required|string|unique:portfolios,slug',
            'client_name' => 'nullable|string',
            'url' => 'nullable|url',
            'description' => 'required|string',
            'portfolio_image' => 'nullable|image|max:5120',
        ]);

        $portfolio = Portfolio::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'client_name' => $this->client_name,
            'tech_stack' => $this->tech_stack,
            'url' => $this->url,
            'description' => $this->description,
        ]);

        if ($this->portfolio_image) {
            $portfolio->addMedia($this->portfolio_image)
                ->toMediaCollection('portfolio_images');
        }

        session()->flash('success', 'Portfolio created successfully!');
        return $this->redirect(route('admin.portfolio.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.portfolio.form', [
            'isEdit' => false,
        ])
            ->layout('layouts.admin.app', ['title' => 'Create Portfolio']);
    }
}
