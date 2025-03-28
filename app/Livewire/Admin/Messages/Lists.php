<?php

namespace App\Livewire\Admin\Messages;

use App\Models\Message;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;

    public $msg;

    public function render()
    {
        $messages = Message::orderBy("id","desc")->paginate(10);
        return view('livewire.admin.messages.lists', [
            'messages' => $messages
        ]);
    }

    #[On('openModal')]
    public function handleOpenModal($idmessage)
    {
        $this->msg = Message::findOrFail($idmessage);
    }

}
