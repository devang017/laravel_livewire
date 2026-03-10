<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\User\EditUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public EditUserForm $form;

    public $user;

    public function mount(string $id)
    {
        $this->user = User::findOrFail($id);
        $this->form->userId = $this->user->id;
        $this->form->fill($this->user->toArray());
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }

    public function updateUser()
    {
        $this->validate();

        $data = $this->form->all();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $this->user->update($data);

        session()->flash('success', 'User updated successfully');

        return redirect()->route('users');
    }
}
