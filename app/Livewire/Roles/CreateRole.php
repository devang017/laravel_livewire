<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\Role\CreateRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public CreateRoleForm $form;

    public function render()
    {
        return view('livewire.roles.create-role');
    }

    public function saveRole()
    {
        $this->validate();

        Role::create($this->form->all());

        session()->flash('success', 'Role created successfully.');

        return redirect()->route('roles');
    }
}
