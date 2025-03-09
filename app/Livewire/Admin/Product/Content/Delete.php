<?php

namespace App\Livewire\Admin\Product\Content;

use App\Models\ProductContent;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{

    public $content_id = '';


    #[On('deleteSelected')]
    public function handleEditSelected($idcontent)
    {
        $this->content_id = $idcontent;
    }

    public function destroy() {

        $content = productContent::findOrFail($this->content_id);

        if($content->image != null) {
            Storage::disk('public')->delete('images/content/' . $this->product_id . '/' . $content->img_source);
        }

        $content->delete();
        return redirect()->route('products')->with('error', 'Successfully deleted category');
    }

    public function render()
    {
        return view('livewire.admin.product.content.delete');
    }
}
