<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.user.lists', [
            'users' => User::paginate(5),
        ]);
    }
}
