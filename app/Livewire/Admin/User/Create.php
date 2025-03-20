<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate(['string', 'required'])]
    public $name;

    #[Validate(['email', 'required'])]
    public $email;

    #[Validate(['min:6', 'required'])]
    public $password;

    #[Validate(['same:password', 'required'])]
    public $repassword;

    public $user_id = '';

    #[On('editSelected')]
    public function handleEditSelected($iduser)
    {
        $this->user_id = $iduser;
        $user = User::findOrFail($iduser);
        $this->name = $user->name;
        $this->email = $user->email;
    }

    function store() {
        if ($this->user_id == '') {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|same:repassword',
                'repassword' => 'required|min:6'
            ]);

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            if ($user) {
                $this->reset(['name', 'email', 'password', 'repassword']);
                session()->flash('success', 'User has been created');
            }
        } else {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'same:repassword',
                'repassword' => ''
            ]);
            $user = User::findOrFail($this->user_id);

            $user->update( [
                'name'=> $this->name,
                'email'=> $this->email

            ]);

            session()->flash('success', 'User has been updated');



        }
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
