<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\Role\EditRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $role;
    public $permissions = [];
    public $permissionList = [];
    public EditRoleForm $form;

    public function mount($id)
    {
        $this->role = Role::findOrFail($id);
        // Load all permissions

        $this->form->roleId = $this->role->id;
        $this->form->name = $this->role->name;

        $this->permissionList = Permission::all();

        // Pre-select permissions
        $this->form->permissions = $this->role
            ->permissions
            ->pluck('name')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.roles.edit-role');
    }

    public function updateRole()
    {
        $this->validate();

        $data = $this->form->all();

        $this->role->update($data);

        // Sync permissions
        $this->role->syncPermissions($this->form->permissions);

        session()->flash('success', 'Role updated successfully');

        return redirect()->route('roles');
    }
}
