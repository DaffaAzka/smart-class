<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class MainCreate extends Component
{
    use WithFileUploads;

    #[Validate('image')]
    public $image;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $description = '';

    public function store() {
        $this->validate();

        $image = null;
        $slug = Str::slug($this->name);

        if ($this->image) {
            $fileName = $this->generateRandomString();
            $extension = $this->image->extension();
            $image = $fileName . '.' . $extension;
            Storage::disk('public')->putFileAs('images', $this->image, $image);
        }

        $category = Category::create([
            'name'=> $this->name,
            'description'=> $this->description,
            'image'=> $image,
            'slug'=> $slug,
            'order' => $this->getOrderInt()
        ]);

        if ($category) {
            $this->reset(['name', 'description', 'image']);
            session()->flash('success', 'Successfully create main category');        }
    }

    public function render()
    {
        // dd($this->getOrderInt());
        return view('livewire.admin.category.main-create');
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

    function getOrderInt(): int {
        $category = Category::whereNull('parent_id')->get()->count();
        return $category + 1;
    }
}
