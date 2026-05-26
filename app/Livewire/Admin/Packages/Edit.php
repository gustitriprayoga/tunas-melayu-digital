<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Livewire\Component;

class Edit extends Component
{
    public Package $package;
    public $name = '';
    public $package_category_id = '';
    public $price = '';
    public $period = '';
    public $description = '';
    public $features = [];
    public $is_popular = false;
    public $cta_link = '';

    public function mount()
    {
        $this->name = $this->package->name;
        $this->package_category_id = $this->package->package_category_id ?? \App\Models\PackageCategory::where('slug', $this->package->category)->first()?->id;
        if (!$this->package_category_id) {
            $this->package_category_id = \App\Models\PackageCategory::orderBy('sort_order', 'asc')->first()?->id;
        }
        $this->price = $this->package->price;
        $this->period = $this->package->period;
        $this->description = $this->package->description;
        $this->features = $this->package->features ?? [''];
        $this->is_popular = (bool) $this->package->is_popular;
        $this->cta_link = $this->package->cta_link;
    }

    public function addFeature()
    {
        $this->features[] = '';
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|unique:packages,name,' . $this->package->id,
            'package_category_id' => 'required|exists:package_categories,id',
            'price' => 'required|numeric|min:0',
            'period' => 'required|string',
            'description' => 'nullable|string',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string',
            'cta_link' => 'nullable|url',
        ], [
            'features.*.required' => 'Feature content cannot be empty.',
        ]);

        $cat = \App\Models\PackageCategory::find($this->package_category_id);

        $this->package->update([
            'name' => $this->name,
            'package_category_id' => $this->package_category_id,
            'category' => $cat->slug,
            'price' => $this->price,
            'period' => $this->period,
            'description' => $this->description,
            'features' => array_filter($this->features),
            'is_popular' => $this->is_popular,
            'cta_link' => $this->cta_link ?: 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20paket%20' . urlencode($this->name),
        ]);

        $this->dispatch('notify', ['message' => 'Package updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.packages.form', [
            'isEdit' => true,
            'categories' => \App\Models\PackageCategory::orderBy('sort_order', 'asc')->get(),
        ])
            ->layout('layouts.admin.app', ['title' => 'Edit Package']);
    }
}
