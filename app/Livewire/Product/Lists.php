<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;
    #[Title("List of Products")]
    public $category;
    protected $products;

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->firstOrFail();

        if($this->category == null) {
            abort(404);
        } else {
            $this->products = Product::where('category_id', $this->category->id)->paginate(4);
        }
    }

    public function render()
    {
        return view('livewire.product.lists', [
            'products' => $this->products,
        ]);
    }
}

