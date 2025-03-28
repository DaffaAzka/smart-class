<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Create extends Component
{
    use WithFileUploads;

    public $image;
    public $image_header;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $description = '';

    #[Validate('required')]
    public $category_id = '';

    public $parent_categories;

    public $product_id = '';

    #[On('editSelected')]
    public function handleEditSelected($idproduct)
    {
        $this->product_id = $idproduct;
        $product = Product::findOrFail($idproduct);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = $product->category_id;

    }


    public function mount() {
        $this->parent_categories = Category::with('children')
        ->whereNotNull('parent_id')
        ->get();
    }

    public function render()
    {
        return view('livewire.admin.product.create');
    }

    public function store() {
        if ($this->product_id == '') {
            $this->validate([
                'image' => 'image'
            ]);

            $image = null;
            $header = null;

            $slug = Str::slug($this->name);

            if ($this->image) {
                $fileName = $this->generateRandomString();
                $extension = $this->image->extension();
                $image = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images', $this->image, $image);
            }

            if($this->image_header) {
                $fileName = $this->generateRandomString();
                $extension = $this->image_header->extension();
                $header = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images/headers', $this->image_header, $header);
            }

            $product = Product::create([
                'name'=> $this->name,
                'description'=> $this->description,
                'image'=> $image,
                'image_header'=> $header,
                'slug'=> $slug,
                'category_id'=> $this->category_id,
            ]);

            if ($product) {
                $this->reset(['name', 'description', 'image', 'image_header']);
                session()->flash('success', 'Successfully create sub category');
            }
        } else {

            $this->validate();
            $image = null;
            $header = null;
            $product = Product::findOrFail($this->product_id);

            $slug = Str::slug($this->name);

            if ($this->image) {

                if($product->image != null) {
                    Storage::disk('public')->delete('images/' . $product->image);
                }

                $fileName = $this->generateRandomString();
                $extension = $this->image->extension();
                $image = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images', $this->image, $image);
            }else {
                $image = $product->image;
            }

            if($this->image_header) {

                if($product->image_header != null) {
                    Storage::disk('public')->delete('images/headers/' . $product->image_header);
                }

                $fileName = $this->generateRandomString();
                $extension = $this->image_header->extension();
                $header = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images/headers', $this->image_header, $header);
            }else {
                $header = $product->image_header;
            }

            $product->update([
                'name'=> $this->name,
                'description'=> $this->description,
                'image'=> $image,
                'slug'=> $slug,
                'category_id'=> $this->category_id,
                'image_header'=> $header,
                // 'order' => $this->getOrderInt()
            ]);

            session()->flash('success', 'Successfully update product');

        }

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
