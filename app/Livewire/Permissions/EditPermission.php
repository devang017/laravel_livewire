<?php

namespace App\Livewire\Permissions;


use App\Livewire\Forms\Permission\EditPermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{
    public $permission;
    public EditPermissionForm $form;

    public function mount($id)
    {
        $this->permission = Permission::findOrFail($id);
        $this->form->permissionId = $this->permission->id;
        $this->form->fill($this->permission->toArray());
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

        session()->flash('success', 'Permission updated successfully');

        return redirect()->route('permissions');
    }
}
