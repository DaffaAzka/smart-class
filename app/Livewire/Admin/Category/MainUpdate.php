<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class MainUpdate extends Component
{

    use WithFileUploads;

    public $category_id = '';

    // #[Validate('image')]
    public $image;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $description = '';

    #[On('editSelected')]
    public function handleEditSelected($idcategory)
    {
        $this->category_id = $idcategory;
        $category = Category::findOrFail($idcategory);
        $this->name = $category->name;
        $this->description = $category->description;
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
            // 'order' => $this->getOrderInt()
        ]);

        session()->flash('success', 'Successfully update main category');

    }

    public function render()
    {
        return view('livewire.admin.category.main-update');
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
