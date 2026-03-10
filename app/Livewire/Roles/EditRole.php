<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\Role\EditRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $role;
    public EditRoleForm $form;

    public function mount($id)
    {
        $this->role = Role::findOrFail($id);
        $this->form->roleId = $this->role->id;
        $this->form->fill($this->role->toArray());
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

        session()->flash('success', 'Role updated successfully');

        return redirect()->route('roles');
    }
}
