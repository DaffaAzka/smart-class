<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class SubUpdate extends Component
{

    use WithFileUploads;

    public $image;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $description = '';
    public $parent_id = null;

    public $parent_categories;

    public $category_id = '';

    #[On('editSelected')]
    public function handleEditSelected($idcategory)
    {
        $this->category_id = $idcategory;
        $category = Category::findOrFail($idcategory);
        $this->name = $category->name;
        $this->description = $category->description;
        $this->parent_id = $category->parent_id;
    }

    public function mount() {
        $this->parent_categories = Category::with('children')
        ->whereNull('parent_id')
        ->get();
    }

    public function update() {
        $this->validate();
        $image = null;
        $category = Category::findOrFail($this->category_id);

        $slug = Str::slug($this->name);

        if ($this->image) {

            if($category->image != null) {
                Storage::disk('public')->delete('images/' . $category->image);
            }

            $fileName = $this->generateRandomString();
            $extension = $this->image->extension();
            $image = $fileName . '.' . $extension;
            Storage::disk('public')->putFileAs('images', $this->image, $image);
        }else {
            $image = $category->image;
        }

        $category->update([
            'name'=> $this->name,
            'description'=> $this->description,
            'image'=> $image,
            'slug'=> $slug,
            'parent_id' => $this->parent_id
            // 'order' => $this->getOrderInt()
        ]);

        session()->flash('success', 'Successfully update sub category');

    }


    public function render()
    {
        return view('livewire.admin.category.sub-update');
    }

    function generateRandomString($length = 30): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
