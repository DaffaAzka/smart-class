<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Highlight;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Highlights extends Component
{
    use WithFileUploads;

    public $highlights;
    public $products;

    public $image;

    #[Validate(['required'])]
    public $name;

    #[Validate(['required'])]
    public $product_id;

    public $highlight_id = '';

    function mount() {
        $this->highlights = Highlight::with('product')->get();
        $this->products = Product::all();
    }

    public function store() {
        if($this->highlight_id == '') {

            $image = "";

            $this->validate();

            if ($this->image) {
                $fileName = $this->generateRandomString();
                $extension = $this->image->extension();
                $image = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images/highlights', $this->image, $image);
            }

            $high = Highlight::create([
                'name' => $this->name,
                'image' => $image,
                'product_id' => $this->product_id,
            ]);

            if($high) {
                $this->reset(['name', 'image']);
                    session()->flash('success', 'Successfully adding highlight');
            }

        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.highlights');
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
