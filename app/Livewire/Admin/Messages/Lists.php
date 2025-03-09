<?php

namespace App\Livewire\Admin\Messages;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;

    public function render()
    {
        $messages = Message::orderBy("id","desc")->paginate(10);
        // dd($messages);
        return view('livewire.admin.messages.lists', [
            'messages' => $messages
        ]);
    }
}
