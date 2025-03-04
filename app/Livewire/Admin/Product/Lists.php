<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;

    public $search_categories;
    // public $categories;

    public function mount() {
        // $this->products = Product::all();
        // $this->categories = Category::all();

    }

    public function updatingSearchCategories()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::select('products.*')
            ->join('categories as parent', 'products.category_id', '=', 'parent.id')
            ->selectRaw('parent.name as parent_name')
            ->when($this->search_categories, function ($query) {
                return $query->where(function ($q) {
                    $q->where('products.name', 'like', '%' . $this->search_categories . '%')
                      ->orWhere('parent.name', 'like', '%' . $this->search_categories . '%');
                });
            })
            ->paginate(6);

        return view('livewire.admin.product.lists', [
            'products' => $products
        ]);
    }

    // public function load() {
    //     $this->products = Product::select('products.*')
    //     ->join('categories as parent', 'products.category_id', '=', 'parent.id')
    //     ->selectRaw('parent.name as parent_name')
    //     ->paginate(6);
    // }
}
