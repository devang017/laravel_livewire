<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\User\CreateUserForm;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public CreateUserForm $form;

    public $roleList = [];

    public function mount()
    {
        $this->roleList = Role::all();
    }

    public function render()
    {
        return view('livewire.Users.create-user');
    }

    public function saveUser()
    {
        $this->validate();

        $user = User::Create($this->form->all());

        $user->syncRoles($this->form->roles);

        session()->flash('success', 'User created successfully');

        return redirect()->route('users');
    }
}
