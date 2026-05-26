<?php

namespace App\Livewire\Admin\Packages;

use App\Models\PackageCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $categories;
    public $name = '';
    public $sort_order = 0;
    public $editingCategoryId = null;
    public $editingName = '';
    public $editingSortOrder = 0;

    protected $rules = [
        'name' => 'required|string|unique:package_categories,name',
        'sort_order' => 'required|integer',
    ];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = PackageCategory::orderBy('sort_order', 'asc')->get();
    }

    public function save()
    {
        $this->validate();

        PackageCategory::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'sort_order' => $this->sort_order,
            'is_active' => true,
        ]);

        $this->name = '';
        $this->sort_order = PackageCategory::count();
        $this->loadCategories();
        $this->dispatch('notify', ['message' => 'Category created successfully!', 'type' => 'success']);
    }

    public function startEdit($id)
    {
        $category = PackageCategory::find($id);
        $this->editingCategoryId = $id;
        $this->editingName = $category->name;
        $this->editingSortOrder = $category->sort_order;
    }

    public function cancelEdit()
    {
        $this->editingCategoryId = null;
    }

    public function update()
    {
        $this->validate([
            'editingName' => 'required|string|unique:package_categories,name,' . $this->editingCategoryId,
            'editingSortOrder' => 'required|integer',
        ]);

        $category = PackageCategory::find($this->editingCategoryId);
        $category->update([
            'name' => $this->editingName,
            'slug' => Str::slug($this->editingName),
            'sort_order' => $this->editingSortOrder,
        ]);

        $this->editingCategoryId = null;
        $this->loadCategories();
        $this->dispatch('notify', ['message' => 'Category updated successfully!', 'type' => 'success']);
    }

    public function deleteCategory($id)
    {
        PackageCategory::find($id)->delete();
        $this->loadCategories();
        $this->dispatch('notify', ['message' => 'Category deleted successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.packages.categories')
            ->layout('layouts.admin.app', ['title' => 'Pricing Categories']);
    }
}
