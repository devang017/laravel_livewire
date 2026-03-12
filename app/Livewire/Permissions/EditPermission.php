<?php

namespace App\Livewire\Permissions;


use App\Livewire\Forms\Permission\EditPermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditPermission extends Component
{
    public $permission;
    public EditPermissionForm $form;
    public $roleList = [];

    public function mount($id)
    {
        $this->permission = Permission::findOrFail($id);
        $this->form->permissionId = $this->permission->id;
        $this->form->name = $this->permission->name;

        $this->form->roles = $this->permission
            ->roles
            ->pluck('name')
            ->toArray();

        $this->roleList = Role::all();
    }

    public function render()
    {
        return view('livewire.permissions.edit-permission');
    }

    public function updatePermission()
    {
        $this->validate();

        $data = $this->form->all();

        $this->permission->update($data);

        // Sync roles
        $this->permission->syncRoles($this->form->roles);

        session()->flash('success', 'Permission updated successfully');

        return redirect()->route('permissions');
    }
}
