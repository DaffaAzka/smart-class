<?php

namespace App\Livewire\Admin\Product\Content;

use Livewire\Component;

class Card extends Component
{
    public $content;

    public $product_id;

    public function render()
    {
        return view('livewire.admin.product.content.card');
    }
}
