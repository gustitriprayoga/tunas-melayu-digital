<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public Portfolio $portfolio;
    public $title = '';
    public $slug = '';
    public $client_name = '';
    public $tech_stack = [];
    public $url = '';
    public $description = '';
    public $portfolio_image;
    public $portfolio_image_preview;

    public function mount()
    {
        $this->title = $this->portfolio->title;
        $this->slug = $this->portfolio->slug;
        $this->client_name = $this->portfolio->client_name;
        $this->tech_stack = $this->portfolio->tech_stack ?? [];
        $this->url = $this->portfolio->url;
        $this->description = $this->portfolio->description;

        if ($this->portfolio->getFirstMedia('portfolio_images')) {
            $this->portfolio_image_preview = $this->portfolio->getFirstMedia('portfolio_images')->original_url;
        }
    }

    public function updatedTitle($value)
    {
        if ($this->slug === Str::slug($this->portfolio->title)) {
            $this->slug = Str::slug($value);
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|unique:portfolios,title,' . $this->portfolio->id,
            'slug' => 'required|string|unique:portfolios,slug,' . $this->portfolio->id,
            'client_name' => 'nullable|string',
            'url' => 'nullable|url',
            'description' => 'required|string',
            'portfolio_image' => 'nullable|image|max:5120',
        ]);

        $this->portfolio->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'client_name' => $this->client_name,
            'tech_stack' => $this->tech_stack,
            'url' => $this->url,
            'description' => $this->description,
        ]);

        if ($this->portfolio_image) {
            $this->portfolio->clearMediaCollection('portfolio_images');
            $this->portfolio->addMedia($this->portfolio_image)
                ->toMediaCollection('portfolio_images');
            $this->portfolio_image_preview = $this->portfolio->getFirstMedia('portfolio_images')->original_url;
            $this->portfolio_image = null;
        }

        $this->dispatch('notify', ['message' => 'Portfolio updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.portfolio.form', [
            'isEdit' => true,
        ])
            ->layout('layouts.admin.app', ['title' => 'Edit Portfolio']);
    }
}
