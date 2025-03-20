<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{

    public $id;

    #[On("deleteSelected")]
    public function handleDeleteSelected($iduser)
    {
        $this->id = $iduser;
    }

    function destroy() {
        $user = User::findOrFail($this->id);

        if($user) {
            $user->delete();
            return redirect(route('users'))->with('error', 'User has been deleted');
        }

        return redirect(route('users'))->with('error', 'User not found');
    }

    public function render()
    {
        return view('livewire.admin.user.delete');
    }
}
