<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $package_category_id = '';
    public $price = '';
    public $period = '/ project';
    public $description = '';
    public $features = ['']; // Initialize with one empty feature
    public $is_popular = false;
    public $cta_link = '';

    public function mount()
    {
        $this->package_category_id = \App\Models\PackageCategory::orderBy('sort_order', 'asc')->first()?->id;
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
            'name' => 'required|string|unique:packages,name',
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

        Package::create([
            'package_category_id' => $this->package_category_id,
            'name' => $this->name,
            'category' => $cat->slug,
            'price' => $this->price,
            'period' => $this->period,
            'description' => $this->description,
            'features' => array_filter($this->features), // Remove empty strings if any
            'is_popular' => $this->is_popular,
            'cta_link' => $this->cta_link ?: 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20paket%20' . urlencode($this->name),
        ]);

        session()->flash('success', 'Package created successfully!');
        return $this->redirect(route('admin.packages.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.packages.form', [
            'isEdit' => false,
            'categories' => \App\Models\PackageCategory::orderBy('sort_order', 'asc')->get(),
        ])
            ->layout('layouts.admin.app', ['title' => 'Create Package']);
    }
}
