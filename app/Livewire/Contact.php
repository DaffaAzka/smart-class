<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class Contact extends Component
{

    public $name = '';
    public $email = '';
    public $phone = '';
    public $country = '';
    public $role = '';
    public $company = '';
    public $msg = '';

    public function save() {
        $r = Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'role' => $this->role,
            'company' => $this->company,
            'msg' => $this->msg,
        ]);

        if ($r) {
            $this->reset(['name', 'email', 'phone', 'country', 'role', 'company', 'msg']);
            session()->flash('success', 'Message sent successfully');        }
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
