<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\User\CreateUserForm;
use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public CreateUserForm $form;

    public function render()
    {
        return view('livewire.Users.create-user');
    }

    public function saveUser()
    {
        $this->validate();

        User::Create($this->form->all());

        session()->flash('success', 'User created successfully');

        return redirect()->route('users');
    }
}
