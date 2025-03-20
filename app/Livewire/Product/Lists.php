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
    // protected $products;

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->firstOrFail();

        // dd($this->category);

        if($this->category == null) {
            abort(404);
        }
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)->paginate(perPage: 4);

        if($products->count() == 1) {
            redirect()->route('product', ['slug' => $products->first()->slug]);
        }

        return view('livewire.product.lists', [
            'products' => $products,
        ]);
    }
}

