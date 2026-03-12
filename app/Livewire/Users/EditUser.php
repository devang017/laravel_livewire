<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\User\EditUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public EditUserForm $form;

    public $user;

    public $roleList = [];

    public function mount(string $id)
    {
        $this->user = User::findOrFail($id);
        $this->roleList = Role::all();
        $this->form->userId = $this->user->id;
        $this->form->fill($this->user->toArray());

        $this->form->roles = $this->user
            ->roles
            ->pluck('name')
            ->toArray();
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

        $this->user->syncRoles($this->form->roles);

        session()->flash('success', 'User updated successfully');

        return redirect()->route('users');
    }
}
