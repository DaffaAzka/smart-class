<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
class Delete extends Component
{

    public $product_id = '';


    #[On('deleteSelected')]
    public function handleEditSelected($idproduct)
    {
        $this->product_id = $idproduct;
    }

    public function destroy() {

        $product = Product::findOrFail($this->product_id);

        if($product->image != null) {
            Storage::disk('public')->delete('images/' . $product->image);
        }

        $product->delete();
        return redirect()->route('products')->with('error', 'Successfully deleted category');
    }

    public function render()
    {
        return view('livewire.admin.product.delete');
    }
}
