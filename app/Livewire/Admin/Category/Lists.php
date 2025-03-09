<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Lists extends Component
{
    public $categories;
    public $subcategories;

    public $search_categories = '';
    public $search_sub_categories = '';

    public function load() {
        $this->categories = Category::with('children')
        ->where('name' ,'like','%'. $this->search_categories .'%')
        ->whereNull('parent_id')
        ->orderBy('order')
        ->get();

        $this->subcategories = Category::join('categories as parents', 'categories.parent_id', '=', 'parents.id')
        ->whereNotNull('categories.parent_id')
        ->where(function ($query) {
            $query->where('categories.name', 'like', '%' . $this->search_sub_categories . '%')
                ->orWhere('parents.name', 'like', '%' . $this->search_sub_categories . '%');
        })
        ->select('categories.*', 'parents.name as parent_name')
        ->orderBy('categories.order')
        ->get();


    }

    public function mount() {

        $this->load();
    }
    public function render()
    {
        return view('livewire.admin.category.lists');
    }
}
