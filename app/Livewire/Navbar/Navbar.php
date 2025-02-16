<?php
namespace App\Livewire\Navbar;

use App\Models\Category;
use Livewire\Component;

class Navbar extends Component
{
    public $categories;

    public function mount() {
        $this->categories = Category::with('children')
        ->whereNull('parent_id')
        ->orderBy('order')
        ->get();
    }

    public function render()
    {
        return view('livewire.navbar.navbar', [
            'categories' => $this->categories,
        ]);
    }
}
