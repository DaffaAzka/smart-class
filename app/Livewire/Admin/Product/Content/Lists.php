<?php

namespace App\Livewire\Admin\Product\Content;

use App\Models\Product;
use App\Models\ProductContent;
use Livewire\Component;

class Lists extends Component
{

    public $product;
    public $product_id;
    public $product_contents;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();

        if (!$this->product) {
            abort(404);
        }

        $this->product_contents = ProductContent::where('product_id', $this->product->id)->get();
        // dd($this->product_content);
        $this->product_id = $this->product->id;
    }

    public function render()
    {
        return view('livewire.admin.product.content.lists');
    }
}
