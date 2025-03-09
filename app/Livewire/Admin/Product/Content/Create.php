<?php
namespace App\Livewire\Admin\Product\Content;
use App\Models\ProductContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    use WithFileUploads;

    public $product_id;
    public $content_id = '';

    public $img_source;

    #[Validate('required')]
    public $header = '';

    #[Validate('required')]
    public $content = '';

    #[On('editSelected')]
    public function handleEditSelected($idcontent)
    {
        $this->content_id = $idcontent;
        $product = ProductContent::findOrFail($idcontent);
        $this->header = $product->header;
        $this->content = $product->content;

    }

    public function store() {
        if ($this->content_id == '') {
            $this->validate([
                'img_source' => 'image'
            ]);

            $image = null;
            if ($this->img_source) {
                $fileName = $this->generateRandomString();
                $extension = $this->img_source->extension();
                $image = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images/content/' . $this->product_id, $this->img_source, $image);
            }

            $content = ProductContent::create([
                'product_id'=> $this->product_id,
                'header'=> $this->header,
                'img_source'=> $image,
                'content'=> $this->content,
                'order'=> $this->getOrderInt(),
            ]);

            if ($content) {
                // Reset should use img_source instead of image to match property name
                $this->reset(['content', 'header', 'img_source']);
                session()->flash('success', 'Successfully create content');
            }
        } else {
            $this->validate();
            $image = null;

            $content = ProductContent::findOrFail($this->content_id);

            if ($this->img_source) {

                if($content->image != null) {
                    Storage::disk('public')->delete('images/content/' . $this->product_id . '/' . $content->img_source);
                }

                $fileName = $this->generateRandomString();
                $extension = $this->img_source->extension();
                $image = $fileName . '.' . $extension;
                Storage::disk('public')->putFileAs('images/content/' . $this->product_id, $this->img_source, $image);
            } else {
                $image = $content->img_source;
            }

            $content->update([
                'header'=> $this->header,
                'img_source'=> $image,
                'content'=> $this->content,
            ]);

            session()->flash('success', 'Successfully update content');
        }
    }

    public function render()
    {
        // dd($this->product_id);
        return view('livewire.admin.product.content.create');
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
        $category = ProductContent::where('product_id', value: $this->product_id)->get()->count();
        return $category + 1;
    }
}
