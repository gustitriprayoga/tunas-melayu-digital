<?php

namespace App\Livewire\Admin;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Testimonials extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    
    // Form fields
    public $name = '';
    public $position = '';
    public $company = '';
    public $content = '';
    public $rating = 5;
    public $is_featured = false;
    public $avatar;
    public $editingTestimonialId = null;

    protected $rules = [
        'name' => 'required|string',
        'position' => 'required|string',
        'company' => 'nullable|string',
        'content' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'avatar' => 'nullable|image|max:2048',
    ];

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'company' => $this->company,
            'content' => $this->content,
            'rating' => $this->rating,
            'is_featured' => $this->is_featured,
        ];

        if ($this->editingTestimonialId) {
            $testimonial = Testimonial::find($this->editingTestimonialId);
            $testimonial->update($data);
            
            if ($this->avatar) {
                $testimonial->clearMediaCollection('avatar');
                $testimonial->addMedia($this->avatar)->toMediaCollection('avatar');
            }
            
            $msg = 'Testimonial updated successfully!';
        } else {
            $testimonial = Testimonial::create($data);
            
            if ($this->avatar) {
                $testimonial->addMedia($this->avatar)->toMediaCollection('avatar');
            }
            
            $msg = 'Testimonial added successfully!';
        }

        $this->resetForm();
        $this->dispatch('notify', ['message' => $msg, 'type' => 'success']);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        $this->editingTestimonialId = $id;
        $this->name = $testimonial->name;
        $this->position = $testimonial->position;
        $this->company = $testimonial->company;
        $this->content = $testimonial->content;
        $this->rating = $testimonial->rating;
        $this->is_featured = (bool) $testimonial->is_featured;
        $this->avatar = null;
    }

    public function delete($id)
    {
        Testimonial::find($id)->delete();
        $this->dispatch('notify', ['message' => 'Testimonial deleted.', 'type' => 'success']);
    }

    public function resetForm()
    {
        $this->editingTestimonialId = null;
        $this->name = '';
        $this->position = '';
        $this->company = '';
        $this->content = '';
        $this->rating = 5;
        $this->is_featured = false;
        $this->avatar = null;
    }

    public function toggleFeatured($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->is_featured = !$testimonial->is_featured;
        $testimonial->save();
        $this->dispatch('notify', ['message' => 'Status updated.', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.testimonials', [
            'testimonials' => Testimonial::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('company', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10)
        ])->layout('layouts.admin.app', ['title' => 'Testimonials']);
    }
}
