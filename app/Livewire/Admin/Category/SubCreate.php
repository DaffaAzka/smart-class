<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubCreate extends Component
{

    use WithFileUploads;

    #[Validate('image')]
    public $image;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $description = '';
    public $parent_id = null;

    public $parent_categories;

    public function mount() {
        $this->parent_categories = Category::with('children')
        ->whereNull('parent_id')
        ->get();
    }

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
            'order' => $this->getOrderInt($this->parent_id),
            'parent_id'=> $this->parent_id,
        ]);

        if ($category) {
            $this->reset(['name', 'description', 'image']);
            session()->flash('success', 'Successfully create sub category');        }
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

    function getOrderInt($n): int {
        $category = Category::where('parent_id', value:$n)->get()->count();
        return $category + 1;
    }

    public function render()
    {
        return view('livewire.admin.category.sub-create');
    }
}
