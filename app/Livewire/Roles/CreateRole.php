<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\Role\CreateRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public CreateRoleForm $form;

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.roles.create-role', compact('permissions'));
    }

    public function saveRole()
    {
        $this->validate();

        $role = Role::create($this->form->all());

        $role->syncPermissions($this->form->permissions);

        session()->flash('success', 'Role created successfully.');

        return redirect()->route('roles');
    }
}
