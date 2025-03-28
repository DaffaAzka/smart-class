<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductContent;
use Livewire\Attributes\Title;
use Livewire\Component;

class Content extends Component
{
    #[Title("Product")]

    public $product;
    public $product_contents;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();

        if (!$this->product) {
            abort(404);
        }

        $this->product_contents = ProductContent::where('product_id', $this->product->id)->get();
        // dd($this->product_content);
    }

    public function render()
    {
        return view('livewire.product.content');
    }
}
