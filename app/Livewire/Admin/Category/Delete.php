<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $category_id = '';


    #[On('deleteSelected')]
    public function handleEditSelected($idcategory)
    {
        $this->category_id = $idcategory;
    }

    public function destroy() {

        $category = Category::findOrFail($this->category_id);

        if($category->image != null) {
            Storage::disk('public')->delete('images/' . $category->image);
        }

        $category->delete();
        return redirect()->route('categories')->with('error', 'Successfully deleted category');
    }

    public function render()
    {
        return view('livewire.admin.category.delete');
    }
}
