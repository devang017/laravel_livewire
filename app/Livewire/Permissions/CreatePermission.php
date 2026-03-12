<?php

namespace App\Livewire\Permissions;


use App\Livewire\Forms\Permission\CreatePermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermission extends Component
{
    public CreatePermissionForm $form;

    public function render()
    {
        return view('livewire.permissions.create-permission');
    }

    public function savePermission()
    {
        $this->validate();

        Permission::create($this->form->all());

        session()->flash('success', 'Permission created successfully.');

        return redirect()->route('permissions');
    }
}
