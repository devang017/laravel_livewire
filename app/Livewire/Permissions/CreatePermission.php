<?php

namespace App\Livewire\Permissions;


use App\Livewire\Forms\Permission\CreatePermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermission extends Component
{
    public CreatePermissionForm $form;
    public $roleList = [];

    public function mount()
    {
        $this->roleList = Role::all();
    }

    public function render()
    {
        return view('livewire.permissions.create-permission');
    }

    public function savePermission()
    {
        $this->validate();

        $data = Permission::create($this->form->all());

        $data->syncRoles($this->form->roles);

        session()->flash('success', 'Permission created successfully.');

        return redirect()->route('permissions');
    }
}
