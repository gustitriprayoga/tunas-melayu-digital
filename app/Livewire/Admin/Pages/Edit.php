<?php

namespace App\Livewire\Admin\Pages;

use App\Models\HomePage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public HomePage $page;
    public $hero_title;
    public $hero_subtitle;
    public $cta_text;
    public $cta_link;
    public $stats_clients;
    public $stats_projects;
    public $stats_years;
    public $video_url;
    public $hero_image;
    public $hero_image_preview;

    public function mount()
    {
        $this->page = HomePage::firstOrCreate(['id' => 1], [
            'hero_title' => 'NEXT LEVEL DIGITAL',
            'hero_subtitle' => 'Membangun ekosistem digital masa depan.',
            'cta_text' => 'Hubungi Kami',
            'stats_clients' => 0,
            'stats_projects' => 0,
            'stats_years' => 0,
        ]);

        $this->hero_title = $this->page->hero_title;
        $this->hero_subtitle = $this->page->hero_subtitle;
        $this->cta_text = $this->page->cta_text;
        $this->cta_link = $this->page->cta_link ?? '';
        $this->stats_clients = $this->page->stats_clients ?? 0;
        $this->stats_projects = $this->page->stats_projects ?? 0;
        $this->stats_years = $this->page->stats_years ?? 0;
        $this->video_url = $this->page->video_url ?? '';

        if ($this->page->getFirstMedia('hero')) {
            $this->hero_image_preview = $this->page->getFirstMedia('hero')->original_url;
        }
    }

    public function save()
    {
        $this->validate([
            'hero_title' => 'required|string',
            'hero_subtitle' => 'required|string',
            'cta_text' => 'required|string',
            'cta_link' => 'nullable|url',
            'stats_clients' => 'required|numeric',
            'stats_projects' => 'required|numeric',
            'stats_years' => 'required|numeric',
            'video_url' => 'nullable|url',
            'hero_image' => 'nullable|image|max:5120',
        ]);

        $this->page->update([
            'hero_title' => $this->hero_title,
            'hero_subtitle' => $this->hero_subtitle,
            'cta_text' => $this->cta_text,
            'cta_link' => $this->cta_link,
            'stats_clients' => $this->stats_clients,
            'stats_projects' => $this->stats_projects,
            'stats_years' => $this->stats_years,
            'video_url' => $this->video_url,
        ]);

        // Handle image upload
        if ($this->hero_image) {
            $this->page->clearMediaCollection('hero');
            $this->page->addMedia($this->hero_image)
                ->toMediaCollection('hero');
            $this->hero_image_preview = $this->page->getFirstMedia('hero')->original_url;
            $this->hero_image = null;
        }

        $this->dispatch('notify', ['message' => 'Home page updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.pages.edit')
            ->layout('layouts.admin.app', ['title' => 'Edit Home Page']);
    }
}
