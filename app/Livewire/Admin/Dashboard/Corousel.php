<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Corousel extends Component
{
    use WithFileUploads;
    public $corousels;

    public $corousel_id;

    #[Validate('image|required')]
    public $name;

    #[On('deleteCorouselSelected')]
    public function handleDeleteCorouselSelected($idcorousel) {
        $this->corousel_id = $idcorousel;
    }

    public function destroy() {
        $corousel = Media::findOrFail($this->corousel_id);
        if($corousel) {
            Storage::delete('public/images/corousels/' . $corousel->name);
            $corousel->delete();
            return redirect(route(name: 'dashboard'))->with('error', 'Corousel image has been deleted');
        }
    }

    public function mount()
    {
        $this->corousels = Media::where('type', 'corousel')->get();
    }

    public function store() {
        $image = "";

        $this->validate();

        if ($this->name) {
            $fileName = $this->generateRandomString();
            $extension = $this->name->extension();
            $image = $fileName . '.' . $extension;
            Storage::disk('public')->putFileAs('images/corousels', $this->name, $image);
        }

        $media = Media::create([
            'name' => $image,
            'type' => 'corousel',
        ]);

        if($media) {
            $this->reset(['name']);
                session()->flash('success', 'Successfully adding corousel image');
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.corousel');
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
