<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Footer extends Component
{
    public $contacts;
    public $sub_categories;

    public function mount () {
        $this->contacts = Category::where('type', 'contact')->get()->toArray();
        $this->sub_categories = Category::whereNull('parent_id')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.footer');
    }
}
