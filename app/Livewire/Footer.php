<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Footer extends Component
{
    public $contacts;

    public function mount () {
        $this->contacts = Category::where('parent_id','=', '1')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.footer');
    }
}
