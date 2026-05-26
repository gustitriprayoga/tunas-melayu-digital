<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title = '';
    public $slug = '';
    public $icon = '';
    public $short_description = '';
    public $full_content = '';
    public $is_active = true;
    public $service_image;
    public $service_image_preview;
    public $faqs = [['question' => '', 'answer' => '']];
    public $tech_stack = [];
    public $wa_message = '';

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
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
        try {
            $validated = $this->validate([
                'title' => 'required|string|unique:services',
                'slug' => 'required|string|unique:services',
                'icon' => 'required|string',
                'short_description' => 'required|string',
                'full_content' => 'required|string',
                'service_image' => 'nullable|image|max:5120',
            ]);

            $service = Service::create([
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
                $service->addMedia($this->service_image)
                    ->toMediaCollection('service_images');
            }

            session()->flash('success', 'Service created successfully!');
            return $this->redirect(route('admin.services.edit', $service), navigate: true);
        } catch (\Exception $e) {
            \Log::error('Service creation error: ' . $e->getMessage());
            session()->flash('error', 'Failed to create service: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.services.form', [
            'isEdit' => false,
        ])
            ->layout('layouts.admin.app', ['title' => 'Create Service']);
    }
}
