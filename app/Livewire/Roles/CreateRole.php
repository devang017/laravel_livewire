<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\Role\CreateRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public CreateRoleForm $form;

    public $permissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function render()
    {
        return view('livewire.roles.create-role');
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
