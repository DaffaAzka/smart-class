<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class Sidebar extends Component
{
    public $inbox = 0;

    public function mount() {
        $this->inbox = Message::all()->count();
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
