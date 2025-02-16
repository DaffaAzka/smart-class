<?php

namespace App\Livewire\Navbar;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\On;

class NavbarDropdown extends Component
{
    public $cat;
    public $sub_categories = [];
    public $selectedCategory;

    public function mount($sub_categories = [])
    {
        $this->sub_categories = $sub_categories;
    }

    #[On('categorySelected')]
    public function handleCategorySelected($categoryName)
    {
        $this->selectedCategory = $categoryName; // Ambil nilai dari array
        // $this->dispatch('$refresh');
        $this->cat = Category::where('name', $categoryName)->first();
        $id = $this->cat->id;
        $this->sub_categories = Category::where('parent_id', $id)->get();
        // dd($this->sub_categories);
    }

    public function render()
    {
        return view('livewire.navbar.navbar-dropdown');
    }
}
