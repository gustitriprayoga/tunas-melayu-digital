<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public Service $service;
    public $title = '';
    public $slug = '';
    public $icon = '';
    public $short_description = '';
    public $full_content = '';
    public $is_active = true;
    public $service_image;
    public $service_image_preview;
    public $faqs = [];
    public $tech_stack = [];
    public $wa_message = '';

    public function mount()
    {
        $this->title = $this->service->title;
        $this->slug = $this->service->slug;
        $this->icon = $this->service->icon;
        $this->short_description = $this->service->short_description;
        $this->full_content = $this->service->full_content;
        $this->is_active = $this->service->is_active;
        $this->faqs = $this->service->faqs ?? [['question' => '', 'answer' => '']];
        $this->tech_stack = $this->service->tech_stack ?? [];
        $this->wa_message = $this->service->wa_message ?? '';

        if ($this->service->getFirstMedia('service_images')) {
            $this->service_image_preview = $this->service->getFirstMedia('service_images')->original_url;
        }
    }

    public function updatedTitle($value)
    {
        if ($this->slug === Str::slug($this->service->title)) {
            $this->slug = Str::slug($value);
        }
    }

    public function addFaq()
    {
        $this->faqs[] = ['question' => '', 'answer' => ''];
    }

    public function removeFaq($index)
    {
        unset($this->faqs[$index]);
        $this->faqs = array_values($this->faqs);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|unique:services,title,' . $this->service->id,
            'slug' => 'required|string|unique:services,slug,' . $this->service->id,
            'icon' => 'required|string',
            'short_description' => 'required|string',
            'full_content' => 'required|string',
            'service_image' => 'nullable|image|max:5120',
        ]);

        $this->service->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'icon' => $this->icon,
            'short_description' => $this->short_description,
            'full_content' => $this->full_content,
            'is_active' => $this->is_active,
            'faqs' => $this->faqs,
            'tech_stack' => $this->tech_stack,
            'wa_message' => $this->wa_message,
        ]);

        if ($this->service_image) {
            $this->service->clearMediaCollection('service_images');
            $this->service->addMedia($this->service_image)
                ->toMediaCollection('service_images');
            $this->service_image_preview = $this->service->getFirstMedia('service_images')->original_url;
            $this->service_image = null;
        }

        $this->dispatch('notify', ['message' => 'Service updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.services.form', [
            'isEdit' => true,
        ])
            ->layout('layouts.admin.app', ['title' => 'Edit Service']);
    }
}
