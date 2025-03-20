<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Highlight;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Highlights extends Component
{
    use WithFileUploads;

    public $highlights;
    public $products;
    public $count = 0;

    public $image;

    #[Validate(['required'])]
    public $name;

    #[Validate(['required'])]
    public $product_id;

    public $highlight_id = '';

    #[On('editSelected')]
    public function handleEditSelected($idhighlight)
    {
        $this->highlight_id = $idhighlight;
        $highlight = Highlight::findOrFail($idhighlight);
        $this->name = $highlight->name;
        $this->product_id = $highlight->product_id;
    }

    #[On('deleteSelected')]
    public function handleDeleteSelected($idhighlight) {
        $this->highlight_id = $idhighlight;
    }

    public function destroy() {
        if ($this->highlight_id) {
            $high = Highlight::findOrFail($this->highlight_id);

            if($high) {
                if($high->image != null) {
                    Storage::disk('public')->delete('images/highlights/' . $high->image);
                }

                $high->delete();

                // $this->count--;
                return redirect(route(name: 'dashboard'))->with('error', 'Highlight has been deleted');
            }

            return redirect(route(name: 'dashboard'))->with('error', 'Highlight not found');


        }
    }

    function mount() {
        $this->highlights = Highlight::with('product')->get();
        $this->count = Highlight::count();
        $this->products = Product::all();
    }

    public function store() {
        if($this->highlight_id == '') {

            if($this->count < 4) {
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
                    $this->count++;
                    $this->reset(['name', 'image']);
                        session()->flash('success', 'Successfully adding highlight');
                }
            } else {
                return redirect(route(name: 'dashboard'))->with('error', 'Highlight maximum is 4');
            }


        } else {

            $high = Highlight::findOrFail($this->highlight_id);


            $image = "";

            $this->validate();

            if ($this->image) {

                if($high->image != null) {
                    Storage::disk('public')->delete('images/highlights/' . $high->image);
                }

                $fileName = $this->generateRandomString();
                $extension = $this->image->extension();
                $image = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images/highlights', $this->image, $image);

            } else {
                $image = $high->image;
            }



            // $high = Highlight::create([
            //     'name' => $this->name,
            //     'image' => $image,
            //     'product_id' => $this->product_id,
            // ]);

            $high::update([
                'name' => $this->name,
                'image' => $image,
                'product_id' => $this->product_id,
            ]);

            if($high) {
                $this->count++;
                $this->reset(['name', 'image']);
                    session()->flash('success', 'Successfully updating highlight');
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
