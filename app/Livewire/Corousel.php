<?php

namespace App\Livewire;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithFileUploads;

class Corousel extends Component
{

    public $corousels;



    public function mount() {
        $this->corousels = Media::where('type', 'corousel')->get();
    }



    public function render()
    {
        return view('livewire.corousel');
    }
}
